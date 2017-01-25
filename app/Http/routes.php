<?php


use Illuminate\Support\Facades\App;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

//Vistas
Route::get('login', 'DocumentosController@login')->name('login');		// Se va a DocumentosController y ejecuta login

Route::get('prueba', 'DocumentosController@prueba'); 	// Se va a DosumentosController y ejecuta prueba

Route::get('aRestaurantes', 'DocumentosController@aRestaurantes');		// Se va a DocumentosController y ejecuta aRestaurantes

Route::get('paginaPrincipalUsuario', 'DocumentosController@paginaPrincipalUsuario')->name('paginaPrincipalUsuario');

Route::get('restaurantesCategorias', 'DocumentosController@restaurantesCategorias');

Route::get('restauranteAleatorio', 'DocumentosController@restauranteAleatorio');

Route::get('sendNotificationToDevice' , 'PushNotificationController@sendNotificationToDevice');

Route::get('pruebaJson' , 'DocumentosController@pruebaJson');


//Categoria------------------------------    Categoria    ---------------------------------------------

Route::resource('categoria', 'CategoriaController');

Route::resource('categories' , 'CategoriaController@categories');

//Restaurante------------------------------    Restaurante    ---------------------------------------------

Route::resource('restaurante' , 'RestauranteController');

Route::post('randRest' , function(){

    echo "randRest";
});

Route::post('mostrarRestaurantes', 'RestauranteController@mostrarRestaurantes')->name('mostrarRestaurantes');

Route::get('mostrarRestauranteAleatorio', 'RestauranteController@mostrarRestauranteAleatorio')->name('mostrarRestauranteAleatorio');

Route::get('restaurante/{id}/destroy', [
		'uses' => 'RestauranteController@destroy',
		'as' => 'restaurante.destroy'
	]);

Route::get('restaurante/{id}/edit', [
	'uses' => 'RestauranteController@edit',
	'as' => 'restaurante.edit'
	]);

Route::get('restaurante/{param}/restauranteAleatorio',[
    'uses' => 'RestauranteController@restauranteAleatorio',
    'as' => 'restaurante.restauranteAleatorio'
    ]);

Route::get('restaurante/{param}/obtenerPromociones',[
    'uses' => 'RestauranteController@obtenerPromociones',
    'as' => 'restaurante.obtenerPromociones'
    ]);

Route::get('restaurantes' , 'RestauranteController@restaurantes');

//Usuario------------------------------    Usuario    ---------------------------------------------

Route::resource('usuario', 'UsuarioController');

Route::post('validarIngresoUsuario', 'UsuarioController@validarIngresoUsuario')->name('validarIngresoUsuario');

Route::get('promocionesSiguiendo' , 'UsuarioController@promocionesSiguiendo')->name('promocionesSiguiendo');

// Route::get('seguirPromocion' , 'UsuarioController@seguirPromocion')->name('seguirPromocion');

Route::get('usuario/{id}/seguirPromocion', [
    'uses' => 'UsuarioController@seguirPromocion',
    'as' => 'usuario.seguirPromocion'
    ]);

Route::get('compartirPromocion' , 'UsuarioController@compartirPromocion')->name('compartirPromocion');

//Promocion------------------------------    Promocion    ---------------------------------------------

Route::post('validarCondigoRestaurante' , 'RestauranteController@validarCodigoRestaurante')->name('validarCodigoRestaurante');

// Route::get('promocion/{id}/edit', [
// 		'uses' => 'PromocionController@edit',
// 		'as' => 'restaurante.edit'
// 	]);

//Notification------------------------------    Notification    ---------------------------------------------

Route::get('notification', 'PushNotificationController@sendNotificationToDevice');

// Pusher ----------------------------------  Pusher  ------------------------------------------

class TestEvent implements ShouldBroadcast{
    public $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function broadcastOn()
    {
        return ['test-channel'];
    }
}

Route::controller('notifications', 'NotificationController');


Route::get('/bridge', function() {
    $pusher = App::make('pusher');

    $pusher->trigger( 'test-channel',
                      'test-event', 
                      array('text' => 'Preparing the Pusher Laracon.eu workshop!'));

    return view('welcome');
});

Route::get('/broadcast', function() {
    event(new TestEvent('Broadcasting in Laravel using Pusher!'));

    return view('welcome');
});