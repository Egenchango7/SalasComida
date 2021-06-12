<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use Illuminate\Http\Request;

class PlatoController extends Controller
{
    public function getPlatosByTipo($tipo) {
        $platos = new Plato();
        echo $platos->getPlatosByTipo($tipo);
    }
    public function getPlatosByTipoAndRest($tipo,$idRest) {
        $objP = new Plato();
        $platos = $objP->getPlatosByRest($idRest);
        $result = array();
        foreach ($platos as $p) {
            if ($p['idTipoPlato'] == $tipo) {
                array_push($result,$p);
            }    
        }
        echo json_encode($result);
    }
    public function addPlato(Request $request){
        $lastId = Plato::latest('id')->first()->id;
        $newId = (intval(substr($lastId, 1)) + 1);
        $newId = 'P'.str_pad($newId, 3, "0", STR_PAD_LEFT);

        $plato = new Plato();
        $plato->id = $newId;
        $plato->nombre = $request->nombre;
        $plato->idTipoPlato = $request->tipoPlato;
        $plato->save();
        
        $plato->insertPrecioByRest($newId,$request);

        $response = array(
            'tipoPlato' => $request->tipoPlato,
            'idRest' => $request->idRest
        );
        echo json_encode($response);
    }
}
