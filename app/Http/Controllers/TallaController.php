<?php

namespace Lacomita\Http\Controllers;

use Illuminate\Http\Request;
use Lacomita\Models\Categoria;
use Lacomita\Models\Talla;

class TallaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('create', new Categoria);

        $tallas = Talla::orderBy('id', 'DESC')->paginate(10);
        return view('admin.tallas.index', compact('tallas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nombre' => 'required'
        ]);
        //dd($request->all());
        Talla::create($request->all());
        return redirect('admin/tallas#')->with('success', 'Nueva talla creada correctamente');
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
        $talla = Talla::find($id);
        return view('admin.tallas.edit', compact('talla'));
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
        //dd($request->all());
        $this->validate($request, [
            'nombre' => 'required'
        ]);

        $talla = Talla::find($id);
        $talla->nombre = $request['nombre'];
        $talla->descripcion = $request['descripcion'];
        $talla->save();
        return redirect('admin/tallas')->with('success', 'Talla actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $talla = Talla::find($id);
        $talla->delete();
        return redirect('admin/tallas')->with('success', 'Talla eliminada Correctamente');
    }
}
