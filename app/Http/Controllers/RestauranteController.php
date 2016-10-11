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
		//Como los nombres de los restaurantes van a ser únicos, entonces
		//puedes llamar a la imagen como el nombre de restarnate
		$file = $request->file('logoRestaurante');

		$nombreImagen = $request->nombreRestaurante . '.' . $file->getClientOriginalExtension();

		$path = public_path() . '\images\logosRestaurantes';

		$file->move($path, $nombreImagen);

		$restaurante = new Restaurant;
			$restaurante->nombre = $request['nombreRestaurante'];
			$restaurante->horarioInicio = $request['horarioInicioRestaurante'];
			$restaurante->horarioFinal = $request['horarioFinalRestaurante'];
			$restaurante->ubucacion = $request['ubucacionRestaurante'];
			$restaurante->eslogan = $request['esloganRestaurante'];
			$restaurante->descripcion = $request['descripcionRestaurante'];
			$restaurante->logo = $nombreImagen;
		
		$restaurante->save();

		$restaurante->categorias()->sync($request['categorias']);

		// return redirect()->route('mostrarRestauranteAleatorio');
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
		$restaurantes = Restaurant::where('nombre', 'LIKE', '%'.$request->elementoABuscar.'%')->get();
		dd($restaurantes->all());
		//Pasar a la ventana paa mostrar los restaurantes
	}

	public function mostrarRestauranteAleatorio(Request $request){

		$categorias_id = $request->tags;

		shuffle($categorias_id);

		$randCategoria = $categorias_id[0];

		if (!$randCategoria) {
			return dd('no pusiste categorias');
		}

		$restaurantes = Restaurant::whereHas('categorias', function ($query) use ($randCategoria)
		{
			$query->where('categoria_id', '=', $randCategoria);	
		})->with('categorias')->get();

		$restaurante = $restaurantes->random();

		return view('restauranteAleatorio', ['restaurante' => $restaurante]);


	}


//Funciones Privadas







}
