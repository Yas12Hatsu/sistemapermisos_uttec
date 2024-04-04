<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $req){
                // Validar los datos de entrada
        $req->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
        ]);
        
        if(Auth::attempt(['email'=>$req->email, 'password' => $req->password]))
        {
            $user = Auth::user();
            $token = $user->createToken('app')->plainTextToken;
            $arr = array('acceso' => 'Ok', 'token' => $token, 'usuario' => $user->name,'id_usuario' => $user->id, 'error' => '');

            return json_encode($arr);

        }
        else{
            $arr = array('acceso' => '', 'token' => '','error'=>'Usuario y/o contraseña inválido');

            return json_encode($arr);

        }
    }
    
}
