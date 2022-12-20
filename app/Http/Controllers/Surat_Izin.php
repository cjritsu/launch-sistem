<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratIzin;
use App\Models\User;
use App\Models\Karyawan;
use App\Models\Unit_Kerja;
use App\Models\Jenis_Izin;
use App\Models\status_cuti;
use DateTime;
use DB;
use Carbon\Carbon;
use Spatie\Activitylog\Models\Activity;
use App\Notifications\IncomingReport;
use Illuminate\Notifications\DatabaseNotification;
use Notification;


class Surat_Izin extends Controller
{
    public function index(){
        $pengajuanSurats = SuratIzin::latest()->paginate(10);
        $data['pengajuanSurats'] = SuratIzin::with('User', 'Karyawan', 'Unit_Kerja', 'Jenis_Izin', 'status_cuti')->get();
        $Izin = SuratIzin::first();
        $Karyawan = Karyawan::where('user_id', auth()->user()->id)->first();

        // Kelompok Kepala Unit
        if(auth()->user()->HasRole('Kepala Unit') && $Karyawan->unit_kerja_id == $Karyawan->unit_kerja_id ){
            $pengajuanSurats = SuratIzin::with('User', 'Karyawan', 'Jenis_Izin', 'status_cuti')->where('unit_kerja_id', $Karyawan->unit_kerja_id)->get();
        }

        // Send Kepala Unit -> HRD -> WaRek
        if (auth()->user()->HasRole('HRD')) {
            $pengajuanSurats = SuratIzin::with('User', 'Karyawan', 'Jenis_Izin', 'status_cuti')->where('status_kp', 2)->get();
        }
        if (auth()->user()->HasRole('Rektorat')) {
            $pengajuanSurats = SuratIzin::with('User', 'Karyawan', 'Jenis_Izin', 'status_cuti')->where('status_kp', 2)->where('status_hrd', 2)->get();
        }
        return view('surat_izin.index', compact('pengajuanSurats', 'Karyawan'), $data);
    }

    public function create(Request $request){
        $data['user'] = auth()->user()->id;
        $data['user_id'] = User::pluck('name', 'id')->prepend('Silakan Pilih Pegawai');
        $data['karyawan'] = Karyawan::with('User', 'Unit_Kerja')->where('user_id', auth()->user()->id)->get();
        $data['unit_kerja'] = Unit_Kerja::pluck('name', 'id');
        $data['jenis_izin_id'] = Jenis_Izin::pluck('name', 'id')->prepend('Silakan Pilih Jenis Izin');
        $data['status_id'] = status_cuti::pluck('name', 'id');
        return view('surat_izin.create', $data);
    }

