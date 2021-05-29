<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware("can:Ler Usuários")->only('index');
        $this->middleware("can:Edita Usuários")->only('edit','update');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'roles'=>'required',
        ]);
        if($request->has('password') && $request->get('password')):
            $user->update([
                'password'=>bcrypt($request->get('password'))
            ]);
        endif;
        $user->roles()->sync($request->input('roles'));
        return back()->with('info','Usuário atualizado com sucesso :)');
    }

}
