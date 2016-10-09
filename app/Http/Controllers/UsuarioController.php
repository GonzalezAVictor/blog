<?php

namespace Robtor\Http\Controllers;

use Illuminate\Http\Request;

use Robtor\Http\Requests;

use Robtor\Usuario;

use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    
	public function store(Request $request){
		$this->validate($request, [
			'nombre' => 'required',
			'email'  => 'required|email',
			'password'  => 'required|confirmed',
			]);

		\Robtor\Usuario::create([
			'nombre' => $request['nombreUsuario'],
			'email' => $request['emailUsuario'],
			'password' => bcrypt($request['pwUsuario']),
			]);

		return $request['nombreUsuario']." se ha creado con el correo ".$request['emailUsuario'];
	}

	public function validarIngresoUsuario(Request $request)
    {
    	$email = $request['email'];
    	$password = $request['password'];
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->intended('paginaPrincipalUsuario');
        } else {
        	dd('no encontrado');
        }
    }




}
