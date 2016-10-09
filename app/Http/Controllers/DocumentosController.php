<?php

namespace Robtor\Http\Controllers;

use Illuminate\Http\Request;

use Robtor\Http\Requests;

use Robtor\Categoria;

class DocumentosController extends Controller{

	public function prueba(){
		$categoria = Categoria::orderBy('id', 'ASC')->lists('nombre', 'id');
		return view('prueba')->with('categoria', $categoria);
	}

	public function login(){
		return view('login');
	}

	public function aRestaurantes(){

		$categoria = Categoria::orderBy('id', 'ASC')->paginate(4);
		return view('aRestaurantes')->with('categoria', $categoria);
	}

	public function dcok(){
		return 'DocumentosController';
	}

	public function paginaPrincipalUsuario(){
		$categoria = Categoria::orderBy('id', 'ASC')->lists('nombre', 'id');
		return view('paginaPrincipalUsuario')->with('categoria', $categoria);
	}

	public function restaurantesCategorias(){
		return view('restaurantesCategorias');
	}

	public function restauranteAleatorio(){
		return view('restauranteAleatorio');
	}

}
