<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan_Cuti;
use App\Models\SuratIzin;
use DB;
use App\Models\User;
use App\Models\Jenis_cuti;
use App\Models\status_cuti;
use DateTime;
use App\Models\Karyawan;
use App\Models\Pengajuan_Absen;

class HistoryController extends Controller
{
    public function index(){
        $pengajuanCutis = Pengajuan_Cuti::latest()->paginate(5);
        $data['pengajuanCutis'] = Pengajuan_Cuti::with('User', 'Karyawan', 'Jenis_cuti', 'status_cuti')->get();
        $Karyawan = Karyawan::with('User', 'Unit_Kerja')->where('user_id', auth()->user()->id)->get();
        $pengajuanSurat = SuratIzin::latest()->paginate(5);
        $data['pengajuanSurat'] = SuratIzin::with('User', 'Jenis_Izin', 'status_cuti')->get();
        $pengajuanAbsen = Pengajuan_Absen::latest()->paginate(5);
        $data['pengajuanAbsen'] = Pengajuan_Absen::with('User', 'Karyawan', 'status_cuti')->get();
        return view('pages.history', compact('pengajuanCutis', 'pengajuanSurat', 'pengajuanAbsen'), $data);
    }
}
