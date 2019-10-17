<?php

namespace Lacomita\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('carrito.index',compact('detalles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carrito = auth()->user()->carrito;
        $carrito->estado = 'Pendiente';
        $carrito->save();
        return back()->with('success', "Tu pedido se ha registrado correctamente, tienes que realizar pago del 20% en las próximas 72 horas a partir de ahora!");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $cartDetail = new CarritoDetalle();
        $cartDetail->carrito_id = auth()->user()->carrito->id;
        $cartDetail->producto_id = $request['producto_id'];
        $cartDetail->cantidad = $request['cantidad'];
        $cartDetail->descripcion = $request['descripcion'];
        $cartDetail->save();

        $cartDetail->tallas()->attach($request->get('tallas'));

        return back()->with('success', 'Producto agregado al carrito!');
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
