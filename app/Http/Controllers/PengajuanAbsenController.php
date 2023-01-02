<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan_Absen;
use App\Models\Karyawan;
use App\Models\User;
use App\Models\Unit_Kerja;
use App\Models\status_cuti;
use DB;
use Image;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Models\Activity;
use App\Notifications\IncomingAbsen;
use Illuminate\Notifications\DatabaseNotification;
use Notification;

class PengajuanAbsenController extends Controller
{
    public function index() {
        $pengajuanAbsen = Pengajuan_Absen::orderBy('created_at', 'DESC')->paginate(10);
        $data['pengajuanAbsen'] = Pengajuan_Absen::with('User', 'Karyawan', 'Unit_Kerja', 'status_cuti')->get();
        $Absen = Pengajuan_Absen::first();
        $Karyawan = Karyawan::where('user_id', auth()->user()->id)->first();

        // Kelompok Kepala Unit
        if(auth()->user()->HasRole('Kepala Unit') && $Karyawan->unit_kerja_id == $Karyawan->unit_kerja_id ){
            $data['pengajuanAbsen'] = Pengajuan_Absen::with('User', 'Karyawan', 'Unit_Kerja', 'status_cuti')->where('unit_kerja_id', $Karyawan->unit_kerja_id)->get();
        }

        // Send Kepala Unit -> HRD -> WaRek
        if (auth()->user()->HasRole('HRD')) {
            $data['pengajuanAbsen'] = Pengajuan_Absen::with('User', 'Karyawan', 'Unit_Kerja', 'status_cuti')->where('status_kp', 2)->get();
        }
        if (auth()->user()->HasRole('Rektorat')) {
            $data['pengajuanAbsen'] = Pengajuan_Absen::with('User', 'Karyawan', 'Unit_Kerja', 'status_cuti')->where('status_kp', 2)->where('status_hrd', 2)->get();
        }
        return view('surat_absen.index', compact('pengajuanAbsen', 'Karyawan'), $data);
    }

    public function create() {
        $data['user'] = auth()->user()->id;
        $data['user_id'] = User::pluck('name', 'id')->prepend('Silakan Pilih Pegawai');
        $data['karyawan'] = Karyawan::with('User', 'Unit_Kerja')->where('user_id', auth()->user()->id)->get();
        $data['unit_kerja'] = Unit_Kerja::pluck('name', 'id');
        $data['status_id'] = status_cuti::pluck('name', 'id');
        return view('surat_absen.create', $data);
    }

    public function store(Request $request) {
        $request->validate([
            'tanggal_absen_awal' => 'required|date',
            'tanggal_absen_akhir' => 'required|date',
            'tanggal_berita' => 'required|date',
            'tanggal_masuk' => 'required|date',
            'keterangan' => 'required',
            'surat_bukti' => 'image|mimes:jpeg, PNG, jpg, svg, webp, png|max:2048',
        ]);
        $name = User::where('id', $request->input('user_id'))->first();
        $image = $request->file('surat_bukti');
        $Pengajuan_Absen = new Pengajuan_Absen;
        if($request->has('surat_bukti')) {
            $imageName = str_replace($image->getClientOriginalName(), date('d_m_Y_H_i_'). $image->getClientOriginalName(), $image->getClientOriginalName());
            $image->storeAs('public/surat_bukti', $imageName);
            $image_path = public_path(). '/surat_bukti/'. $name->name;
            $request->file('surat_bukti')->move($image_path, $imageName);
            $Pengajuan_Absen->create([
                'user_id' => $request->input('user_id'),
                'unit_kerja_id' => $request->input('unit_kerja'),
                'tanggal_absen_awal' => $request->input('tanggal_absen_awal'),
                'tanggal_absen_akhir' => $request->input('tanggal_absen_akhir'),
                'tanggal_berita' => $request->input('tanggal_berita'),
                'tinggalin_absen' => $request->input('kepada_id'),
                'tanggal_masuk' => $request->input('tanggal_masuk'),
                'keterangan' => $request->input('keterangan'),
                'image' => $imageName,
                'surat_dokter' => $request->input('surat_dokter')
            ]);
        } else {
            $Pengajuan_Absen->create([
                'user_id' => $request->input('user_id'),
                'unit_kerja_id' => $request->input('unit_kerja'),
                'tanggal_absen_awal' => $request->input('tanggal_absen_awal'),
                'tanggal_absen_akhir' => $request->input('tanggal_absen_akhir'),
                'tanggal_berita' => $request->input('tanggal_berita'),
                'tinggalin_absen' => $request->input('kepada_id'),
                'tanggal_masuk' => $request->input('tanggal_masuk'),
                'keterangan' => $request->input('keterangan'),
                'surat_dokter' => $request->input('surat_dokter')
            ]);
        }

        if(auth()->user()->HasRole('Staff')){
            $notify_absen = Pengajuan_Absen::latest()->first();
            $karyawan = Karyawan::all()->where('unit_kerja_id', $notify_absen->unit_kerja_id)->pluck('user_id');
            $user = User::all()->where('roles_id', 3)->whereIn('id', $karyawan);
            Notification::send($user, new IncomingAbsen($notify_absen));
        }
        return redirect()->route('surat_absen.index')->with('success', 'Pengajuan Absen Berhasil');
    }

