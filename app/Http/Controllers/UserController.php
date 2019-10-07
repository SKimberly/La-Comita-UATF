<?php

namespace Lacomita\Http\Controllers;

use Illuminate\Http\Request;
use Lacomita\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(10);
        //dd(User::paginate(10));
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $this->validate($request, [
            'telefono' => 'required|min:5|max:12'
        ]);

        $user = User::findOrFail($id);
        $user->email = $request['email'];
        $user->telefono = $request['telefono'];

        if(!empty($request->password))
        {
            $this->validate($request, [
                'password' => 'min:5'
            ]);
            $user->password = bcrypt($request['password']);
        }

        $user->save();
        return back()->with('success','Actualizaste tu perfil.');

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
            'fullname' => 'required|min:5|max:50',
            'cedula' => 'required|min:5|max:12',
            'telefono' => 'required|min:5|max:12',
            'email' => 'unique:users,email',
            'password' => 'required|min:5',
            'tipo' => 'required',
        ]);
        //dd($request->all());
        $user = new User;
        $user->fullname = $request['fullname'];
        $user->cedula = $request['cedula'];
        $user->telefono = $request['telefono'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->tipo = $request['tipo'];
        $user->save();

        return redirect('/admin/users')->with('success', 'Usuario registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
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
        $this->validate($request, [
            'fullname' => 'required',
            'cedula' => 'required',
            'telefono' => 'required',
            'tipo' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->fullname = $request['fullname'];
        $user->cedula = $request['cedula'];
        $user->telefono = $request['telefono'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->tipo = $request['tipo'];
        $user->save();

        return redirect('admin/users')->with('success', 'Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('admin/users')->with('success', 'Usuario eliminado');
    }
}
