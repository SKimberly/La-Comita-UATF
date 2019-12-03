<?php

namespace Lacomita\Http\Controllers;

use Illuminate\Http\Request;
use Lacomita\Http\Requests\UserGuardarRequest;
use Lacomita\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->authorize('view', new User);

        if( auth()->user()->hasRole('Super-Admin') ){
            $users = User::where('id','!=',auth()->user()->id)->orderBy('id', 'DESC')->paginate();
        }
        if( auth()->user()->hasRole('Administrador')){
            $users = User::where('id','!=',auth()->user()->id)->where('tipo','!=','Super-Admin')->orderBy('id', 'DESC')->paginate();
        }
        if( auth()->user()->hasRole('Ventas')){
            $users = User::where('id','!=',auth()->user()->id)->where('tipo','!=','Administrador')->where('tipo','!=','Super-Admin')->orderBy('id', 'DESC')->paginate();
        }

        //dd(User::paginate(10));
        $roles = Role::where('name','!=','Super-Admin')->get();

        return view('admin.users.index', compact('users','roles'));
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
    public function store(UserGuardarRequest $request)
    {
        //Estoy validando con el archi UserGuardarRequest
        /*$this->validate($request, [
            'fullname' => 'required|min:5|max:50',
            'cedula' => 'required|min:5|max:12',
            'telefono' => 'required|min:5|max:12',
            'email' => 'unique:users,email',
            'password' => 'required|min:5',
            'tipo' => 'required',
        ]);*/
        //dd($request->all());
        $this->authorize('create', new User);

        $user = new User;
        $user->fullname = $request['fullname'];
        $user->cedula = $request['cedula'];
        $user->telefono = $request['telefono'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->tipo = $request->roles[0];
        $user->save();
        //Aqui guardo al rol del usuario en la tabla roles
        $user->assignRole($request->roles);

        return redirect('/admin/users#')->with('success', 'Usuario registrado correctamente');
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
        $this->authorize('create', new User);
        $user = User::find($id);
        $roles = Role::where('name','!=','Super-Admin')->get();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserGuardarRequest $request, $id)
    {
        //dd($request->all());
        //Estoy validando via UserGuardarRequest
        /*$this->validate($request, [
            'fullname' => 'required',
            'cedula' => 'required',
            'telefono' => 'required',
            'tipo' => 'required',
        ]);*/

        $user = User::findOrFail($id);
        $user->fullname = $request['fullname'];
        $user->cedula = $request['cedula'];
        $user->telefono = $request['telefono'];
        $user->email = $request['email'];
        if(!empty($request['password']))
        {
            $user->password = bcrypt($request['password']);
        }
        $user->save();

        $user->syncRoles($request->roles);

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
        $this->authorize('create', new User);
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('admin/users')->with('success', 'Usuario eliminado');
    }
}
