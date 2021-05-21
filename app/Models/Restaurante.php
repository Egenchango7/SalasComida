<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    use HasFactory;
    protected $table = 'restaurante'; 

    public function getById($idRest) {
        $rest = Restaurante::where('id',$idRest)->get();
        return $rest[0];
    }
}
