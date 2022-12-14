<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengajuan_Cuti;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Jenis_cuti;
use App\Models\SuratIzin;
use App\Models\Pengajuan_Absen;
use App\Notifications\IncomingReport;
use DateTime;
use App\Models\Karyawan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['karyawans'] = Karyawan::where('user_id', auth()->user()->id)->first();
        $pengajuan_cuti = Pengajuan_Cuti::with('User', 'Karyawan','Jenis_cuti', 'status_cuti')->get();
        $data['User_Count'] = User::select('id')->count();
        $surat_cuti = Pengajuan_Cuti::select('id')->count();
        $surat_izin = SuratIzin::select('id')->count();
        $surat_absen = Pengajuan_Absen::select('id')->count();
        $data['Surat_Count'] = $surat_cuti + $surat_izin + $surat_absen;

        $cuti = Pengajuan_Cuti::select('id')->where('status_rek', '=', '2')->count();
        $izin = SuratIzin::select('id')->where('status_rek', '=', '2')->count();
        $absen = Pengajuan_Absen::select('id')->where('status_rek', '=', '2')->count();
        $data['Terima_Count'] = $cuti + $izin + $absen;

        $kar_cuti = Pengajuan_Cuti::select('id')->where('status_rek', '=', '2')->where('user_id', auth()->user()->id)->count();
        $kar_izin = SuratIzin::select('id')->where('status_rek', '=', '2')->where('user_id', auth()->user()->id)->count();
        $kar_absen = Pengajuan_Absen::select('id')->where('status_rek', '=', '2')->where('user_id', auth()->user()->id)->count();
        $data['self_terima'] = $kar_cuti + $kar_izin + $kar_absen;

        $cutis = Pengajuan_Cuti::select('id')->where('status_kp', '=', '3')->orWhere('status_hrd', '=', '3')->orWhere('status_rek', '=', '3')->count();
        $izins = SuratIzin::select('id')->where('status_kp', '=', '3')->orWhere('status_hrd', '=', '3')->orWhere('status_rek', '=', '3')->count();
        $absens = Pengajuan_Absen::select('id')->where('status_kp', '=', '3')->orWhere('status_hrd', '=', '3')->orWhere('status_rek', '=', '3')->count();
        $data['Tolak_Count'] = $cutis + $izins + $absens;

        $kar_cutis = Pengajuan_Cuti::select('id')->where('user_id', auth()->user()->id)->where('status_kp', '=', '3')->orWhere('status_hrd', '=', '3')->orWhere('status_rek', '=', '3')->count();
        $kar_izins = SuratIzin::select('id')->where('user_id', auth()->user()->id)->where('status_kp', '=', '3')->orWhere('status_hrd', '=', '3')->orWhere('status_rek', '=', '3')->count();
        $kar_absens = Pengajuan_Absen::select('id')->where('user_id', auth()->user()->id)->where('status_kp', '=', '3')->orWhere('status_hrd', '=', '3')->orWhere('status_rek', '=', '3')->count();
        $data['self_tolak'] = $kar_cutis + $kar_izins + $kar_absens;


        $report = [];
        $cuti_bulanan = Pengajuan_Cuti::select('jenis_cuti_id', \DB::raw('DATE_FORMAT(tanggal_mulai, "%Y-%m") as month'), \DB::raw('DATE_FORMAT(tanggal_mulai, "%Y") as year'), \DB::raw('count(id) as count'))->groupBy('jenis_cuti_id')->groupBy('month')->groupBy('year')->get();
        $cuti_bulanan->each(function($item) use (&$report) {
            $report[$item->month][$item->jenis_cuti_id] = [
                'count' => $item->count
            ];
        });
        $jenis_cuti_id = $cuti_bulanan->pluck('jenis_cuti_id', 'jenis_cuti_id')->sortBy('jenis_cuti_id')->unique();
        $data['bulan'] = $cuti_bulanan->pluck('year', 'year');

        $data['updated_user'] = User::first();

        $data['updated_cuti'] = Pengajuan_Cuti::with('Jenis_cuti')->first();
        $data['jumlah_hari'] = Pengajuan_Cuti::select('id')->where('user_id', auth()->user()->id)->where('status_rek', '=', '2')->sum('num_days');

        $data['rekap_cuti'] = Pengajuan_Cuti::with('Jenis_cuti')->get();
        $data['rekap_absen'] = Pengajuan_Absen::get();
        $data['rekap_izin'] = SuratIzin::with('Jenis_Izin')->get();
        return view('pages.dashboard', compact('pengajuan_cuti', 'report', 'jenis_cuti_id'), $data);
    }
}
