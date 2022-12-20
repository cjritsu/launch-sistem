<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis_cuti;
use App\Models\Jenis_Izin;
use App\Models\Unit_Kerja;
use App\Models\Departemen;
use App\Models\status_karyawan;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class AdminController extends Controller
{
    // Jenis Cuti
    public function index(){
        $Jenis_Cuti = Jenis_cuti::get();
        return view('pages.jenis_cuti', compact('Jenis_Cuti'));
    }
    public function store(Request $request){
        DB::insert('insert into jenis_cutis (name) values (?)', [$request->input('name')]);
        return redirect()->route('jenis_cuti.index');
    }
    public function destroy(Request $request){
        $data = $request->all();
        foreach ($data['jenis_cuti'] as $i => $id) {
            $Jenis_cuti = DB::table('jenis_cutis')->where('id', $id)->delete();
        }
        return redirect()->route('jenis_cuti.index');
    }

    // Jenis Izin
    public function index_izin(){
        $Jenis_izin = Jenis_Izin::get();
        return view('pages.jenis_izin', compact('Jenis_izin'));
    }
    public function store_izin(Request $request){
        DB::insert('insert into jenis__izins (name) values (?)', [$request->input('name')]);
        return redirect()->route('jenis_izin');
    }
    public function destroy_izin(Request $request){
        $data = $request->all();
        foreach ($data['jenis_izin'] as $i => $id) {
            $Jenis_Izin = DB::table('jenis__izins')->where('id', $id)->delete();
        }
        return redirect()->route('jenis_izin');
    }

    // Unit Kerja
    public function index_unit(){
        $Unit_Kerja = Unit_Kerja::latest()->paginate(10);
        $data['Unit_Kerja'] = Unit_Kerja::get();
        return view('pages.unit', compact('Unit_Kerja'), $data);
    }
    public function store_unit(Request $request){
        DB::insert('insert into unit_kerjas (name) values (?)', [$request->input('name')]);
        return redirect()->route('unit');
    }
    public function destroy_unit(Request $request){
        $data = $request->all();
        foreach ($data['unit_kerja'] as $i => $id) {
            $Unit_Kerja = DB::table('unit_kerjas')->where('id', $id)->delete();
        }
        return redirect()->route('unit');
    }

    // Jabatan
    public function index_jabatan(){
        $Jabatan = Departemen::latest()->paginate(5);
        $data['Jabatan'] = Departemen::get();
        return view('pages.jabatan', compact('Jabatan'), $data);
    }
    public function store_jabatan(Request $request){
        DB::insert('insert into jabatan (name) values (?)', [$request->input('name')]);
        return redirect()->route('jabatan');
    }
    public function destroy_jabatan(Request $request){
        $data = $request->all();
        foreach ($data['jabatan'] as $i => $id) {
            $Departemen = DB::table('jabatan')->where('id', $id)->delete();
        }
        return redirect()->route('jabatan');
    }

    // Status Karyawan
    public function index_status_karyawan(){
        $Sts_Karya = status_karyawan::get();
        return view('pages.status_karyawan', compact('Sts_Karya'));
    }
    public function store_status_karyawan(Request $request){
        DB::insert('insert into status_karyawans (name) values (?)', [$request->input('name')]);
        return redirect()->route('sts_karya');
    }
    public function destroy_status_karyawan(Request $request){
        $data = $request->all();
        foreach ($data['status_karyawan'] as $i => $id) {
            $status_karyawan = DB::table('status_karyawans')->where('id', $id)->delete();
        }
        return redirect()->route('sts_karya');
    }

    // Roles & Permission
    public function index_rp(){
        $Roles = Role::get();
        $Permission = Permission::get();
        return view('pages.roles_and_permission', compact('Roles', 'Permission'));
    }
    public function store_rp(Request $request){
        if ($request->input('roles_name') !== null && $request->input('permit_name') !== null) {
            DB::insert('insert into roles (name, guard_name, created_at, updated_at) values (?, ?, ?, ?)', [$request->input('roles_name'), 'web', now(), now()]);
            DB::insert('insert into permissions (name, guard_name, created_at, updated_at) values (?, ?, ?, ?)', [$request->input('permit_name'), 'web', now(), now()]);
        }
        elseif ($request->input('permit_name') !== null) {
            DB::insert('insert into permissions (name, guard_name, created_at, updated_at) values (?, ?, ?, ?)', [$request->input('permit_name'), 'web', now(), now()]);
        }
        else {
            DB::insert('insert into roles (name, guard_name, created_at, updated_at) values (?, ?, ?, ?)', [$request->input('roles_name'), 'web', now(), now()]);
        }
        app()['cache']->forget('spatie.permission.cache');
        return redirect()->route('rp');
    }

    public function update_rp(Request $request){
        $data = $request->all();

        foreach ($data['roles'] as $i => $id) {
            $Role = Role::find($id);
            $Role->name = $request->input('roles');
        }
        $Role->syncPermissions($request->input('permissions'));
        return redirect()->route('rp');
    }

    public function destroy_rp(Request $request){
        $data['roles'] = $request->all();
        foreach ($data['roles'] as $i => $id) {
            $Role = DB::table('roles')->where('id', $id)->delete();
            DB::table('role_has_permissions')->where('role_id', $id)->delete();
        }

        $data['permissions'] = $request->all();
        foreach ($data['permissions'] as $i => $id) {
            $Permission = DB::table('permissions')->where('id', $id)->delete();
            DB::table('role_has_permissions')->where('permission_id', $id)->delete();
        }
        return redirect()->route('rp');
    }
}
