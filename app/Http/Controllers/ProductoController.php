<?php

namespace Lacomita\Http\Controllers;

use Illuminate\Http\Request;
use Lacomita\Models\Producto;
use Lacomita\Models\Categoria;
use Lacomita\Models\ProductoFoto;

class ProductoController extends Controller
{
	//Aqui enviaremos los datos para mostrarlos en index.blade.php
    public function index(){
    	//Aqui devuelves a un vista
    	$productos = Producto::orderBy('created_at','DESC')->paginate(10);
    	//dd(Producto::paginate(10));
    	return view('admin.productos.index', compact('productos'));
    }

    //Aqui enviamos a la vista create.blade.php
    public function create(){
    	//Aqui devuelves a la vista donde esta el formulario de registro de productos
        $categorias = Categoria::orderBy('id','DESC')->get();
        //Con compact enviamos datos
        return view('admin.productos.create', compact('categorias'));
    }

    //Aqui vamos a guardar los datos
    public function store(Request $request){
        //validación
        $this->validate($request, [
            'nombre' => 'required|min:5|max:100',
            'descripcion' => 'required|min:10|max:150',
            'precio' => 'required',
            'categoria' => 'required',
        ]);

    	//aqui devolvemos a cualquier vista despues de haber creado los datos
        //dd($request->all());
         $producto = new Producto;
         $producto->nombre = $request['nombre'];
         $producto->descripcion = $request['descripcion'];
         $producto->detallelargo = $request['detallelargo'];
         $producto->precio = $request['precio'];
         $producto->categoria_id = $request['categoria'];
         $producto->save();

        return redirect('/admin/productos');
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
