<?php

namespace Lacomita\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Lacomita\Models\Carrito;
use Lacomita\Models\Pedido;
use Lacomita\Notifications\PedidoCreado;
use Lacomita\User;

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
        $carrito->codigo = $carrito->id.'/'.date('Y-M-d').'-Carri';
        $carrito->estado = 'Pendiente';
        $carrito->fecha_orden = Carbon::now();
        $carrito->save();

        Pedido::create([
            'carrito_id' => $carrito->id,
            'cotizacion_id' => 0,
            'usuario' => auth()->user()->id
        ]);

        $admin = User::where('tipo','Administrador')->first();
        $admin->notify(new PedidoCreado($carrito));

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
    {   //dd($id);

        $carrito = Carrito::find($id);
        if($carrito->anticipo !== 0)
        {
            \Alert::error('No se puede dar de baja por que ya se realizo un anticipo!', 'Oops!')->persistent("Cerrar");
            return redirect('admin/pedidos');
        }
        \DB::table('carritos')->where('user_id', $carrito->user_id)->where('estado','Activo')->delete();
        $carrito->estado = 'Activo';
        $carrito->save();


        return back()->with('success', "El pedido se dio de baja. Ahora el cliente puede volver a verlo en su carrito de compras!");
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
