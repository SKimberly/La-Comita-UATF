<?php

namespace Lacomita\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Lacomita\Material;
use Lacomita\Models\Cotizacion;
use Lacomita\Models\CotizacionFoto;
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
    /*public function store(Request $request)
    {
        //dd($request->all());
        //aqui se guarda en l aplicacion carpeta storage y en la carpteta public con un simbolink link a la carpeta public del proyecto
        $foto = request()->file('foto')->store('public');

        //Aqui se guarda a la base de datos con el metodo Storage propio de laravel
        CotizacionFoto::create([
            'imagen' => Storage::url($foto),
            'cotizacion_id' => 1
        ]);
    }*/

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
