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

		//En request estan los id de las categorias elegidas
		//return "Mostrar restaurante Aleatorio en la ventana restauranteAleatorio";

		$restaurantes_id = Restaurant::all()->lists('id');

		//Aqui tienes que obtener los restaurantes que tengan las categorias seleccionadas

		$ultimoRestaurante = last(last($restaurantes_id));

		$idRandom = mt_rand(1, $ultimoRestaurante);

		dd($idRandom);



	}


//Funciones Privadas







}