    public function store(Request $request) {
        $TglMulai = $request->input('tanggal_izin_awal');
        $TglAkhir = $request->input('tanggal_izin_akhir');
        $limit = Carbon::parse($TglMulai)->addDays(3);
        $request->validate ([
            'jenis_izin_id' => 'required',
            'tanggal_izin_awal' => 'required | date ',
            'tanggal_izin_akhir' => 'required | date | after:tanggal_izin_awal | before:'.$limit->toDateString().'',
            'tanggal_masuk' => 'required | date | after:tanggal_izin_akhir',
            'keterangan' => 'required',
        ],
        [
            'jenis_izin_id.required' => 'Mohon untuk dipilih!',
            'tanggal_izin_akhir.after' => 'Tanggal Akhir harus sesudah Tanggal Awal',
            'tanggal_izin_akhir.before' => 'Maksimal izin hanya 3 hari',
            'tanggal_masuk.after' => 'Tanggal Masuk harus sesudah Tanggal Akhir',
        ]);
        $user = $request->input('user_id');
        $unit_kerja = $request->input('unit_kerja');
        $jenis_izin = $request->input('jenis_izin_id');
        $TglMasuk = $request->input('tanggal_masuk');
        $Ket = $request->input('keterangan');
        $StatusKP = $request->input('status_kp') ?: 1;
        $StatusHRD = $request->input('status_hrd') ?: 1;
        $StatusREK = $request->input('status_rek') ?: 1;
        $create = $request->input('created_at') ?: now();
        DB::insert('insert into pengajuan_izins (user_id, unit_kerja_id, jenis_izin_id, tanggal_izin_awal, tanggal_izin_akhir, tanggal_masuk, keterangan, status_kp, status_rek, status_hrd, created_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$user, $unit_kerja, $jenis_izin, $TglMulai, $TglAkhir, $TglMasuk, $Ket, $StatusKP, $StatusHRD, $StatusREK, $create]);

        if (auth()->user()->HasRole('Kepala Unit')){
            DB::update('update pengajuan_izins set status_kp = ? where user_id = ?', [2, $user]);
        }
        if (auth()->user()->HasRole('HRD')){

        }
        if (auth()->user()->HasRole('Rektorat')){

        }

        if(auth()->user()) {
            $notify_izin = SuratIzin::latest()->first();
            $karyawan = Karyawan::all()->where('unit_kerja_id', $notify_izin->unit_kerja_id)->pluck('user_id');
            $user = User::all()->where('roles_id', 3)->whereIn('id', $karyawan);
            Notification::send($user, new IncomingReport($notify_izin));
        }
        return redirect()->route('surat_izin.index')->with('success', 'Pengajuan Izin Berhasil');
    }

    public function show(SuratIzin $suratizin, $id) {
        $suratizin = SuratIzin::find($id);
        $user = User::where('id', $suratizin->user_id)->first();
        $data['karyawan'] = Karyawan::with('User', 'Unit_Kerja')->where('user_id', auth()->user()->id)->get();
        $data['pengajuanIzin'] = SuratIzin::with('User', 'Jenis_Izin')->where('id', $id)->get();

        $data['lastKP'] = Activity::all()->where('subject_type', 'App\Models\SuratIzin')->where('subject_id', $id)->where('description', 'Kepala Unit')->last();
        $data['lastHRD'] = Activity::all()->where('subject_type', 'App\Models\SuratIzin')->where('subject_id', $id)->where('description', 'HRD')->last();
        $data['lastRek'] = Activity::all()->where('subject_type', 'App\Models\SuratIzin')->where('subject_id', $id)->where('description', 'Wakil Rektorat')->last();

        if (auth()->user()->unreadNotifications == null) {
            $activity = auth()->user()->unreadNotifications->first();
            $unreadNotif = $activity->where('id', $activity->id)->first();
            $unreadNotif->markAsRead();
        }
        return view('surat_izin.show', compact('suratizin'), $data);
    }

    public function edit(SuratIzin $suratizin, $id) {
        $suratizin = DB::select('select * from pengajuan_izins where id = ?', [$id]);
        $user_name = SuratIzin::where('id', '=', $id)->first();
        $data['user'] = User::find($user_name->user_id);
        $data['user_id'] = User::pluck('name', 'id')->prepend('Silakan Pilih Pegawai');
        $data['jenis_izin_id'] = Jenis_Izin::pluck('name', 'id')->prepend('Silakan Pilih Jenis Izin');
        $data['status_id'] = status_cuti::pluck('name', 'id');
        return view('surat_izin.edit', compact('suratizin'), $data);
    }

    public function update(Request $request, SuratIzin $suratizin, $id) {
        $TglMulai = $request->input('tanggal_izin_awal');
        $TglAkhir = $request->input('tanggal_izin_akhir');
        $limit = Carbon::parse($TglMulai)->addDays(3);
        $request->validate ([
            'tanggal_izin_awal' => 'required | date ',
            'tanggal_izin_akhir' => 'required | date | after:tanggal_izin_awal | before:'.$limit->toDateString().'',
            'tanggal_masuk' => 'required | date | after:tanggal_izin_akhir',
        ],
        [
            'tanggal_izin_akhir.after' => 'Tanggal Akhir harus sesudah Tanggal Awal',
            'tanggal_izin_akhir.before' => 'Maksimal izin hanya 3 hari',
            'tanggal_masuk.after' => 'Tanggal Masuk harus sesudah Tanggal Akhir',
        ]);
        $suratizin = SuratIzin::find($id);
        $user_id = SuratIzin::where('id', $id)->first();
        $userID = $request->input('user_id');
        $user = User::where('id', $user_id->user_id)->first();
        $jenis_izin = $request->input('jenis_izin_id');
        $TglMasuk = $request->input('tanggal_masuk');
        $Ket = $request->input('keterangan');
        $StatusKP = $request->input('status_kp') ?: old('status_kp');
        $StatusHRD = $request->input('status_hrd') ?: old('status_hrd');
        $StatusREK = $request->input('status_rek') ?: old('status_rek');
        $update = $request->input('updated_at') ?: now();
        DB::update('update pengajuan_izins set user_id = ?, jenis_izin_id = ?, tanggal_izin_awal = ?, tanggal_izin_akhir = ?, tanggal_masuk = ?, keterangan = ?, updated_at = ? where id = ?', [$user->id, $jenis_izin, $TglMulai, $TglAkhir, $TglMasuk, $Ket, $update, $id]);

        if (auth()->user()->HasRole('Kepala Unit')){
            DB::update('update pengajuan_izins set status_kp = ? where id = ?', [$StatusKP, $id]);
            activity()->performedOn($suratizin)->causedBy(auth()->user()->id)->withProperties(['customProperty' => 'customValue'])->log('Kepala Unit');

            if($StatusKP == 3) {
                $notify_izin = SuratIzin::find($id);
                $user = User::all()->where('id', $notify_izin->user_id);
                Notification::send($user, new IncomingReport($notify_izin));
            }
        }
        if (auth()->user()->HasRole('HRD')){
            DB::update('update pengajuan_izins set status_hrd = ? where id = ?', [$StatusHRD, $id]);
            activity()->performedOn($suratizin)->causedBy(auth()->user()->id)->withProperties(['customProperty' => 'customValue'])->log('HRD');

            if($StatusHRD == 3) {
                $notify_izin = SuratIzin::with('User', 'Jenis_Izin')->first();
                $user = User::where('id', $notify_izin->user_id)->first();
                $user->notify(new IncomingReport($notify_izin));
            }
        }
        if (auth()->user()->HasRole('Rektorat')){
            DB::update('update pengajuan_izins set status_rek = ? where id = ?', [$StatusREK, $id]);
            activity()->performedOn($suratizin)->causedBy(auth()->user()->id)->withProperties(['customProperty' => 'customValue'])->log('Wakil Rektorat');

            if(auth()->user()) {
                $notify_izin = SuratIzin::with('User', 'Jenis_Izin')->first();
                $user = User::where('id', $notify_izin->user_id)->first();
                $user->notify(new IncomingReport($notify_izin));
            }
        }
        if (auth()->user()->HasRole('Admin')){
            DB::update('update pengajuan_izins set status_kp = ?, status_hrd = ?, status_rek = ? where id = ?', [$StatusKP, $StatusHRD, $StatusREK, $id]);
            activity()->performedOn($suratizin)->causedBy(auth()->user()->id)->withProperties(['customProperty' => 'customValue'])->log('Admin');
        }
        return redirect()->route('surat_izin.index')->with('success', 'Telah Berhasil Diupdate');
    }

    public function destroy(SuratIzin $suratizin, $id) {
        DB::delete('delete from pengajuan_izins where id = ?', [$id]);
        return redirect()->route('surat_izin.index')->with('success', 'Telah Berhasil Dihapus');
    }

    public function notify()
    {
        // if(auth()->user()) {
            $notify_izin = SuratIzin::first();
            $karyawan = Karyawan::all()->where('unit_kerja_id', $notify_izin->unit_kerja_id)->pluck('user_id');
            $users = User::all()->where('roles_id', 3)->whereIn('id', $karyawan);
            // Notification::send($user, new IncomingReport($notify_izin));
            // auth()->user()->notify(new IncomingReport($notify_izin));
        // }
        return $users;
    }
}
