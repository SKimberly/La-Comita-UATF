<?php

namespace Lacomita\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Lacomita\Models\Carrito;
use Lacomita\Models\CarritoDetalle;

class CarritoDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalles = auth()->user()->carrito->detalles;
        $carrito = auth()->user()->carrito;
        return view('carrito.index',compact('detalles', 'carrito'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'cantidad' => 'required',
            'tallas' => 'required'
        ]);

        //dd($request->all());
        if(Auth::guest())
        {
            \Alert::error('Tienes que registrarte e autentificarte primero!', 'Oops!')->persistent("Cerrar");
            return redirect('/login');
        }else{
            $cartDetail = new CarritoDetalle();
            $cartDetail->carrito_id = auth()->user()->carrito->id;
            $cartDetail->producto_id = $request['producto_id'];
            $cartDetail->cantidad = $request['cantidad'];
            $cartDetail->descripcion = $request['descripcion'];
            $cartDetail->save();

            $cartDetail->tallas()->attach($request->get('tallas'));

            return redirect('/#producto')->with('success', 'Producto agregado al carrito!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carrito = Carrito::findOrFail($id);
        $detalles = $carrito->detalles;
        return view('carrito.index',compact('detalles','carrito'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $detalle = CarritoDetalle::find($id);
        //si el id del carrito es igual al usuario autentificado su carrito_id, hara la eliminacion
        if ($detalle->carrito_id == auth()->user()->carrito->id) {
            $detalle->delete();
        }
        return back()->with('success', 'Producto eliminado del carrito!');
    }
}