    public function show(Pengajuan_Absen $Pengajuan_Absen, $id) {
        $Pengajuan_Absen = Pengajuan_Absen::with('User')->find($id);
        $user = User::where('id', $Pengajuan_Absen->user_id)->first();
        $data['karyawan'] = Karyawan::with('User', 'Unit_Kerja', 'Departemen')->where('user_id', $user->id)->get();
        $data['pengajuanAbsen'] = Pengajuan_Absen::with('User', 'Karyawan', 'status_cuti')->where('id', $id)->get();

        $data['lastKP'] = Activity::all()->where('subject_type', 'App\Models\Pengajuan_Absen')->where('subject_id', $id)->where('description', 'Kepala Unit')->last();
        $data['lastHRD'] = Activity::all()->where('subject_type', 'App\Models\Pengajuan_Absen')->where('subject_id', $id)->where('description', 'HRD')->last();
        $data['lastRek'] = Activity::all()->where('subject_type', 'App\Models\Pengajuan_Absen')->where('subject_id', $id)->where('description', 'Wakil Rektorat')->last();

        $notification = auth()->user()->notifications()->where('data->id', $id)->where('type', 'App\Notifications\IncomingAbsen')->first();

        if($notification){
            $notification->markAsRead();
        }
        return view('surat_absen.show', compact('Pengajuan_Absen'), $data);
    }

    public function edit(Pengajuan_Absen $Pengajuan_Absen, $id) {
        $Pengajuan_Absen = Pengajuan_Absen::find($id);
        $user_name = Pengajuan_Absen::where('id', '=', $id)->first();
        $data['user'] = User::find($user_name->user_id);
        $data['user_id'] = User::pluck('name', 'id')->prepend('Silakan Pilih Pegawai');
        $data['status_id'] = status_cuti::pluck('name', 'id');
        return view('surat_absen.edit', compact('Pengajuan_Absen'), $data);
    }

