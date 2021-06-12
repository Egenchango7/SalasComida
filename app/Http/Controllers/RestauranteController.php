<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Menu;
use App\Models\Plato;
use App\Models\Restaurante;
use App\Models\User;
use Illuminate\Http\Request;

class RestauranteController extends Controller
{
    public function __invoke() {
        $rests = Restaurante::all();
        $objO = new Menu();
        $ofertas = $objO->getMenusOferta();
        return view('map',compact('ofertas','rests'));
    }
    public function getRestById($idRest) {
        return Restaurante::find($idRest);
    }
    public function adminView(Login $login) {
        $rests = Restaurante::all();
        $users = User::all();
        $tiposPlato = Plato::getTiposPlato();
        return view('admin', compact('rests','users','tiposPlato','login'));
    }
    public function updateRest(Request $request) {
        $rest = Restaurante::find($request->listRest);
        $rest->direccion = $request->direccion;
        $rest->telefono = $request->telefono;
        $rest->permisos = isset($request->permisos);
        $rest->descripcion = $request->descripcion;
        $img = $request->file('changeImg');
        if (isset($img)) {
            $restImg = $rest->id.'.'.$img->getClientOriginalExtension();
            $img->move(public_path('img'),$restImg);
            $rest->foto = $restImg;
        }
        $rest->save();
        return $rest;
    }
    public function newRest(Request $request) {
        $lastId = Restaurante::latest('id')->first()->id;
        $newId = (intval(substr($lastId, 1)) + 1);
        $newId = 'R'.str_pad($newId, 3, "0", STR_PAD_LEFT);
        
        $rest = new Restaurante();
        $rest->id = $newId;
        $rest->nombre = $request->nombre;
        $rest->direccion = $request->direccion;
        $rest->telefono = $request->telefono;
        $rest->permisos = isset($request->permisos);
        $rest->descripcion = $request->descripcion;
        
        $img = $request->file('fotoRest');
        $restImg = $rest->id.'.'.$img->getClientOriginalExtension();
        $img->move(public_path('img'),$restImg);
        $rest->foto = $restImg;

        $rest->save();
        
        $objU = new UbicacionController();
        $objU->addLocation($request->marker,$newId);
    }
}
