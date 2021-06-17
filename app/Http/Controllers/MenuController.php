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
        return $ofertas;
    }
    public function getTiposMenuByRest($idRest, $return = false) {
        $objTM = new Menu();
        $tiposMenu = $objTM->getTiposMenuByRest($idRest);
        if ($return) {
            return $tiposMenu;
        } else {
            echo $tiposMenu;
        }
    }
    public function updateMenu(Request $r) {
        $menu = new Menu();
        return $menu->updateMenu($r->idMenu, $r);
    }
    public function newMenu(Request $r) {
        $menu = new Menu();
        $tiposMenu = $this->getTiposMenuByRest($r->listRest,true);
        foreach ($tiposMenu as $tm) {
            if ($tm['idTipoMenu'] == $r->tipoMenu) $idMenu = $tm->idMenu;
        }
        if (isset($idMenu)) return $menu->updateMenu($idMenu,$r,true);
        $newId = $this->getLastId('menu');
        $menu->id = $newId;
        $menu->idTipoMenu = $r->tipoMenu;
        $menu->save();
        $menu->newMenu($newId,$r);
        return $r;
    }
    public function destroyMenu($id){
        Menu::deleteReferences($id);
        Menu::find($id)->delete();
        return back();
    }
}

