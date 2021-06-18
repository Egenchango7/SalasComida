<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Plato extends Model
{
    use HasFactory;
    protected $table = 'plato';
    public $timestamps = false;

    public function getPlatosByMenu($idMenu) {
        $platos = Plato::join('menuplato AS mp','mp.idPlato','=','plato.id')
                        ->join('menu AS m', 'm.id','=','mp.idMenu')
                        ->where('mp.idMenu',$idMenu)
                        ->get();
        return $platos;
    }
    public function getPlatosByTipo($tipo) {
        return Plato::where('idTipoPlato',$tipo)->get();
    }
    public function getPlatosByRest($idRest) {
        $platos = Plato::join('platorest AS pr','pr.idPlato','=','plato.id')
                        ->where('pr.idRest',$idRest)
                        ->get();
        return $platos;
    }
    public static function getTiposPlato() {
        return DB::table('tipoPlato')->get();
    }  
    public function insertPrecioByRest($idPlato,$r) {
        DB::table('platorest')->insert([
            'idRest' => $r->listRest,
            'idPlato' => $idPlato,
            'precio' => $r->precio
        ]);
    }
    public function updatePrecioByPlato($id,$precio){
        DB::table('platorest')
            ->where('idPlato',$id)
            ->update([
                'precio' => $precio
            ]);
    }
    public static function deleteReferences($idPlato) {
        DB::table('platorest')
            ->where('idPlato',$idPlato)
            ->delete();
        DB::table('menuplato')
            ->where('idPlato',$idPlato)
            ->delete();
    }
}
