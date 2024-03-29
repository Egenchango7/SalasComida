<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menu';
    protected $keyType = 'string';
    public $timestamps = false;

    public function getMenusByRest($idRest) {
        $menus = Menu::join('restmenu AS rm', 'rm.idMenu', '=', 'menu.id')
                        ->join('restaurante AS r', 'r.id', '=', 'rm.idRest')
                        ->select('rm.idMenu','menu.idTipoMenu','rm.precio','rm.precioReducido')
                        ->where('rm.idRest',$idRest)
                        ->get();
        return $menus;
    }
    public function getMenusOferta() {
        $menus = Menu::join('restmenu AS rm', 'rm.idMenu', '=', 'menu.id')
                        ->join('restaurante AS r', 'r.id', '=', 'rm.idRest')
                        ->join('tipomenu AS tm', 'tm.id', '=', 'menu.idTipoMenu')
                        ->select('rm.idMenu','rm.idRest','r.nombre AS nomRest','menu.idTipoMenu','tm.nombre AS tipoMenu','rm.precio','rm.precioReducido')
                        ->orderBy('rm.precio')
                        ->take(7)
                        ->get();
        return $menus;
    }
    public function getTiposMenuByRest($idRest) {
        $tiposMenu = Menu::join('restmenu AS rm','rm.idMenu','=','menu.id')
                            ->join('tipomenu AS tm', 'tm.id', '=', 'menu.idTipoMenu')
                            ->select('menu.idTipoMenu','tm.nombre','rm.idMenu')
                            ->where('rm.idRest',$idRest)
                            ->groupBy('menu.idTipoMenu','tm.nombre','rm.idMenu')
                            ->get();
        return $tiposMenu;
    }
    public function updateMenu($id,$m,$changePrecio = false) {
        DB::table('menuplato')
            ->where('idMenu',$id)
            ->delete();
        foreach ($m->platosMenu as $p) {
            DB::table('menuplato')->insert([
                'idMenu' => $id,
                'idPlato' => $p
            ]);
        }
        if ($changePrecio) {
            DB::table('restmenu')
                ->where('idMenu',$id)
                ->update([
                    'precio' => $m->precioNormal,
                    'precioReducido' => $m->precioReducido
                ]);
        }
        return $m;
    }
    public function newMenu($id,$m) {
        foreach ($m->platosMenu as $p) {
            DB::table('menuplato')->insert([
                'idMenu' => $id,
                'idPlato' => $p
            ]);
        }
        DB::table('restmenu')->insert([
            'idRest' => $m->listRest,
            'idMenu' => $id,
            'precio' => $m->precioNormal,
            'precioReducido' => $m->precioReducido
        ]);
    }
    public static function deleteReferences($idMenu){
        DB::table('restmenu')
            ->where('idMenu',$idMenu)
            ->delete();
        DB::table('menuplato')
            ->where('idMenu',$idMenu)
            ->delete();
    }
}
