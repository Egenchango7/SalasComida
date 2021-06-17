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
            if ($p['idTipoPlato'] == $tipo or $tipo == 0) {
                array_push($result,$p);
            }    
        }
        echo json_encode($result);
    }
    public function addPlato(Request $r) {
        $newId = $this->getLastId('plato');
        $plato = new Plato();
        $plato->id = $newId;
        $plato->nombre = $r->nombre;
        $plato->idTipoPlato = $r->tipoPlato;
        $plato->save();
        $plato->insertPrecioByRest($newId,$r);
        return $r;
    }
    public function updatePlato(Request $r) {
        for ($i = 0; $i < count($r->txtEdit); $i += 3) {
            $id = $r->txtEdit[$i+1];
            $plato = Plato::find($id);
            $plato->nombre = $r->txtEdit[$i];
            $plato->save();
            $precio = str_replace('S/','',$r->txtEdit[$i+2]);
            $objP = new Plato();
            $objP->updatePrecioByPlato($id,$precio);
        }
        return $r;
    }
    public function destroyPlato($idPlato){
        Plato::deleteReferences($idPlato);
        Plato::find($idPlato)->delete();
        return back();
    }
}
