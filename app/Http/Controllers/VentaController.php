<?php

namespace Lacomita\Http\Controllers;

use Illuminate\Http\Request;
use Lacomita\Models\Carrito;
use Lacomita\Models\Cotizacion;
use Lacomita\Models\Pedido;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::where('anticipo','!=',0)->orderBy('updated_at','DESC')->get();
        //dd($pedido->cotizacion->user_id);
        return view('ventas.index', compact('pedidos'));
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
        $pedido = Pedido::find($request['pedido_id']);
        $pedido->pago = $pedido->pago+$request['pago'];
        $pedido->save();

        return redirect('admin/ventas#')->with('success', "Excelente... El pago fue actualizado!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::find($id);
        if($pedido->carrito_id != 0){
            Carrito::where('id',$pedido->carrito_id)
                    ->update(['estado'=>'Finalizado']);
        }else{
            Cotizacion::where('id',$pedido->cotizacion_id)
                    ->update(['estado'=>'Finalizado']);
        }
        return redirect('admin/ventas')->with('success', "Excelente... la venta fue FINALIZADA!");
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
        //
    }
}
