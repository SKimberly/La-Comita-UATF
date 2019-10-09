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
    	$productos = Producto::orderBy('id','DESC')->paginate(10);
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

        $nomcate = Categoria::find($request->categoria);
        if(strcasecmp($request['nombre'] , $nomcate->nombre) === 0)
        {
             return back()->withInput()->withErrors(['El nombre del producto no debe ser igual al nombre de la categoria.']);
        }
    	//aqui devolvemos a cualquier vista despues de haber creado los datos
        //dd($request->all());
         $producto = new Producto;
         $producto->nombre = $request['nombre'];
         $producto->descripcion = $request['descripcion'];
         $producto->detallelargo = $request['detallelargo'];
         $producto->precio = $request['precio'];
         $producto->categoria_id = $request['categoria'];
         $producto->save();

        return redirect('/admin/productos')->with('success', 'Producto creado correctamente!');
    }

    //Aqui vamos a edevolver a la vista edit.blade.php
    public function edit($id){
    	//Aqui devolvemos datos del producto a editar a la vista edit.blade.php reciviendo un (id) del producto
        $producto = Producto::find($id);
        $categorias = Categoria::orderBy('id','DESC')->get();
        //dd($producto);
        return view('admin.productos.edit', compact('producto','categorias'));
    }

    //Aqui actualizamos los datos
    public function update(Request $request, $id){
    	//Aqui devolvemos a cualquier vista despues de haber actualizado los datos
         $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'categoria' => 'required',
        ]);

         $producto = Producto::findOrFail($id);
         $producto->nombre = $request['nombre'];
         $producto->descripcion = $request['descripcion'];
         $producto->detallelargo = $request['detallelargo'];
         $producto->precio = $request['precio'];
         $producto->categoria_id = $request['categoria'];
         $producto->save();

         return redirect('admin/productos')->with('success', 'Producto Actualizado!');
    }

    //Recibimos el id del producto a eliminar
    public function destroy($id){
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect('admin/productos')->with('success', 'Producto Eliminado!');

    }

	// Recibe un id para enviar a cualquier vista solo de ese producto
    public function show($id){

    }
}
