<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use App\Models\Ubicacion;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    public function __invoke() {
        return view('map');
    }
    public function listLocations() {
        $ubicaciones = Ubicacion::all();
        $rest = new Restaurante();
        $locations = array();
        foreach ($ubicaciones as $u) {
            $l = array(
                'id' => $u['id'],
                'lat' => $u['latitud'],
                'lng' => $u['longitud'],
                'rest' => $rest->getById($u['idRest'])
            );
            array_push($locations, $l);
        }
        echo json_encode($locations);
    }
}
