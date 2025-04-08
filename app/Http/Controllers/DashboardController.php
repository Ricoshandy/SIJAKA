<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dosen_dashboard() {
        return view('Dosen.dashboard');
    }

    public function kepegawaian_dashboard() {
        $totalDosen = User::whereRole('dosen')->count();
        $totalPengajuan = Pengajuan::all()->count();
        $berkasDiterima = Pengajuan::whereTahap(['SIDANG_KOMITE','SIDANG_SENAT','PENGAJUAN_SISTER', 'SK_KENAIKAN'])->count();
        $berkasDitolak = Pengajuan::whereStatus('REVISI')->count();
        return view('Kepegawaian.dashboard', compact('totalDosen', 'totalPengajuan', 'berkasDiterima', 'berkasDitolak'));
    }

    public function comite_dashboard() {
        return view('Comite.dashboard');
    }

    public function senat_dashboard() {
        return view('Senat.dashboard');
    }

    public function superadmin_dashboard() {
        return view('Superadmin.dashboard');
    }
}
