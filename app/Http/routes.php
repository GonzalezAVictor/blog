<?php

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


//Vistas
Route::get('login', 'DocumentosController@login');		// Se va a DocumentosContoller y ejecuta login

Route::get('prueba', 'DocumentosController@prueba'); 	// Se va a DosumentosController y ejecuta prueba

Route::get('aRestaurantes', 'DocumentosController@aRestaurantes');		// Se va a DocumentosController y ejecuta aRestaurantes

Route::get('paginaPrincipalUsuario', 'DocumentosController@paginaPrincipalUsuario')->name('paginaPrincipalUsuario');

Route::get('restaurantesCategorias', 'DocumentosController@restaurantesCategorias');

Route::get('restauranteAleatorio', 'DocumentosController@restauranteAleatorio');


//Categoria------------------------------    Categoria    ---------------------------------------------

Route::resource('categoria', 'CategoriaController');

//Restaurante------------------------------    Restaurante    ---------------------------------------------

Route::resource('restaurante' , 'RestauranteController');

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

//Usuario------------------------------    Usuario    ---------------------------------------------

Route::resource('usuario', 'UsuarioController');

Route::post('validarIngresoUsuario', 'UsuarioController@validarIngresoUsuario')->name('validarIngresoUsuario');