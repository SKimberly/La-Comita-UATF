<?php

namespace Lacomita\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Lacomita\Models\Carrito;
use Lacomita\Models\CarritoDetalle;
use Lacomita\Models\Cotizacion;
use Lacomita\Models\Pedido;
use Lacomita\Models\Producto;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(auth()->user()->id);
        if( auth()->user()->hasRole('Super-Admin') || auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Ventas')){
            $pedidos = Pedido::where('observaciones','!=','Baja')->where('anticipo',0)->orderBy('id','DESC')->get();
        }
        if( auth()->user()->hasRole('Cliente')){
            $pedidos = Pedido::where('usuario',auth()->user()->id)->where('observaciones','!=','Baja')->where('anticipo',0)->orderBy('id','DESC')->get();
        }
        //dd($pedidos);
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(auth()->user()->roles->first()->name);
        $this->authorize('create', new Pedido);
        //dd($request->all());
        $this->validate($request, [
            'anticipo' => 'required|regex:/^[1-9][0-9]+$/i|not_in:0',
            'fecha_entrega' => 'required'
        ]);
        if($request->fecha_entrega > date('Y-m-d')){
            if(isset($request->carrito_id)){

                //Aqui encuentro el carrito para la suma del total del precio del producto
                $detalles = CarritoDetalle::where('carrito_id',$request['carrito_id'])->get();
                $totalpre = 0;
                foreach($detalles as $detalle){
                    $totalpre = $totalpre+($detalle->producto->precio*$detalle->cantidad);
                }
                ////
                if($request['anticipo'] > $totalpre){
                    \Alert::error('El anticipo no puede ser mayor al monto total!', 'Oops!')->persistent("Cerrar");
                    return back();
                }
                $carrito = Pedido::where('carrito_id', $request['carrito_id'])->first();
                $carrito->anticipo = $request['anticipo'];
                $carrito->montototal =  $totalpre;
                $carrito->fecha_entrega = $request['fecha_entrega'];
                $carrito->observaciones = $request['observaciones'];
                $carrito->save();

                Carrito::where('id', $request->carrito_id)
                      ->update(['estado' => 'Procesando', 'fecha_orden' => Carbon::now()]);

            }else{
                $cotizacion = Pedido::where('cotizacion_id', $request['cotizacion_id'])->first();
                $cotizacion->montototal = $request['montototal'];
                $cotizacion->anticipo = $request['anticipo'];
                $cotizacion->fecha_entrega = $request['fecha_entrega'];
                $cotizacion->observaciones = $request['observaciones'];
                $cotizacion->save();

                Cotizacion::where('id', $request->cotizacion_id)
                      ->update(['estado' => 'Procesando', 'fecha_orden' => Carbon::now()]);
            }

        }else{
            \Alert::error('La fecha de entrega no puede ser menor a la fecha actual!', 'Oops!')->persistent("Cerrar");
            return back();
        }
        return redirect('/admin/ventas')->with('success', "Excelente... ahora el pedido está en PROCESO!");

    }
    public function show($id)
    {
        $cotizacion = Cotizacion::findOrFail($id);
        $pedido = Pedido::where('cotizacion_id',$cotizacion->id)->first();

        $this->authorize('create',new Pedido);
        //dd($pedido);
        return view('cotizacion.show', compact('cotizacion','pedido'));
    }
    /**
     Esto ES PARA DAR DE BAJA A UNA COTIZACION
     */
    public function bajacotiza($id)
    {
        $pedido = Pedido::where('cotizacion_id',$id)->first();
        $this->authorize('view',$pedido);
            //return "es coti ".$id;
        $cotizacion = Cotizacion::findOrFail($id);
        $cotizacion->estado = 'Activo';
        $cotizacion->save();

        Pedido::where('cotizacion_id',$id)->update(['observaciones' => 'Baja']);

        return back()->with('success', "Excelente... tu pedido fue dado de baja!");
    }

    /**
     ESTA FINCION ES PARA DAR DE BAJA A UN CARRITO
     */
    public function edit($id)
    {
        $pedido = Pedido::where('carrito_id',$id)->first();
        $this->authorize('view',$pedido);
        //dd($id);
        $nuevoca = Carrito::where('user_id',auth()->user()->id)->where('estado','Activo')->first();

        CarritoDetalle::where('carrito_id',$nuevoca->id)->update(['carrito_id' => $id ]);

        Carrito::where('id',$nuevoca->id)->where('estado','Activo')->delete();

        Carrito::where('id',$id)->update(['estado' => 'Activo']);

        Pedido::where('carrito_id',$id)->update(['observaciones' => 'Baja']);

        return back()->with('success', "Excelente... tu pedido fue dado de baja!");
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
