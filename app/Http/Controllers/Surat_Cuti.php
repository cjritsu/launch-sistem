<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Models\Pengajuan_Cuti;
use App\Models\Jenis_Cuti;
use App\Models\User;
use App\Models\Karyawan;
use App\Models\Unit_Kerja;
use App\Models\status_cuti;
use lluminate\Auth\SessionGuard;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;
use Spatie\Activitylog\Models\Activity;
use App\Notifications\IncomingCuti;
use Illuminate\Notifications\DatabaseNotification;
use Notification;

class Surat_Cuti extends Controller
{
    public function index(){
        $pengajuanCuti = Pengajuan_Cuti::orderBy('created_at', 'DESC')->paginate(10);
        $data['pengajuanCuti'] = Pengajuan_Cuti::with('User', 'Karyawan', 'Unit_Kerja', 'Jenis_cuti', 'status_cuti')->get();
        $Cuti = Pengajuan_Cuti::first();
        $Karyawan = Karyawan::where('user_id', auth()->user()->id)->first();

        // Kelompok Kepala Unit
        if(auth()->user()->HasRole('Kepala Unit') && $Karyawan->unit_kerja_id == $Karyawan->unit_kerja_id ){
            $data['pengajuanCuti'] = Pengajuan_Cuti::with('User', 'Karyawan', 'Unit_Kerja', 'Jenis_cuti', 'status_cuti')->where('unit_kerja_id', $Karyawan->unit_kerja_id)->get();
        }

        // Send Kepala Unit -> HRD -> WaRek
        if (auth()->user()->HasRole('HRD')) {
            $data['pengajuanCuti'] = Pengajuan_Cuti::with('User', 'Karyawan', 'Unit_Kerja', 'Jenis_cuti', 'status_cuti')->where('status_kp', 2)->get();
        }
        if (auth()->user()->HasRole('Rektorat')) {
            $data['pengajuanCuti'] = Pengajuan_Cuti::with('User', 'Karyawan', 'Unit_Kerja', 'Jenis_cuti', 'status_cuti')->where('status_kp', 2)->where('status_hrd', 2)->get();
        }
        return view('surat_cuti.index', compact('pengajuanCuti'), $data);
    }

    public function create() {
        $data['user'] = auth()->user()->id;
        $data['user_id'] = User::pluck('name', 'id')->prepend('Silakan Pilih Pegawai');
        $data['karyawan'] = Karyawan::with('User', 'Unit_Kerja')->where('user_id', auth()->user()->id)->get();
        $data['unit_kerja'] = Unit_Kerja::pluck('name', 'id');
        $data['jenis_cuti_id'] = Jenis_cuti::pluck('name', 'id')->prepend('Silakan Pilih Jenis Cuti');
        $data['status_id'] = status_cuti::pluck('name', 'id');
        return view('surat_cuti.create', $data);
    }

