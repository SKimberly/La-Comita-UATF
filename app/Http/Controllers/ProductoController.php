<?php

namespace Lacomita\Http\Controllers;

use Illuminate\Http\Request;
use Lacomita\Models\Producto;
use Lacomita\Models\Categoria;
use Lacomita\Models\ProductoFoto;
use Lacomita\Models\Talla;

class ProductoController extends Controller
{
	//Aqui enviaremos los datos para mostrarlos en index.blade.php
    public function index(){
    	//Aqui devuelves a un vista
    	$productos = Producto::orderBy('id','DESC')->paginate();
    	//dd(Producto::paginate(10));
    	return view('admin.productos.index', compact('productos'));
    }

    //Aqui enviamos a la vista create.blade.php
    public function create(){
        $this->authorize('create', new Producto);
    	//Aqui devuelves a la vista donde esta el formulario de registro de productos
        $categorias = Categoria::orderBy('id','DESC')->get();
        //Le mandamos tambien las tallas
        $tallas = Talla::all();
        //Con compact enviamos datos
        return view('admin.productos.create', compact('categorias','tallas'));
    }

    //Aqui vamos a guardar los datos
    public function store(Request $request){
        //dd($request->all());
        //validación
        $this->validate($request, [
            'nombre' => 'required|min:5|max:100',
            'descripcion' => 'required|min:10|max:150',
            'precio' => 'required',
            'categoria' => 'required',
            'tallas' => 'required',
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

         //La funcion "attach" adjunta un array depalabras en un sola columna
         $producto->tallas()->attach($request->get('tallas'));

        return redirect('/admin/productos')->with('success', 'Producto creado correctamente!');
    }

    //Aqui vamos a edevolver a la vista edit.blade.php
    public function edit($id){
        $this->authorize('update', new Producto);
    	//Aqui devolvemos datos del producto a editar a la vista edit.blade.php reciviendo un (id) del producto
        $producto = Producto::find($id);
        $categorias = Categoria::orderBy('id','DESC')->get();
        $tallas = Talla::orderBy('id','DESC')->get();
        //dd($producto);
        return view('admin.productos.edit', compact('producto','categorias','tallas'));
    }

    //Aqui actualizamos los datos
    public function update(Request $request, $id){
    	//Aqui devolvemos a cualquier vista despues de haber actualizado los datos
         $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'categoria' => 'required',
            'tallas' => 'required',
        ]);

         $producto = Producto::findOrFail($id);
         $producto->nombre = $request['nombre'];
         $producto->descripcion = $request['descripcion'];
         $producto->detallelargo = $request['detallelargo'];
         $producto->precio = $request['precio'];
         $producto->categoria_id = $request['categoria'];
         $producto->save();

         //La funcion "sync" adjunta un array depalabras para actualizar
         $producto->tallas()->sync($request->get('tallas'));

         return redirect('admin/productos')->with('success', 'Producto Actualizado!');
    }

    //Recibimos el id del producto a eliminar
    public function destroy($id){

        $this->authorize('delete', new Producto);

        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect('admin/productos')->with('success', 'Producto Eliminado!');

    }

	// Recibe un id para enviar a cualquier vista solo de ese producto
    public function show($id){

    }
}
