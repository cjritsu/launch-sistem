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

        // profile-user
        $request->validate([
            'avatar' => 'image|mimes:jpeg, PNG, jpg, svg, webp, bmp|max:2048',
            'header' => 'image|mimes:jpeg, PNG, jpg, svg, webp, png|max:2048'
        ],
        [
            'avatar.max' => 'Direkomendasikan ukurannya dibawah 2MB',
            'header.max' => 'Direkomendasikan ukurannya dibawah 2MB'
        ]);

        //pfp
        if($request->has('avatar')) {
            $avatarName = $request->avatar->getClientOriginalName();
            $request->avatar->storeAs('public/profile', $avatarName);

            $avatar_path = public_path(). '/avatar';
            $request->avatar->move($avatar_path, $avatarName);
            DB::update('update users set avatar = ? where id = ?', [$avatarName, auth()->user()->id]);
        }
        elseif ($request->has('header')) {
            //header
            $headerName = $request->header->getClientOriginalName();
            $request->header->storeAs('public/profile', $headerName);

            $header_path = public_path(). '/header';
            $request->header->move($header_path, $headerName);
            DB::update('update users set header = ? where id = ?', [$headerName, auth()->user()->id]);
        }
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
        auth()->user()->update(['password' => $request->get('password')]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
