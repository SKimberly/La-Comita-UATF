<?php

namespace Lacomita\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Lacomita\Models\Cotizacion;
use Lacomita\Models\CotizacionFoto;
use Lacomita\Models\Material;
use Lacomita\Models\Producto;
use Lacomita\Models\Talla;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotizaciones = Cotizacion::orderBy('id', 'DESC')->paginate(2);
        $productos = Producto::orderBy('id', 'ASC')->get();
        return view('cotizacion.index', compact('cotizaciones','productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::orderBy('id', 'ASC')->get();
        $tallas = Talla::orderBy('id', 'ASC')->get();
        $materiales = Material::orderBy('id', 'ASC')->get();
        return view('cotizacion.create', compact('productos','tallas','materiales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'productos' => 'required'
        ]);

        $cotizacion  = Cotizacion::create([
            'user_id' => auth()->user()->id
        ]);

        $cotizacion->productos()->attach($request->get('productos'));
        return redirect()->route('admin.cotizaciones.edit', $cotizacion);
        //return redirect('cotizacion.edit',compact('cotizacion'));

    }
    public function storefotos(Request $request, $id)
    {
        //dd($request->all());
        //aqui se guarda en l aplicacion carpeta storage y en la carpteta public con un simbolink link a la carpeta public del proyecto
        $foto = request()->file('foto')->store('public');

        //Aqui se guarda a la base de datos con el metodo Storage propio de laravel
        CotizacionFoto::create([
            'imagen' => Storage::url($foto),
            'cotizacion_id' => $id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cotizacion = Cotizacion::findOrFail($id);
        $productos = Producto::orderBy('id', 'ASC')->get();
        $tallas = Talla::orderBy('id', 'ASC')->get();
        $materiales = Material::orderBy('id', 'ASC')->get();

        return view('cotizacion.edit', compact('cotizacion','tallas','materiales','productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cotizacion = Cotizacion::findOrFail($id);
        $cotizacion->cantidad = $request['cantidad'];
        $cotizacion->descripcion = $request['descripcion'];
        $cotizacion->save();

        $cotizacion->productos()->sync($request->get('productos'));
        $cotizacion->tallas()->sync($request->get('tallas'));
        $cotizacion->materiales()->sync($request->get('materiales'));

        return redirect('admin/cotizaciones')->with('success', "Excelente... ahora espera la respuesta de la cotización!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foto = CotizacionFoto::find($id);
        //Aqui eliminamos la foto de la base de datos
        $foto->delete();

        //Aqui eliminamos la foto de nuestra carpeta del sitio Web de la carpeta "STORAGE"
        $rutafoto = str_replace('storage', 'public', $foto->imagen);
        Storage::delete($rutafoto);

        return back()->with('success', "Foto de la cotización eliminada!");
    }

    public function eliminartodo($id)
    {
        $cotizacion = Cotizacion::findOrFail($id);

        $cotizacion->productos()->detach();
        $cotizacion->tallas()->detach();
        $cotizacion->materiales()->detach();

        foreach($cotizacion->fotos as $foto)
        {
            $foto->delete();
            $rutafoto = str_replace('storage', 'public', $foto->imagen);
            Storage::delete($rutafoto);
        }

        $cotizacion->delete();

        return redirect('admin/cotizaciones')->with('success', "La cotización fue eliminada!");

    }
}