    public function store(Request $request) {
        $TglMulai = $request->input('tanggal_mulai');
        $TglAkhir = $request->input('tanggal_akhir');
        $limit = Carbon::parse($TglMulai)->addDays(auth()->user()->jatah_cuti);
        $request->validate ([
            'jenis_cuti_id' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date|after:tanggal_izin_awal',
            'tanggal_masuk' => 'required|date|after:tanggal_akhir',
            'keterangan' => 'required',
        ],
        [
            'jenis_cuti_id.required' => 'Mohon untuk dipilih!',
            'tanggal_akhir.after' => 'Tanggal Akhir harus sesudah Tanggal Awal',
            'tanggal_masuk.after' => 'Pilih tanggal setelah tanggal akhir cuti!',
        ]);
        $user = $request->input('user_id');
        $unit_kerja =  $request->input('unit_kerja');
        $TglMasuk = $request->input('tanggal_masuk');
        $StatusKP = $request->input('status_kp') ?: 1;
        $StatusREK = $request->input('status_rek') ?: 1;
        $StatusHRD = $request->input('status_hrd') ?: 1;
        $create = $request->input('created_at') ?: now();
        $DF = new DateTime($TglMulai);
        $DT = new DateTime($TglAkhir);
        $diff = date_diff($DF, $DT);
        $num_days = (1 + $diff->format("%a"));
        if ($request->input('jenis_cuti_id') == 2) {

        }
        else {
            // $request->validate([
            //     'tanggal_akhir' => 'required|date|after:tanggal_izin_awal|before:'.$limit->toDateString().'',
            // ],
            // [
            //     'tanggal_akhir.before' => 'Melebihi Jatah Cuti',
            // ]);
        }
        DB::insert('insert into pengajuan__cutis (user_id, unit_kerja_id, jenis_cuti_id, tanggal_mulai, tanggal_akhir, tanggal_masuk, keterangan, num_days, status_kp, status_rek, status_hrd, created_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$user, $unit_kerja, $request->input('jenis_cuti_id'), $TglMulai, $TglAkhir, $TglMasuk, $request->input('keterangan'), $num_days, $StatusKP, $StatusREK, $StatusHRD, $create]);

        if(auth()->user()->HasRole('Staff')){
            $notify_cuti = Pengajuan_Cuti::latest()->first();
            $karyawan = Karyawan::all()->where('unit_kerja_id', $notify_cuti->unit_kerja_id)->pluck('user_id');
            $user = User::all()->where('roles_id', 3)->whereIn('id', $karyawan);
            Notification::send($user, new IncomingCuti($notify_cuti));
        }
        return redirect()->route('surat_cuti.index')->with('success', 'Pengajuan Cuti Berhasil');
    }

    public function show(Pengajuan_Cuti $pengajuan_cuti, $id) {
        $pengajuan_cuti = Pengajuan_Cuti::find($id);
        $data['karyawan'] = Karyawan::with('User', 'Unit_Kerja')->where('user_id', auth()->user()->id)->get();
        $data['pengajuanCuti'] = Pengajuan_Cuti::with('User', 'Jenis_cuti', 'Unit_Kerja')->where('id', $id)->get();

        $data['lastKP'] = Activity::all()->where('subject_type', 'App\Models\Pengajuan_Cuti')->where('subject_id', $id)->where('description', 'Kepala Unit')->last();
        $data['lastHRD'] = Activity::all()->where('subject_type', 'App\Models\Pengajuan_Cuti')->where('subject_id', $id)->where('description', 'HRD')->last();
        $data['lastRek'] = Activity::all()->where('subject_type', 'App\Models\Pengajuan_Cuti')->where('subject_id', $id)->where('description', 'Wakil Rektorat')->last();

        $notification = auth()->user()->notifications()->where('data->id', $id)->where('type', 'App\Notifications\IncomingCuti')->first();

        if($notification){
            $notification->markAsRead();
        }

        return view('surat_cuti.show', compact('pengajuan_cuti'), $data);
    }

    public function edit(Pengajuan_Cuti $pengajuan_cuti, $id) {
        $pengajuan_cuti = Pengajuan_Cuti::find($id);
        $user = Pengajuan_Cuti::where('id', '=', $id)->first();
        $data['user_name'] = User::find($user->user_id);
        $data['user_id'] = User::pluck('name', 'id')->prepend('Silakan Pilih Pegawai');
        $data['jenis_cuti_id'] = Jenis_cuti::pluck('name', 'id')->prepend('Silakan Pilih Jenis Cuti');
        $data['status_id'] = status_cuti::pluck('name', 'id');
        return view('surat_cuti.edit', compact('pengajuan_cuti'), $data);
    }

    public function update(Request $request, Pengajuan_Cuti $pengajuan_cuti, $id) {
        $pengajuan_cuti = Pengajuan_Cuti::find($id);
        $user_id = Pengajuan_Cuti::where('id', $id)->first();
        $userID = $request->input('user_id');
        $JenisCutiID = $request->input('jenis_cuti_id');
        $TglMulai = $request->input('tanggal_mulai');
        $TglAkhir = $request->input('tanggal_akhir');
        $TglMasuk = $request->input('tanggal_masuk');
        $Ket = $request->input('keterangan');
        $StatusKP = $request->input('status_kp') ?: old('status_kp');
        $StatusREK = $request->input('status_rek') ?: old('status_rek');
        $StatusHRD = $request->input('status_hrd') ?: old('status_hrd');
        $update = $request->input('updated_at') ?: now();
        $DF = new DateTime($TglMulai);
        $DT = new DateTime($TglAkhir);
        $diff = date_diff($DF, $DT);
        $num_days = (1 + $diff->format("%a"));
        $user = User::where('id', $user_id->user_id)->first();
        $jatah_cuti = $user->jatah_cuti - $num_days;
        $batal_cuti = $user->jatah_cuti + $num_days;

        DB::update('update pengajuan__cutis  set user_id = ?, jenis_cuti_id = ?, tanggal_mulai = ?, tanggal_akhir = ?, tanggal_masuk = ?, keterangan = ?, num_days = ?, updated_at = ? where id = ?', [$userID, $JenisCutiID, $TglMulai, $TglAkhir, $TglMasuk, $Ket, $num_days, $update, $id]);

        if (auth()->user()->HasRole('Kepala Unit')){
            DB::update('update pengajuan__cutis set status_kp = ? where id = ?', [$StatusKP, $id]);
            activity()->performedOn($pengajuan_cuti)->causedBy(auth()->user()->id)->withProperties(['customProperty' => 'customValue'])->log('Kepala Unit');

            if($StatusKP == 3) {
                $notify_cuti = Pengajuan_Cuti::find($id);
                $user = User::all()->where('id', $notify_cuti->user_id);
                Notification::send($user, new IncomingCuti($notify_cuti));
            }
            elseif ($StatusKP == 2) {
                $notify_cuti = Pengajuan_Cuti::find($id);
                $user = User::all()->where('roles_id', 5);
                Notification::send($user, new IncomingCuti($notify_cuti));
            }
        }
        if (auth()->user()->HasRole('HRD')){
            DB::update('update pengajuan__cutis set status_hrd = ? where id = ?', [$StatusHRD, $id]);
            activity()->performedOn($pengajuan_cuti)->causedBy(auth()->user()->id)->withProperties(['customProperty' => 'customValue'])->log('HRD');

            if($StatusHRD == 3) {
                $notify_cuti = Pengajuan_Cuti::find($id);
                $user = User::all()->where('id', $notify_cuti->user_id);
                Notification::send($user, new IncomingCuti($notify_cuti));
            }
            elseif ($StatusHRD == 2) {
                $notify_cuti = Pengajuan_Cuti::find($id);
                $user = User::all()->where('roles_id', 4);
                Notification::send($user, new IncomingCuti($notify_cuti));
            }
        }
        if (auth()->user()->HasRole('Rektorat')){
            DB::update('update pengajuan__cutis set status_rek = ? where id = ?', [$StatusREK, $id]);
            activity()->performedOn($pengajuan_cuti)->causedBy(auth()->user()->id)->withProperties(['customProperty' => 'customValue'])->log('Wakil Rektorat');
            if ($JenisCutiID == 1 && $StatusREK == 2) {
                DB::update('update users set jatah_cuti = ? where id = ?', [$jatah_cuti, $userID]);
            }

            if(auth()->user()) {
                $notify_cuti = Pengajuan_Cuti::find($id);
                $user = User::all()->where('id', $notify_cuti->user_id);
                Notification::send($user, new IncomingCuti($notify_cuti));
            }
        }
        if (auth()->user()->HasRole('Admin')){
            DB::update('update pengajuan__cutis set status_kp = ?, status_hrd = ?, status_rek = ? where id = ?', [$StatusKP, $StatusHRD, $StatusREK, $id]);
            activity()->performedOn($pengajuan_cuti)->causedBy(auth()->user()->id)->withProperties(['customProperty' => 'customValue'])->log('Admin');
            if ($JenisCutiID == 1 && $StatusKP == 2 && $StatusHRD == 2 && $StatusREK == 2) {
                DB::update('update users set jatah_cuti = ? where id = ?', [$jatah_cuti, $userID]);
            }
        }
        return redirect()->route('surat_cuti.index')->with('success', 'Telah Berhasil Diupdate');
    }

    public function destroy(Pengajuan_Cuti $pengajuan_cuti, $id) {
        $cuti = Pengajuan_Cuti::where('id', $id)->first();
        $num_days = Pengajuan_Cuti::select('num_days')->where('id', $id)->sum('num_days');
        $user = User::where('id', $cuti->user_id)->first();
        $jatah_cuti = User::select('jatah_cuti')->where('id', $user->id)->sum('jatah_cuti');
        if ($cuti->jenis_cuti_id == 1 && $user->jatah_cuti >= 12) {
            DB::update('update users set jatah_cuti = ? where id = ?', ['12', $user->id]);
        }
        elseif ($cuti->jenis_cuti_id == 1) {
            $total = $jatah_cuti + $num_days;
            DB::update('update users set jatah_cuti = ? where id = ?', [$total, $user->id]);
        }
        else {
            $total = $jatah_cuti + $num_days;
            DB::update('update users set jatah_cuti = ? where id = ?', [$total, $user->id]);
        }
        DB::delete('delete from pengajuan__cutis where id = ?', [$id]);
        return redirect()->route('surat_cuti.index')->with('success', 'Telah Berhasil Dihapus');
    }

    public function search(Request $request) {
        $search = $request->search;
        $pengajuanCuti = Pengajuan_Cuti::whereHas('User', function($q) use($search) {
            $q->where('name', 'like', "%".$search."%")->orWhere('nip', 'like', "%".$search."%");
        })->orwhereHas('Unit_Kerja', function($u) use($search) {
            $u->where('name', 'like', "%".$search."%");
        })->orwhereHas('Jenis_cuti', function($t) use($search) {
            $t->where('name', 'like', "%".$search."%");
        })->paginate();
        return view('surat_cuti.index', compact('pengajuanCuti'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
