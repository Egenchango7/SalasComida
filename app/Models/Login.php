<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;
    protected $table = 'usuario';
    public $timestamps = false;

    public function Validation($usuario, $password){
        $user = Login::where('username',$usuario)
                        ->where('pwd',$password)
                        ->get();
        return $user;
    }
}
