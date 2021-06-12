<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use App\Models\Ubicacion;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    public function listLocations() {
        $ubicaciones = Ubicacion::all();
        $locations = array();
        foreach ($ubicaciones as $u) {
            $l = array(
                'id' => $u['id'],
                'lat' => $u['latitud'],
                'lng' => $u['longitud'],
                'rest' => Restaurante::find($u['idRest'])
            );
            array_push($locations, $l);
        }
        echo json_encode($locations);
    }
    public function addLocation($pos,$idRest) {
        $newPos = new Ubicacion();
        $pos = explode(',',substr($pos,1,strlen($pos)-2));
        $newPos->latitud = $pos[0];  
        $newPos->longitud = $pos[1];
        $newPos->idRest = $idRest;
        $newPos->save();
    }
}
