<?php

namespace Lacomita\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Lacomita\Models\Carrito;
use Lacomita\Models\Cotizacion;
use Lacomita\Models\Pedido;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::orderBy('id','DESC')->get();
        //dd($pedido->cotizacion->user_id);
        return view('pedido.index', compact('pedidos'));
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
            'anticipo' => 'required',
            'fecha_entrega' => 'required'
        ]);
        if($request->fecha_entrega > date('Y-m-d')){
            if(isset($request->carrito_id)){
                $carrito = Pedido::where('carrito_id', $request['carrito_id'])->first();
                $carrito->anticipo = $request['anticipo'];
                $carrito->fecha_entrega = $request['fecha_entrega'];
                $carrito->observaciones = $request['observaciones'];
                $carrito->save();

                Carrito::where('id', $request->carrito_id)
                      ->update(['estado' => 'Procesando']);

            }else{
                $cotizacion = Pedido::where('cotizacion_id', $request['cotizacion_id'])->first();
                $cotizacion->anticipo = $request['anticipo'];
                $cotizacion->fecha_entrega = $request['fecha_entrega'];
                $cotizacion->observaciones = $request['observaciones'];
                $cotizacion->save();

                Cotizacion::where('id', $request->cotizacion_id)
                      ->update(['estado' => 'Procesando']);
            }

        }else{
            \Alert::error('La fecha de entrega no puede ser menor a la fecha actual!', 'Oops!')->persistent("Cerrar");
            return back();
        }
        return redirect('/admin/pedidos')->with('success', "Excelente... ahora el pedido está en PROCESO!");

    }

    /**
     * Display the specified resource.
     *
     * @param  \Lacomita\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Lacomita\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Lacomita\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Lacomita\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
