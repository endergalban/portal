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
Route::put('admin/users/update/{id}',['uses' => 'UserController@update', 'as' => 'users.update']);
Route::post('admin/users/delete',['uses' => 'UserController@destroy', 'as' => 'users.delete']);

