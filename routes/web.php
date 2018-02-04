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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/users',['uses' => 'UserController@index', 'as' => 'users.index']);
Route::get('admin/users/get',['uses' => 'UserController@get', 'as' => 'users.get']);
Route::post('admin/users/store',['uses' => 'UserController@store', 'as' => 'users.store']);
Route::get('admin/users/edit/{id}',['uses' => 'UserController@edit', 'as' => 'users.edit']);
Route::post('admin/users/update/{id}',['uses' => 'UserController@update', 'as' => 'users.update']);
Route::post('admin/users/delete',['uses' => 'UserController@destroy', 'as' => 'users.delete']);


Route::get('publicaciones/index',['uses' => 'PublicacionController@index', 'as' => 'publicaciones.index']);
Route::get('publicaciones/details/{id}',['uses' => 'PublicacionController@details', 'as' => 'publicaciones.details']);

Route::post('comentarios',['uses' => 'ComentarioController@comentar', 'as' => 'comentar']);
Route::get('comentarios/eliminar/{id}',['uses' => 'ComentarioController@eliminar', 'as' => 'comentar.eliminar']);



