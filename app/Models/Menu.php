<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menu';

    public function getMenusByRest($idRest) {
        $menus = Menu::join('restMenu AS rm', 'rm.idMenu', '=', 'menu.id')
                        ->join('restaurante AS r', 'r.id', '=', 'rm.idRest')
                        ->select('rm.idMenu','menu.idTipoMenu','rm.precio','rm.precioReducido')
                        ->where('rm.idRest',$idRest)
                        ->get();
        return $menus;
    }
    public function getMenusOferta() {
        $menus = Menu::join('restMenu AS rm', 'rm.idMenu', '=', 'menu.id')
                        ->join('restaurante AS r', 'r.id', '=', 'rm.idRest')
                        ->join('tipoMenu AS tm', 'tm.id', '=', 'menu.idTipoMenu')
                        ->select('rm.idMenu','rm.idRest','r.nombre AS nomRest','menu.idTipoMenu','tm.nombre AS tipoMenu','rm.precio','rm.precioReducido')
                        ->orderBy('rm.precio')
                        ->take(7)
                        ->get();
        return $menus;
    }
    public function getTiposMenuByRest($idRest) {
        $tiposMenu = Menu::join('restMenu AS rm','rm.idMenu','=','menu.id')
                            ->join('tipoMenu AS tm', 'tm.id', '=', 'menu.idTipoMenu')
                            ->select('menu.idTipoMenu','tm.nombre')
                            ->where('rm.idRest',$idRest)
                            ->groupBy('menu.idTipoMenu','tm.nombre')
                            ->get();
        return $tiposMenu;
    }
}
