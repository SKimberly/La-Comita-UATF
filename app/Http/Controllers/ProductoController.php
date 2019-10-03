<?php

namespace Lacomita\Http\Controllers;

use Illuminate\Http\Request;
use Lacomita\Models\Producto;

class ProductoController extends Controller
{
	//Aqui enviaremos los datos para mostrarlos en index.blade.php
    public function index(){
    	//Aqui devuelves a un vista
    	$productos = Producto::paginate(10);
    	//dd(Producto::paginate(10));
    	return view('admin.productos.index', compact('productos'));
    }

    //Aqui enviamos a la vista create.blade.php
    public function create(){
    	//Aqui devuelves a la vista donde esta el formulario de registro de productos
        return view('admin.productos.create');
    }

    //Aqui vamos a guardar los datos
    public function store(Request $request){
    	//aqui devolvemos a cualquier vista despues de haber creado los datos
    }

    //Aqui vamos a edevolver a la vista edit.blade.php
    public function edit($id){
    	//Aqui devolvemos datos a la vista edit.blade.php reciviendo un (id) del producto
    }

    //Aqui actualizamos los datos
    public function update(Request $request, $id){
    	//Aqui devolvemos a cualquier vista despues de haber actualizado los datos
    }

    //Recibimos el id del producto a eliminar
    public function destroy($id){
    	//Aqui eliminamos los datos
    }

	// Recibe un id para enviar a cualquier vista solo de ese producto
    public function show($id){

    }
}
