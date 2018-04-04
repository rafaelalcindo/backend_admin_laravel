<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario as Usuario_Auth;

class Usuario extends Controller
{
    public function logarUsuario(Request $Request){
    	$usuario = $Request->input('usuario');
    	$senha	 = $Request->input('senha');
    	
    	$usuario = Usuario_Auth::where('usuario_login','=',$usuario)->where('usuario_senha','=',$senha)->first();

    	if($usuario != ''){
    		return $usuario;
    	}else{
    		return '{"logar": 0}';
    	}
    	
    }
}
