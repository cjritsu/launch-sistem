<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\Unit_Kerja;
use App\Models\Karyawan;
use App\Models\Pengajuan_Cuti;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */


    public function index()
    {

    }

    public function edit()
    {
        $data['karyawans'] = Karyawan::with('User', 'Unit_Kerja')->where('user_id', auth()->user()->id)->get();
        return view('profile.edit', $data);
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());
        $agama = $request->input('agama');
        $tmpt_lahir = $request->input('tmpt_l');
        $tgl_lahir = $request->input('tgl_l');
        $no_telp = $request->input('no_hp');
        $alamat = $request->input('alamat');
        $user_id = auth()->user()->id;
        DB::update('update karyawans set agama = ?, tempat_lahir = ?, tanggal_lahir = ?, no_telp = ?, alamat = ? where id = ?', [$agama, $tmpt_lahir, $tgl_lahir, $no_telp, $alamat, $user_id]);
        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
