<?php

namespace App\Http\Controllers;

use App\Models\FormPengajuan;
use App\Models\Pengajuan;
use App\Models\Periode;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FormPengajuanController extends Controller
{
    public function pengajuan_form(){
        $today = Carbon::today();
        $options = FormPengajuan::all();
        $activePeriode = Periode::where('date_start', '<=', $today)
                         ->where('date_end', '>=', $today)
                         ->first();
        return view('Dosen.PilihFormPengajuan', compact('options', 'activePeriode'));
    }

    public function form($id){
        $today = Carbon::today();
        $form = FormPengajuan::find($id);
        $activePeriode = Periode::where('date_start', '<=', $today)
                         ->where('date_end', '>=', $today)
                         ->first();
        return view('Dosen.FormPengajuan', compact('form', 'activePeriode'));
    }

    public function pengajuan_list()
    {
        $pengajuans = Auth::user()->getPengajuans;
        return view('Dosen.ListPengajuan', compact('pengajuans'));
    }

    /**
     * Display the specified resource.
     */
    public function show(FormPengajuan $formPengajuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FormPengajuan $formPengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FormPengajuan $formPengajuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormPengajuan $formPengajuan)
    {
        //
    }
}
