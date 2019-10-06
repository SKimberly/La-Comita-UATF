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

Route::group([
	'prefix' => 'admin',
	'middleware' => 'auth'],
function(){
	Route::get('/', 'AdminController@index')->name('admin');

	Route::get('productos','ProductoController@index')->name('admin.productos.index');
	Route::get('productos/create','ProductoController@create')->name('admin.productos.create');
	Route::post('productos','ProductoController@store')->name('admin.productos.store');
	Route::get('productos/{id}/edit', 'ProductoController@edit')->name('admin.productos.edit');
	Route::put('productos/{producto}','ProductoController@update')->name('admin.productos.update');
	Route::delete('productos/{id}','ProductoController@destroy')->name('admin.productos.delete');

	//Rutas para las fotos de cada producto
	Route::get('productos/{id}/foto','FotoController@index');
	Route::post('productos/{id}/foto','FotoController@store');
	Route::delete('productos/{id}/foto','FotoController@destroy');
	//Ruata para hacer una imagen favorito
	Route::get('productos/{id}/foto/select/{image}','FotoController@select');


});


Auth::routes();



Route::get('redirect', function(){
	//alert()->error('Success Message', 'Optional Title');
	return redirect('/home')->with('success', 'Bienvenido!');
});

