<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Menu;
use App\Models\Plato;
use App\Models\Restaurante;
use App\Models\Ubicacion;
use App\Models\User;
use Illuminate\Http\Request;

class RestauranteController extends Controller
{
    public function __invoke(Request $request) {
        $rests = Restaurante::all();
        $objO = new Menu();
        $ofertas = $objO->getMenusOferta();
        return view('map',compact('ofertas','rests'));
    }
    public function getRestById($idRest) {
        return Restaurante::find($idRest);
    }
    public function adminView() {
        session('access',false);
        if (session('access')) { 
            $rests = Restaurante::all();
            $users = Login::all();
            $tiposPlato = Plato::getTiposPlato();
            return view('admin', compact('rests','users','tiposPlato'));
        } else {
            return view('login');
        }
    }
    public function updateRest(Request $r) {
        $rest = Restaurante::find($r->listRest);
        $rest->direccion = $r->direccion;
        $rest->telefono = $r->telefono;
        $rest->permisos = isset($r->permisos);
        $rest->descripcion = $r->descripcion;
        $img = $r->file('changeImg');
        if (isset($img)) {
            $restImg = $rest->id.'.'.$img->getClientOriginalExtension();
            $img->move(public_path('img'),$restImg);
            $rest->foto = $restImg;
        }
        $rest->save();
        return $rest;
    }
    public function newRest(Request $r) {
        $newId = $this->getLastId('restaurante');
        $rest = new Restaurante();
        $rest->id = $newId;
        $rest->nombre = $r->nombre;
        $rest->direccion = $r->direccion;
        $rest->telefono = $r->telefono;
        $rest->permisos = isset($r->permisos);
        $rest->descripcion = $r->descripcion;
        
        $img = $r->file('fotoRest');
        $restImg = $rest->id.'.'.$img->getClientOriginalExtension();
        $img->move(public_path('img'),$restImg);
        $rest->foto = $restImg;

        $rest->save();
        
        $objU = new UbicacionController();
        $objU->addLocation($r->marker,$newId);
        return back();
    }
    public function destroyRest($idRest) {
        $location = new Ubicacion();
        $location->deleteByRest($idRest);
        Restaurante::find($idRest)->delete();
        return back();
    }
}
