<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;
    protected $table = 'usuario';
    public $timestamps = false;

    public function Validation(Login $usuario){
        $user = Login::where('username',$usuario->username)
                        ->where('password',$usuario->pwd);
         return $user;               
    }
}
