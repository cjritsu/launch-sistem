<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Departemen;
use App\Models\Unit_Kerja;
use App\Models\status_karyawan;
use App\Models\Karyawan;
use App\Models\Pengajuan_Cuti;

class KaryawanController extends Controller
{
    public function index() {
        $data['karyawans'] = Karyawan::with('User', 'Departemen', 'Unit_Kerja', 'status_karyawan')->get();
        return view('karyawan.index', $data);
    }
}
