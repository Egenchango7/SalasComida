<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Plato;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function getInfoMenuByRest($idRest) {
        $objM = new Menu();
        $objP = new Plato();
        $menus = $objM->getMenusByRest($idRest);
        $data = array();
        foreach ($menus as $m) {
            $platos = $objP->getPlatosByMenu($m->idMenu);
            array_push($data,array('menu' => $m, 'platos' => $platos));
        }
        echo json_encode($data);
    }
    public function getOfertasDestacadas() {
        $obj = new Menu();
        $ofertas = $obj->getMenusOferta();
        /*
        for ($i=0; $i < count($ofertas); $i++) { 
            $o = array('id' => $i);
            array_push($ofertas,$o);
        }
        */
        return $ofertas;
    }
    public function getTiposMenuByRest($idRest) {
        $objTM = new Menu();
        $tiposMenu = $objTM->getTiposMenuByRest($idRest);
        echo $tiposMenu;
    }
}

