<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Unit_Kerja;
use App\Models\status_karyawan;
use App\Models\Karyawan;
use App\Models\Departemen;

class KaryawanController extends Controller
{
    public function index() {
        $data['karyawan'] = Karyawan::with('User', 'Unit_Kerja', 'Departemen', 'status_karyawan')->get();
        $karyawan = Karyawan::orderBy('user_id', 'ASC')->paginate(10);
        return view('karyawan.index', compact('karyawan'), $data);
    }

    public function edit($id)
    {
        $karyawans = Karyawan::find($id);
        $data['karyawans'] = Karyawan::with('User', 'Unit_Kerja', 'Departemen', 'status_karyawan')->where('id', $id)->first();
        $data['unit_kerja_id'] = Unit_Kerja::pluck('name', 'id');
        $data['jabatan_id'] = Departemen::pluck('name', 'id');
        $data['status_karyawan'] = status_karyawan::pluck('name', 'id');
        return view('karyawan.edit', compact('karyawans'), $data);
    }

    public function update(Request $request, $id)
    {
        $karyawans = Karyawan::find($id);
        $agama = $request->input('agama');
        $tmpt_lahir = $request->input('tmpt_l');
        $tgl_lahir = $request->input('tgl_l');
        $no_telp = $request->input('no_hp');
        $alamat = $request->input('alamat');
        $user_id = Karyawan::where('id', $id)->first();
        DB::update('update karyawans set agama = ?, tempat_lahir = ?, tanggal_lahir = ?, no_telp = ?, alamat = ? where id = ?', [$agama, $tmpt_lahir, $tgl_lahir, $no_telp, $alamat, $user_id]);
        return back()->withStatus(__('Profile successfully updated.'));
    }
}
