<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\SessionGuard;
use App\Models\Departemen;
use App\Models\Unit_Kerja;
use Spatie\Permission\Models\Role;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $request->validate ([
            'nip' => ['required', 'string', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'roles' => ['required'],
            'agree_terms_and_conditions' => ['required'],
        ]);
        $user = User::create($request->all());
        $user->assignRole($request->input('roles'));
        return redirect()->route('user.index')->with('success', 'Selamat telah menambahkan akun');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $data['roles'] = Role::pluck('name', 'name')->all();
        $data['userRole'] = $user->roles->pluck('name', 'name')->all();
        return view('users.edit', compact('user'), $data);
    }

    public function update(UserRequest $request, $id)
    {
        // $request->validate ([
        //     'nip' => ['required', 'string', 'unique:users'],
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'email', 'unique:users'],
        //     'password' => ['same:confirm-password'],
        //     'roles' => ['required'],
        // ]);

        $user = User::find($id);
        $user->update($request->all());
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('user.index')->with('success', 'Telat Berhasil Diupdate');
    }

    public function destroy(User $model, $id) {
        DB::delete('delete from users where id = ?', [$id]);
        return redirect()->route('user.index')->with('success', 'Telah Berhasil Dihapus');
    }
}
