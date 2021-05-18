<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    use HasFactory;
    protected $table = 'restaurante'; 

    public function restByLocation($idLocation) {
        $rest = Restaurante::where('idUbicacion',$idLocation)->get();
        return $rest[0];
    }
}
