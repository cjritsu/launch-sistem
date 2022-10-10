<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Models\Pengajuan_Cuti;
use App\Models\Jenis_Cuti;
use App\Models\User;
use App\Models\Karyawan;
use App\Models\status_cuti;
use lluminate\Auth\SessionGuard;
use Carbon\Carbon;
use DB;

class Surat_Cuti extends Controller
{
    public function index(){
        $pengajuanCutis = Pengajuan_Cuti::latest()->paginate(5);
        $data['pengajuanCutis'] = Pengajuan_Cuti::with('User', 'Karyawan', 'Jenis_cuti', 'status_cuti')->get();
        return view('surat_cuti.index', compact('pengajuanCutis'), $data);
    }

    public function create() {
        $data['user'] = auth()->user()->id;
        $data['user_id'] = User::pluck('name', 'id')->prepend('Silakan Pilih Pegawai');
        $data['jenis_cuti_id'] = Jenis_cuti::pluck('name', 'id')->prepend('Silakan Pilih Jenis Cuti');
        $data['status_id'] = status_cuti::pluck('name', 'id');
        return view('surat_cuti.create', $data);
    }

    public function store(Request $request) {
        $request->validate ([
            'user_id' => 'required',
            'jenis_cuti_id' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
            'keterangan' => 'required',
        ]);
        Pengajuan_Cuti::create($request->all());
        return redirect()->route('surat_cuti.index')->with('success', 'Pengajuan Cuti Berhasil');
    }

    public function show(Pengajuan_Cuti $pengajuan_cuti) {
        return view('surat_cuti.show', compact('pengajuan_cuti'));
    }

    public function edit(Pengajuan_Cuti $pengajuan_cuti, $id) {
        $pengajuan_cuti = DB::select('select * from pengajuan__cutis where id = ?', [$id]);
        $data['user_name'] = User::find(auth()->user()->id);
        $data['user_id'] = User::pluck('name', 'id')->prepend('Silakan Pilih Pegawai');
        $data['jenis_cuti_id'] = Jenis_cuti::pluck('name', 'id')->prepend('Silakan Pilih Jenis Cuti');
        $data['status_id'] = status_cuti::pluck('name', 'id');
        return view('surat_cuti.edit', compact('pengajuan_cuti'), $data);
    }

    public function update(Request $request, Pengajuan_Cuti $pengajuan_cuti, $id) {
        $userID = $request->input('user_id');
        $JenisCutiID = $request->input('jenis_cuti_id');
        $TglMulai = $request->input('tanggal_mulai');
        $TglAkhir = $request->input('tanggal_akhir');
        $Ket = $request->input('keterangan');
        $Status = $request->input('status_id') ?: 1;

        DB::update('update pengajuan__cutis  set user_id = ?, jenis_cuti_id = ?, tanggal_mulai = ?, tanggal_akhir = ?, keterangan = ?, status_id = ? where id = ?', [$userID, $JenisCutiID, $TglMulai, $TglAkhir, $Ket, $Status, $id]);
        return redirect()->route('surat_cuti.index')->with('success', 'Telah Berhasil Diupdate');
    }

    public function destroy(Pengajuan_Cuti $pengajuan_cuti, $id) {
        DB::delete('delete from pengajuan__cutis where id = ?', [$id]);
        return redirect()->route('surat_cuti.index')->with('success', 'Telah Berhasil Dihapus');
    }
}
