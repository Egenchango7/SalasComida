<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke() {
        session(['access' => false]);
        return view('login');
    }
    public function validacionAction(Request $r) {
        session('access',false);
        $login = new Login();
        $user = $login->Validation($r->username, $r->pwd);
        if (count($user) == 0) {
            return 'error';
        }
        session(['access' => true]);
        return $user;
    }
    public function addUsuario(Request $request) {
        $newId = $this->getLastId('usuario');
        $usuario = new Login();
        $usuario->id = $newId;
        $usuario->nombre = $request->txtNom;
        $usuario->cargo = $request->listCargo;
        $usuario->username = $request->txtUser; 
        $usuario->pwd = $request->txtPwd;
        $usuario->save();        
    }
    public function updateUsuario(Request $r) {
        for($count = 0; $count < count($r->txtEdit); $count += 5) {
            $user = Login::find($r->txtEdit[$count]);
            $user->nombre = $r->txtEdit[$count+1];
            $user->cargo = $r->txtEdit[$count+2];
            $user->username = $r->txtEdit[$count+3];
            if (!empty($r->txtEdit[$count+4])) $user->pwd = $r->txtEdit[$count+4];        
            $user->save();
        }
    }
    public function listUsuario() {
        echo Login::all();
    }
    public function destroyUser($id){
        Login::find($id)->delete();
        return back();
    }
}
