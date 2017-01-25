<?php

namespace Robtor\Http\Controllers;

use Illuminate\Http\Request;

use Robtor\Http\Requests;

use Robtor\Usuario;

use Illuminate\Support\Facades\DB;

use Robtor\Administrador;

use Illuminate\Support\Facades\Auth;

use Robtor\Categoria;

use Robtor\Promocion;

use Pusher;

class UsuarioController extends Controller
{
    
	public function store(Request $request){

        Usuario::create($request->all());
        return response()->json(['mensaje' => '"Se ha creado correctamente']);
        
		// $this->validate($request, [
		// 	'nombre' => 'required',
		// 	'email'  => 'required|email',
		// 	'password'  => 'required|confirmed',
		// 	]);

  //       $prefijo  = substr($request['nombre']   , 0, 5);

  //       if($prefijo == 'admin'){

  //           return redirect()->intended('login');

  //       }else{

  //           $usuario = new Usuario;

  //           $usuario->nombre = $request['nombre'];
  //           $usuario->email = $request['email'];
  //           $usuario->password = $request['password'];

  //           $usuario->save();

  //           Auth::login($usuario);

  //       return redirect()->intended('paginaPrincipalUsuario');

  //       }

		
	}

	public function validarIngresoUsuario(Request $request){

    	$email = $request['email'];
    	$password = $request['password'];

        if (Auth::attempt(['email' => $email, 'password' => $password])) {

        	return redirect()->intended('paginaPrincipalUsuario');

        } else  if (Auth::attempt(['nombre' => $email, 'password' => $password])){

        	return redirect()->intended('paginaPrincipalUsuario');

        }
    }


    public function seguirPromocion($id){

        $promocion = Promocion::find($id);

        $idUsuario[] = Auth::id();

        if($promocion->tipo_promocion === "Flash"){

            $promocion->usuarios()->sync($idUsuario);

        }else{

            $promocion->cantidad_disponible = $promocion->cantidad_disponible - 1;

            $promocion->save();

            $promocion->usuarios()->sync($idUsuario);

        }

        echo "La promocion con id: ".$id."se está siguiendo";

        // $pusher = new Pusher($key, $secret, $app_id);
        // $pusher->trigger('test-channel', 'test_event', array( 'hello' => 'world' ) );
    }

    public function promocionesSiguiendo(){

        $promocionesSiguiendo =  $users = DB::select('select * from promocion_usuario where usuario_id = ?', [Auth::id()]);

        //pasar el array de promociones siguiendo de un usuario a la pagina de perfil

        //dd($promocionesSiguiendo);

        foreach ($promocionesSiguiendo as $promocion) {
            $promocion = Promocion::where('id' , $promocion->promocion_id)->get();
            $promocion = $promocion[0];
            $promocionesUsuario[] = $promocion;
        }

        // dd($promocionesUsuario);

        return view('perfilUsuario')->with('promocionesUsuario' , $promocionesUsuario);
        
    }


}
