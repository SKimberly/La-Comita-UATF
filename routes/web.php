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

Route::get('/', 'WellcomeController@index');

Auth::routes();

Route::get('redirect', function(){
	//alert()->error('Success Message', 'Optional Title');
	return redirect('/home')->with('success', 'Bienvenido!');
});

Route::get('categoria/{id}/productos','WellcomeController@create')->name('categoria.productos');
Route::get('categoria/producto/{id}/detalle','WellcomeController@show')->name('productos.detalles');

//Rutas para el carrito
Route::get('/carrito/detalle', 'CarritoDetalleController@index')->name('carrito.detalle');
Route::post('/carrito', 'CarritoDetalleController@store')->name('carrito.store');
Route::delete('/carrito/{id}/eliminar','CarritoDetalleController@destroy')->name('carrito.eliminar');
Route::post('/realizar/pedido', 'CarritoController@create')->name('realizar.orden');

//Rutas para enviar mensajes de contacto ants de iniciar sesión
Route::resource('smscontactos','ContactoController');

Route::group([
	'prefix' => 'admin',
	'middleware' => 'auth'],
function(){
	Route::get('/', 'AdminController@index')->name('admin');

	//Rutas para PRODUCTOS
	Route::get('productos','ProductoController@index')->name('admin.productos.index');
	Route::get('productos/create','ProductoController@create')->name('admin.productos.create');
	Route::post('productos','ProductoController@store')->name('admin.productos.store');
	Route::get('productos/{id}/edit', 'ProductoController@edit')->name('admin.productos.edit');
	Route::put('productos/{producto}','ProductoController@update')->name('admin.productos.update');
	Route::delete('productos/{id}','ProductoController@destroy')->name('admin.productos.delete');

	//Rutas USUARIOS
	Route::get('users', 'UserController@index')->name('admin.users.index');
	Route::post('users', 'UserController@store')->name('admin.users.store');
	Route::get('users/{id}', 'UserController@edit')->name('admin.users.edit');
	Route::put('users/{user}','UserController@update')->name('admin.users.update');
	Route::delete('users/{id}','UserController@destroy')->name('admin.users.delete');

	//Rutas para las fotos de cada producto
	Route::get('productos/{id}/foto','FotoController@index');
	Route::post('productos/{id}/foto','FotoController@store');
	Route::delete('productos/{id}/foto','FotoController@destroy');
	//Ruata para hacer una imagen favorito
	Route::get('productos/{id}/foto/select/{image}','FotoController@select');

	//Rutas para PERFIL de usuario
	Route::get('users/{id}/show','UserController@show')->name('admin.users.show');
	Route::put('users/{user}/show','UserController@create')->name('admin.users.create');

	//Rutas para CATEGORIAS
	Route::get('categorias', 'CategoriaController@index')->name('admin.categorias');
	Route::get('categorias/create', 'CategoriaController@create')->name('admin.categorias.create');
	Route::post('categorias', 'CategoriaController@store')->name('admin.categorias.store');
	Route::get('categorias/{id}/edit', 'CategoriaController@edit')->name('admin.categorias.edit');
	Route::put('categorias/{categoria}', 'CategoriaController@update')->name('admin.categorias.update');
	Route::delete('categorias/{id}', 'CategoriaController@destroy')->name('admin.categorias.delete');

	//Ruta para actualizar el Carrito de pedidos a anticipo y fecha de entrega
	Route::get('pedidos','CarritoController@index')->name('admin.pedidos.index');
	Route::get('pedidos/{id}/ver','CarritoController@show')->name('ver.pedido.pendiente');
	Route::post('/pedidos', 'CarritoController@store')->name('pedido.cancelar');

	//pARA DAR DE BAJA UN PEDIDO y que el cliente vuelva a tener los mismos producto en el carrito
	Route::get('pedidos/{id}/baja','CarritoController@edit')->name('ver.pedido.baja');


    //Para la Cotizaciones el el usuario ya tiene que estar registrado y athenticado
	Route::resource('cotizaciones','CotizacionController');
	Route::post('cotizaciones/fotos','CotizacionController@store');

});




