<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\SessionGuard;
use App\Models\Departemen;
use App\Models\Unit_Kerja;
use App\Models\Karyawan;
use App\Models\status_karyawan;
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
        $users = User::orderBy('name', 'ASC')->where('roles_id', '!=', '1')->paginate(10);
        $karyawan = Karyawan::with('User', 'Unit_Kerja', 'Departemen', 'status_karyawan')->get();
        return view('users.index', compact('users', 'karyawan'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();
        $unit_kerja = Unit_Kerja::pluck('name', 'id')->prepend('Silakan Pilih Unit Kerja');
        $jabatan = Departemen::pluck('name', 'id')->prepend('Silakan Pilih Jabatan');
        $status_karyawan = status_karyawan::pluck('name', 'id')->all();
        return view('users.create', compact('roles', 'unit_kerja', 'jabatan', 'status_karyawan'));
    }

    public function store(UserRequest $request)
    {
        $request->validate ([
            'nip' => ['required', 'string', 'unique:users,nip'],
            'name' => ['required', 'string', 'max:255'],
            'unit_kerja_id' => ['required'],
            'jabatan_id' => ['required'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'roles_id' => ['required'],
            'status_karyawan_id' => ['required'],
            'agree_terms_and_conditions' => ['required'],
        ]);
        $user = User::create($request->only('nip', 'name', 'email', 'password', 'roles_id', 'agree_terms_and_conditions', 'created_at' ?: now()));
        $user->assignRole($request->input('roles_id'));
        DB::insert('insert into karyawans (user_id, unit_kerja_id, jabatan_id, status_karyawan_id, created_at) values (?, ?, ?, ?, ?)', [$user->id,  $request->input('unit_kerja_id'), $request->input('jabatan_id'), $request->input('status_karyawan_id'), now()]);

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
        $data['roles'] = Role::pluck('name', 'id')->all();
        return view('users.edit', compact('user'), $data);
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('user.index')->with('success', 'Telat Berhasil Diupdate');
    }

    public function destroy(User $model, $id) {
        $user = User::find($id);
        DB::delete('delete from karyawans where user_id = ?', [$user->id]);
        DB::delete('delete from users where id = ?', [$id]);
        return redirect()->route('user.index')->with('success', 'Telah Berhasil Dihapus');
    }

    public function search(Request $request) {
        $search = $request->search;
        $users = User::where('name', 'like', "%" . $search . "%")->where('name', '!=', 'Admin Admin')->orWhere('nip', 'like', "%".$search."%")->where('nip', '!=', 'admin')->paginate();
        return view('users.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
