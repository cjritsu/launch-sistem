<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Unit_Kerja;
use App\Models\status_karyawan;
use App\Models\Karyawan;
use App\Models\Departemen;
use DB;

class KaryawanController extends Controller
{
    public function index() {
        $karyawan = Karyawan::select('*')->join('users', 'karyawans.user_id', '=', 'users.id')->where('user_id', '!=', 1)->orderBy('users.name', 'ASC')->paginate(10);
        $data['karyawan'] = Karyawan::with('User', 'Unit_Kerja', 'Departemen', 'status_karyawan')->get();
        return view('karyawan.index', compact('karyawan'), $data);
    }

    public function edit($id)
    {
        $karyawans = Karyawan::with('Departemen')->find($id);
        $data['user'] = User::where('id', $karyawans->user_id)->first();
        $data['karyawans'] = Karyawan::with('User', 'Unit_Kerja', 'Departemen', 'status_karyawan')->where('id', $id)->first();
        $data['unit_kerja_id'] = Unit_Kerja::where('name', '!=', 'Admin')->pluck('name', 'id');
        $data['jabatan_id'] = Departemen::where('name', '!=', 'Admin')->pluck('name', 'id');
        $data['status_karyawan'] = status_karyawan::pluck('name', 'id');
        return view('karyawan.edit', compact('karyawans'), $data);
    }

    public function update(Request $request, $id)
    {
        $karyawans = Karyawan::find($id);
        $jatah_cuti = $request->input('jatah_cuti');

        $agama = $request->input('agama');
        $tmpt_lahir = $request->input('tmpt_l');
        $tgl_lahir = $request->input('tgl_l');
        $no_telp = $request->input('no_hp');
        $alamat = $request->input('alamat');
        $unit = $request->input('unit_kerja_id');
        $jabatan = $request->input('jabatan_id') ?: old('jabatan_id');
        $status_karyawan = $request->input('status_karyawan');

        $karyawan_update = DB::update('update karyawans set agama = ?, tempat_lahir = ?, tanggal_lahir = ?, no_telp = ?, alamat = ?, unit_kerja_id = ?, jabatan_id = ?, status_karyawan_id = ? where id = ?', [$agama, $tmpt_lahir, $tgl_lahir, $no_telp, $alamat, $unit, $jabatan, $status_karyawan, $id]);
        DB::update('update users set jatah_cuti = ? where id = ?', [$jatah_cuti, $karyawans->user_id]);
        return back()->withStatus(__('Profile successfully updated.'));
    }

    public function search(Request $request) {
        $search = $request->search;
        $karyawan = Karyawan::whereHas('User', function($q) use($search) {
            $q->where('name', 'like', "%".$search."%")->where('name', '!=', 'Admin Admin')->orWhere('nip', 'like', "%".$search."%")->where('nip', '!=', 'admin');
        })->orwhereHas('Departemen', function($d) use($search) {
            $d->where('name', 'like', "%".$search."%")->where('name', '!=', 'Admin');
        })->orwhereHas('Unit_Kerja', function($u) use($search) {
            $u->where('name', 'like', "%".$search."%")->where('name', '!=', 'Admin');
        })->paginate();
        return view('karyawan.index', compact('karyawan'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function reset(User $user) {
        $user = DB::table('users')->update(['jatah_cuti' => 12]);
        return redirect()->route('karyawan.index', compact('user'));
    }
}