    public function update(Request $request, Pengajuan_Absen $Pengajuan_Absen, $id) {
        $Pengajuan_Absen = Pengajuan_Absen::with('User')->find($id);
        $user_id = Pengajuan_Absen::where('id', $id)->first();
        $UserID = $request->input('user_id');
        $user = User::where('id', $user_id->user_id)->first();
        $TglAwal = $request->input('tanggal_absen_awal');
        $TglAk = $request->input('tanggal_absen_akhir');
        $TglBerita = $request->input('tanggal_berita');
        $tinggalin_absen = $request->input('kepada_id');
        $tanggal_masuk = $request->input('tanggal_masuk');
        $keterangan = $request->input('keterangan');
        $surat_dokter = $request->input('surat_dokter');
        $StatusKP = $request->input('status_kp') ?: old('status_kp');
        $StatusREK = $request->input('status_rek') ?: old('status_rek');
        $StatusHRD = $request->input('status_hrd') ?: old('status_hrd');
        $image = $request->file('surat_bukti') ?: $Pengajuan_Absen->image;
        $update = $request->input('updated_at') ?: now();
        if($request->has('surat_bukti')) {
            $imageName = str_replace($image->getClientOriginalName(), date('d_m_Y_H_i_'). $image->getClientOriginalName(), $image->getClientOriginalName());
            $image_path = storage_path(). '/app/public/surat_bukti/'.$Pengajuan_Absen->image;

            $name = $Pengajuan_Absen->User->name;
            $second_image = public_path(). '/surat_bukti/'. $name . '/' . $Pengajuan_Absen->image;

            $image->storeAs('public/surat_bukti', $imageName);

            $image_move = public_path(). '/surat_bukti/'. $name;
            $request->file('surat_bukti')->move($image_move, $imageName);

            DB::update('update pengajuan__absens set user_id = ?, tanggal_absen_awal = ?, tanggal_absen_akhir = ?, tanggal_berita = ?, tinggalin_absen = ?, tanggal_masuk = ?, keterangan = ?, image = ?, surat_dokter = ?, updated_at = ? where id = ?', [$UserID, $TglAwal, $TglAk, $TglBerita, $tinggalin_absen, $tanggal_masuk, $keterangan, $request->has('surat_bukti')? $imageName : $Pengajuan_Absen->image, $surat_dokter, $update, $id]);
        } else {
            if ($surat_dokter == 'Tidak Ada Surat Dokter' && $Pengajuan_Absen->image !== null) {
                $image_path = storage_path(). '/app/public/surat_bukti/'. $Pengajuan_Absen->image;
                unlink($image_path);
                Storage::delete($image_path);

                $name = $Pengajuan_Absen->User->name;
                $image_move = public_path(). '/surat_bukti/'. $name . '/' . $Pengajuan_Absen->image;
                unlink($image_move);
                Storage::delete($image_move);
            }
            DB::update('update pengajuan__absens set user_id = ?, tanggal_absen_awal = ?, tanggal_absen_akhir = ?, tanggal_berita = ?, tinggalin_absen = ?, tanggal_masuk = ?, keterangan = ?, image = ?, surat_dokter = ?, updated_at = ? where id = ?', [$UserID, $TglAwal, $TglAk, $TglBerita, $tinggalin_absen, $tanggal_masuk, $keterangan, null, $surat_dokter, $update, $id]);
        }

        if (auth()->user()->HasRole('Kepala Unit')){
            DB::update('update pengajuan__absens set status_kp = ? where id = ?', [$StatusKP, $id]);
            activity()->performedOn($Pengajuan_Absen)->causedBy(auth()->user()->id)->withProperties(['customProperty' => 'customValue'])->log('Kepala Unit');

            if($StatusKP == 3) {
                $notify_absen = Pengajuan_Absen::find($id);
                $user = User::all()->where('id', $notify_absen->user_id);
                Notification::send($user, new IncomingAbsen($notify_absen));
            }
            elseif ($StatusKP == 2) {
                $notify_absen = Pengajuan_Absen::find($id);
                $user = User::all()->where('roles_id', 5);
                Notification::send($user, new IncomingAbsen($notify_absen));
            }
        }
        if (auth()->user()->HasRole('HRD')){
            DB::update('update pengajuan__absens set status_hrd = ? where id = ?', [$StatusHRD, $id]);
            activity()->performedOn($Pengajuan_Absen)->causedBy(auth()->user()->id)->withProperties(['customProperty' => 'customValue'])->log('HRD');

            if($StatusHRD == 3) {
                $notify_absen = Pengajuan_Absen::find($id);
                $user = User::all()->where('id', $notify_absen->user_id);
                Notification::send($user, new IncomingAbsen($notify_absen));
            }
            elseif ($StatusHRD == 2) {
                $notify_absen = Pengajuan_Absen::find($id);
                $user = User::all()->where('roles_id', 4);
                Notification::send($user, new IncomingAbsen($notify_absen));
            }
        }
        if (auth()->user()->HasRole('Rektorat')){
            DB::update('update pengajuan__absens set status_rek = ? where id = ?', [$StatusREK, $id]);
            activity()->performedOn($Pengajuan_Absen)->causedBy(auth()->user()->id)->withProperties(['customProperty' => 'customValue'])->log('Wakil Rektorat');

            if(auth()->user()) {
                $notify_absen = Pengajuan_Absen::find($id);
                $user = User::all()->where('id', $notify_absen->user_id);
                Notification::send($user, new IncomingAbsen($notify_absen));
            }
        }
        if (auth()->user()->HasRole('Admin')){
            DB::update('update pengajuan__absens set status_kp = ?, status_hrd = ?, status_rek = ? where id = ?', [$StatusKP, $StatusHRD, $StatusREK, $id]);
            activity()->performedOn($Pengajuan_Absen)->causedBy(auth()->user()->id)->withProperties(['customProperty' => 'customValue'])->log('Admin');

            if(auth()->user()) {
                $notify_absen = Pengajuan_Absen::find($id);
                $user = User::all()->where('id', $notify_absen->user_id);
                Notification::send($user, new IncomingAbsen($notify_absen));
            }
        }
        return redirect()->route('surat_absen.index')->with('success', 'Telah Berhasil Diupdate');
    }

    public function destroy(Pengajuan_Absen $Pengajuan_Absen, $id) {
        $Pengajuan_Absen = Pengajuan_Absen::with('User')->find($id);
        if ($Pengajuan_Absen->image !== null) {
            $name = $Pengajuan_Absen->User->name;
            $image_path = storage_path(). '/app/public/surat_bukti/'.$Pengajuan_Absen->image;
            unlink($image_path);
            Storage::delete($image_path);

            $image_move = public_path(). '/surat_bukti/'. $name . '/' . $Pengajuan_Absen->image;
            unlink($image_move);
            Storage::delete($image_move);
        }
        $Pengajuan_Absen->delete();
        return redirect()->route('surat_absen.index')->with('success', 'Telah Berhasil Dihapus');
    }

    public function search(Request $request) {
        $search = $request->search;
        $pengajuanAbsen = Pengajuan_Absen::whereHas('User', function($q) use($search) {
            $q->where('name', 'like', "%".$search."%")->orWhere('nip', 'like', "%".$search."%");
        })->orwhereHas('Unit_Kerja', function($u) use($search) {
            $u->where('name', 'like', "%".$search."%");
        })->paginate();
        return view('surat_absen.index', compact('pengajuanAbsen'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
