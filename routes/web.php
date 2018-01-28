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
Route::post('admin/users/update',['uses' => 'UserController@update', 'as' => 'users.update']);
Route::post('admin/users/delete',['uses' => 'UserController@destroy', 'as' => 'users.delete']);


Route::get('admin/atributos',['uses' => 'AtributoController@index', 'as' => 'atributos.index']);
Route::get('admin/atributos/get',['uses' => 'AtributoController@get', 'as' => 'atributos.get']);
Route::post('admin/atributos/store',['uses' => 'AtributoController@store', 'as' => 'atributos.store']);
Route::post('admin/atributos/update',['uses' => 'AtributoController@update', 'as' => 'atributos.update']);
Route::post('admin/atributos/delete',['uses' => 'AtributoController@destroy', 'as' => 'atributos.delete']);

Route::post('admin/atributos/store_atributo',['uses' => 'AtributoController@store_atributo', 'as' => 'atributos.store_atributo']);
Route::post('admin/atributos/destroy_atributo',['uses' => 'AtributoController@destroy_atributo', 'as' => 'atributos.destroy_atributo']);