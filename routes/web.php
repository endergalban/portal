<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','PublicacionController@dashboard');
Auth::routes();

//Route::get('/home', 'PublicacionController@index')->name('home');
Route::any('publicaciones',['uses' => 'PublicacionController@index', 'as' => 'publicaciones.index']);
Route::get('publicaciones/details/{id}',['uses' => 'PublicacionController@details', 'as' => 'publicaciones.details']);

Route::group(['middleware' => ['auth','permiso']], function () {
	Route::get('admin/users',['uses' => 'UserController@index', 'as' => 'users.index']);
	Route::get('admin/users/get',['uses' => 'UserController@get', 'as' => 'users.get']);
	Route::post('admin/users/store',['uses' => 'UserController@store', 'as' => 'users.store']);
	Route::post('admin/users/delete',['uses' => 'UserController@destroy', 'as' => 'users.delete']);
	Route::get('admin/atributos',['uses' => 'AtributoController@index', 'as' => 'atributos.index']);
	Route::get('admin/atributos/get',['uses' => 'AtributoController@get', 'as' => 'atributos.get']);
	Route::get('admin/atributos/obeneratributos/{id}',['uses' => 'AtributoController@obtenerAtributos', 'as' => 'atributos.obtenerAtributos']);
	Route::post('admin/atributos/store',['uses' => 'AtributoController@store', 'as' => 'atributos.store']);
	Route::post('admin/atributos/update',['uses' => 'AtributoController@update', 'as' => 'atributos.update']);
	Route::post('admin/atributos/delete',['uses' => 'AtributoController@destroy', 'as' => 'atributos.delete']);
	Route::post('admin/atributos/store_atributo',['uses' => 'AtributoController@store_atributo', 'as' => 'atributos.store_atributo']);
	Route::post('admin/atributos/destroy_atributo',['uses' => 'AtributoController@destroy_atributo', 'as' => 'atributos.destroy_atributo']);
	Route::get('admin/productos',['uses' => 'ProductoController@index', 'as' => 'productos.index']);
	Route::get('admin/productos/get',['uses' => 'ProductoController@get', 'as' => 'productos.get']);
	Route::post('admin/productos/delete',['uses' => 'ProductoController@destroy', 'as' => 'productos.delete']);
	Route::post('admin/productos/store',['uses' => 'ProductoController@store', 'as' => 'productos.store']);
	Route::post('admin/asistencias/update',['uses' => 'PublicarController@update_asistencia_admin', 'as' => 'admin.asistencias.update']);
	Route::get('admin/asistencias/{id}/destroy',['uses' => 'PublicarController@asistencia_destroy', 'as' => 'admin.asistencia.destroy']);
	Route::get('admin/asistencias',['uses' => 'PublicarController@index_asistencia_admin', 'as' => 'admin.asistencias.index']);
});

Route::group(['middleware' => ['auth']], function () {
  Route::get('users/edit/{id}',['uses' => 'UserController@edit', 'as' => 'users.edit']);
  Route::post('users/update/{id}',['uses' => 'UserController@update', 'as' => 'users.update']);
	Route::get('publicar',['uses' => 'PublicarController@index', 'as' => 'publicar.index']);
	Route::post('publicar/delete',['uses' => 'PublicarController@delete', 'as' => 'publicar.delete']);
	Route::post('publicar/store',['uses' => 'PublicarController@store', 'as' => 'publicar.store']);
	Route::post('publicar/update',['uses' => 'PublicarController@update', 'as' => 'publicar.update']);
	Route::get('asistencias',['uses' => 'PublicarController@asistencia', 'as' => 'publicar.asistencia']);
	Route::post('asistencias/store',['uses' => 'PublicarController@store_asistencia', 'as' => 'asistencia.store']);
	Route::post('comentarios',['uses' => 'ComentarioController@comentar', 'as' => 'comentar']);
	Route::get('miscompras',['uses' => 'CompraController@miscompras', 'as' => 'miscompras']);
	Route::get('misventas',['uses' => 'CompraController@misventas', 'as' => 'misventas']);
	Route::get('comentarios/eliminar/{id}',['uses' => 'ComentarioController@eliminar', 'as' => 'comentar.eliminar']);
	Route::get('comprar/{id}',['uses' => 'CompraController@comprar', 'as' => 'comprar']);
	Route::post('comprar/procesar',['uses' => 'CompraController@comprar_proceso', 'as' => 'comprar.proceso']);

});

//*********** Cargar Imagenes Subidas ***********//
Route::get('images/{filename}', function ($filename) {
	  return Image::make(storage_path() . '/app/public/' . base64_decode($filename))->response();
})->name('imagen_almacenada');
