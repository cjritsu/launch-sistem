<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengajuan_Cuti;
use DB;

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
    public function index()
    {
        $data['User_Count'] = User::select('id')->count();
        $data['Cuti_Count'] = Pengajuan_Cuti::select('id')->count();
        $data['Terima_Count'] = Pengajuan_Cuti::select('id')->where('status_id', '=', '2')->count();
        $data['Tolak_Count'] = Pengajuan_Cuti::select('id')->where('status_id', '=', '3')->count();
        return view('pages.dashboard', $data);
    }
}
