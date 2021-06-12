<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function validacionAction(Request $request){
        $login = new Login();
        $login->username = $request->username;
        $login->pwd = $request->pwd;

        $login->Validation($login);

        return redirect()->route('admin',$login);
    }
}
