<?php

namespace Lacomita\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Lacomita\Models\Cotizacion;
use Lacomita\Models\Mensaje;
use Lacomita\Notifications\MensajeEnviado;
use Lacomita\User;

class MensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //aqui estoy obteniendo las notificaciones del usuario autentificado y le envia
        //a la vista index
        //$mensajes = auth()->user()->notifications;
        return view('mensajes.index',[
            'msjnoleidos' => auth()->user()->unreadNotifications,
            'msjleidos' => auth()->user()->readNotifications
        ]);

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
            'cotiza_id' => 'required',
            'recibido_id' => 'required|exists:users,id',
            'mensaje' => 'required'
        ]);

        $mensaje = Mensaje::create([
            'cotiza_id' => $request->cotiza_id,
            'envio_id' => auth()->id(),
            'recibido_id' => $request->recibido_id,
            'contenido' => $request->mensaje
        ]);
        //aqui se recibe el usuario para enviar la notificacion
        $recibido = User::find($request->recibido_id);
        //aqui estoy enviando la notificacion
        $recibido->notify(new MensajeEnviado($mensaje));

        return back()->with('success', 'Mensaje enviado. Si el usuario responde lo recibirá en la sección de mensajes del sitio web.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //aqui estoy agarrando uno de los mensajes q el usuario quiere ver
        $mensaje = Mensaje::findOrFail($id);

        $coticodigo = Cotizacion::find($mensaje->cotiza_id)->pluck('codigo');

        return view('mensajes.show', compact('mensaje','coticodigo'));
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
         //aqui encuentro el mensaje en la tabla 'notifications'. y la elimino
        DatabaseNotification::find($id)->delete();

        return back()->with('success', 'Mensaje eliminado.');
    }
    public function marcar($id)
    {
        //aqui encuentro el mensaje en la tabla 'notifications'. y lo marco como leida
        DatabaseNotification::find($id)->markAsRead();

        return back()->with('success', 'Mensaje marcado como leido.');
    }
}
