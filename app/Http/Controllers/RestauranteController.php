<?php

namespace Robtor\Http\Controllers;

use Illuminate\Http\Request;

use Robtor\Http\Requests;

use Robtor\Categoria;

use Robtor\Restaurant;

class RestauranteController extends Controller
{

	public function store(Request $request){
		//crear un Restaurant
		$restaurante = new Restaurant;
			$restaurante->nombre = $request['nombreRestaurante'];
			$restaurante->horarioInicio = $request['horarioInicioRestaurante'];
			$restaurante->horarioFinal = $request['horarioFinalRestaurante'];
			$restaurante->ubucacion = $request['ubucacionRestaurante'];
			$restaurante->eslogan = $request['esloganRestaurante'];
			$restaurante->descripcion = $request['descripcionRestaurante'];
			$restaurante->logo = $request->logoRestaurante;
		
		$restaurante->save();

		$restaurante->categorias()->sync($request['categorias']);

		return redirect()->route('mostrarRestauranteAleatorio');
	}

	public function destroy($id){
		$categoria = Categoria::find($id); 
		$categoria->delete();
		dd($categoria->nombre." ha sido eliminado");
	}

	public function edit($id){
		$categoria = Categoria::find($id);
		dd($categoria);
	}

	public function mostrarRestaurantes(Request $request){
		//Filtrar los restaurantes con las categorias elegidas y asignarlas a
		//una variable "restaurantesEncontrados"
		$restaurantes = Restaurant::all();
		dd($restaurantes->all());
	}

	public function mostrarRestauranteAleatorio(Request $request){

		$categoria_id = $request['tags'][0];

		if (!$categoria_id) {
			return dd('no pusiste categorias');
		}

		$restaurantes = Restaurant::whereHas('categorias', function ($query) use ($categoria_id)
		{
			$query->where('categoria_id', '=', $categoria_id);	
		})->with('categorias')->get();

		$restaurante = $restaurantes->random();

		return view('restauranteAleatorio', ['restaurante' => $restaurante]);


	}


//Funciones Privadas







}
