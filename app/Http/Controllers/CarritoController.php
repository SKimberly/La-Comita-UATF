<?php

namespace Lacomita\Http\Controllers;

use Illuminate\Http\Request;
use Lacomita\Models\Carrito;
use Lacomita\User;
use Carbon\Carbon;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carritos = Carrito::where('estado','Pendiente')->orderBy('updated_at', 'DESC')->paginate(10);
        return view('pedido.index', compact('carritos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carrito = auth()->user()->carrito;
        $carrito->fecha_orden = Carbon::now();
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
        $this->validate($request, [
            'anticipo' => 'required',
            'fecha_entrega' => 'required'
        ]);

        $carrito = Carrito::where('id',$request['carrito_id'])->first();
        $carrito->anticipo = $request['anticipo'];
        $carrito->fecha_entrega = $request['fecha_entrega'];
        $carrito->save();
        return redirect('/admin/pedidos')->with('success', "Excelente... ahora prepararemos el pedido!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Aqui mostraremos el pedido que esta pendiente recibimos un id de carrito
        $carrito = Carrito::findOrFail($id);
        $user = User::findOrFail($carrito->user_id);
        $detalle = Carrito::where('id',$id)->first();
        $detalles = $detalle->detalles;
        //dd($detalles->all());

        return view('pedido.show', compact('user','detalles','carrito'));
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
        dd($id);
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
