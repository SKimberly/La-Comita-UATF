<?php

namespace Lacomita\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'nombre' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'contenido' => 'required'
        ]);

        $deEmail = $request->email;
        $deNombre = $request->nombre;
        Mail::send('emails.contacto',$request->all(), function($msj) use($deEmail,$deNombre){
            $msj->cc($deEmail);
            $msj->from($deEmail, $deNombre );
            $msj->subject('Mensaje recibido desde el contacto del sitio web Sport La Comita');
            $msj->to('sport.lacomita19@gmail.com');
        });
        return redirect('/#contacto')->with('success', 'Mensaje enviado correctamente... Se te enviara la respuesta a tu correo o celular!');
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
        //
    }
}
