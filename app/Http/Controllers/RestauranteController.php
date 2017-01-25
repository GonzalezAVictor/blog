<?php

namespace Robtor\Http\Controllers;

use Illuminate\Http\Request;

use Robtor\Http\Requests;

use Robtor\Categoria;

use Robtor\Restaurant;

use Robtor\Promocion;


class RestauranteController extends Controller
{
	// Contructor de RestauranteController
	// function __construct(){
	// 	// $this->restaurantes();
	// }

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
			$restaurante->codigoRestaurante = $request['codigoRestaurante'];
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

	public function constructor(){
		echo "string";
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

	public function restauranteAleatorio($categoria){

		$randCategoria = $categoria;

		$restaurantes = Restaurant::whereHas('categorias', function ($query) use ($randCategoria)
		{
			$query->where('categoria_id', '=', $randCategoria);	
		})->with('categorias')->get();

		$contenidoArrayRestaurantes = $restaurantes->last();

		if ($contenidoArrayRestaurantes == null) {

			// return redirect()->route('paginaPrincipalUsuario');

			$respuesta['error'] = 'no hay restaurantes con la categoria con id' . $categoria;

			return response()->json($respuesta);

		}else{

			$restaurante = $restaurantes->random();

			// $promociones = Promocion::where('restaurante_id' , $restaurante->id)->get();

			// $contenidoArrayPromociones = $promociones->last();

			// return view('restauranteAleatorio', ['restaurante' => $restaurante])->with('promociones' , $promociones);

			$respuesta['error'] = '';
			$respuesta['restaurante'] = $restaurante;

			return response()->json($respuesta);

		}
	}

	public function obtenerPromociones($idRest){

		$promociones = Promocion::where('restaurante_id' , $idRest)->get();

		$respuesta['promociones'] = $promociones;

		return response()->json($respuesta);

	}

	public function mostrarRestaurantes(Request $request){
		$restaurantes = Restaurant::where('nombre', 'LIKE', '%'.$request->elementoABuscar.'%')->get();
		dd($restaurantes->all());
		//Pasar a la ventana paa mostrar los restaurantes
	}

	public function restaurantes(){
		$restaurantes = Restaurant::all();

		$datos ['restaurantes'] = $restaurantes;

		$promociones = Promocion::all();

		$datos ['promociones'] = $promociones;

		$categorias = Categoria::all();

		$datos ['categorias'] = $categorias;
        
        return response()->json($datos);
		
	}

	public function mostrarRestauranteAleatorio(Request $request){

		$categorias_id = $request->tags;

		if (!$categorias_id) {
			return dd('no pusiste categorias');
		}

		shuffle($categorias_id);

		$randCategoria = $categorias_id[0];

		$restaurantes = Restaurant::whereHas('categorias', function ($query) use ($randCategoria)
		{
			$query->where('categoria_id', '=', $randCategoria);	
		})->with('categorias')->get();

		$contenidoArrayRestaurantes = $restaurantes->last();

		if ($contenidoArrayRestaurantes == null) {

			return redirect()->route('paginaPrincipalUsuario');

		}else{

			$restaurante = $restaurantes->random();

			$promociones = Promocion::where('restaurante_id' , $restaurante->id)->get();

			$contenidoArrayPromociones = $promociones->last();

			return view('restauranteAleatorio', ['restaurante' => $restaurante])->with('promociones' , $promociones);

		}
	}

	public function validarCodigoRestaurante(Request $request){

        $codigoEscaneado = $request->all();

        $codigoEscaneado = $codigoEscaneado['codigoPromocion'];

        $restaurante = Restaurant::where('codigoRestaurante' , $codigoEscaneado)->get();

        $restaurante = $restaurante[0];

        $codigoRestaurante = $restaurante->codigoRestaurante;

        $validacion = $this->verificarExistenciaCodigo( $codigoEscaneado, $codigoRestaurante);

        if($validacion){

        	$promociones = Promocion::where('restaurante_id' , $restaurante->id)->get();

			$contenidoArrayPromociones = $promociones->last();
        	
        	return view('restauranteAleatorio', ['restaurante' => $restaurante])->with('promociones' , $promociones);

        }else{
        	dd('false');
        }


        return 'validar que el codigo:  ' .  $codigoEscaneado  .'  pertenesca a una promocion activa Restaurante';
    }

    private function verificarExistenciaCodigo($codigoEscaneado , $codigoRestaurante){

    	if ($codigoEscaneado === $codigoRestaurante) {
    		return true;
    	}else{
    		return false;
    	}

    }


//Funciones Privadas
}

// function Main() {
//     $_POST = json_decode(file_get_contents('php://input'),true);
//      $tarea = $_POST[ 'tarea' ];
//      $datosTarea = $_POST['datosTarea'];
//     $restauranteController = new RestauranteController();

//     // switch ($tarea) {
//     // 	case 'restaurantes':
//     // 		$this->restaurantes();
//     // 		echo "string";
//     // 		break;
    	
//     // 	default:
//     // 		# code...
//     // 		break;
//     // }

//   }

//   Main();

