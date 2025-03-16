<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dosen_dashboard() {
        return view('Dosen.dashboard');
    }

    public function kepegawaian_dashboard() {
        return view('Kepegawaian.dashboard');
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
