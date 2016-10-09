<?php

namespace Robtor\Http\Controllers;

use Illuminate\Http\Request;

use Robtor\Http\Requests;

use Robtor\Usuario;

class UsuarioController extends Controller
{
    
	public function store(Request $request){
		//crear un usuario
		//Namespace / Modelo

		\Robtor\Usuario::create([
			'nombre' => $request['nombreUsuario'],
			'email' => $request['emailUsuario'],
			'password' => bcrypt($request['pwUsuario']),
			]);

		return $request['nombreUsuario']." se ha creado con el correo ".$request['emailUsuario'];
	}

	public function validarIngresoUsuario(Request $request){
		dd('hay que validar el ingreso del usuario ' . $request['nombreUsuario']);
	}






}
