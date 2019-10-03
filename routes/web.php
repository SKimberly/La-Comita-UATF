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
	Route::get('productos/crear','ProductoController@create')->name('admin.productos.crear');

});


Auth::routes();



Route::get('redirect', function(){
	//alert()->error('Success Message', 'Optional Title');
	return redirect('/home')->with('success', 'Bienvenido!');
});

