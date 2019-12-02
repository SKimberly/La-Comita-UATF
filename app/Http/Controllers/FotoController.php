<?php

namespace Lacomita\Http\Controllers;

use Illuminate\Http\Request;
use Lacomita\Models\Producto;
use Lacomita\Models\ProductoFoto;
use File;

class FotoController extends Controller
{
    public function index($id)
    {
    	$producto = Producto::find($id);
    	$imagenes = $producto->fotos;
    	$imagenes = $producto->fotos()->orderBy('favorito','DESC')->get();
    	return view('admin.productos.fotos.index', compact('producto','imagenes'));
    }
    public function store(Request $request, $id)
    {

        $this->authorize('create', new Producto);

        $this->validate($request, [

            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',

        ]);
    	// 1) Guardamos la imagen en nuestro proyecto
        $file = $request->file('foto');  //obtiene lo que se envia el campo con el nombre file
        $path = public_path() . '/img/productos';  //es la ruta donde guardamos la imagen "public_path()"->es la rutahacia la carpeta public
        $fileName = uniqid() . $file->getClientOriginalName();//Definimos un nombre para el archivo "aqui es un ID unico concatenado con el nombre original del archivo que se sube"
        $moved = $file->move($path, $fileName);//Damos la orden al archivo para que se guarde con ese path y filename //$move=recibira true o false si la imagen guardo correctamente
        if($moved){ //si $move se guardo correctamente se guarda en la base de datos

        // 2) Creamos un registro en la tabla producto_fotos
            $productImage = new ProductoFoto();
            $productImage->imagen = $fileName;//->este nombre $fileName nos permitira mostar el archivo cuando se lo requieras
            //$productImage->featured = $fileName;-->false
            $productImage->producto_id = $id;
            $productImage->save();//INSERT
        }
        return back()->with('success', 'Imagen guardada correctamente!');
    }
    public function destroy(Request $request, $id)
    {

        $this->authorize('create', new Producto);
        //Primero eliminaremos la imagen del proyecto
        $productoFoto = ProductoFoto::find($request->foto_id);
        if(substr($productoFoto->imagen, 0, 4)==="http"){ // = = =
            $deleted = true;
        }else{
            $fullPath = public_path() . '/img/productos/'.$productoFoto->imagen;
            $deleted = File::delete($fullPath);//aqui eliminamos con delete
        }
        //Segundo eliminaremos el registro de la imagen en la base de datos
        if($deleted){ // $deleted devuelve true o false
            $productoFoto->delete();
        }
        return back()->with('success', 'Imagen Eliminada Correctamente!');
    }

    public function select($id, $image)
    {

        $this->authorize('create', new Producto);

        ProductoFoto::where('producto_id',$id)->update([
            'favorito' => false
        ]);
        $productoFoto = ProductoFoto::find($image);
        $productoFoto->favorito = true;
        $productoFoto->save();
        return back()->with('success', 'Seleccionaste esa imagen como favorito!');
    }

}
