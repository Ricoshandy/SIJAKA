<?php

namespace App\Http\Controllers;

use App\Models\FormPengajuan;
use App\Models\Pengajuan;
use Auth;
use Illuminate\Http\Request;

class FormPengajuanController extends Controller
{
    public function pengajuan_form(){
        $options = FormPengajuan::all();
        return view('Dosen.PilihFormPengajuan', compact('options'));
    }

    public function form($id){
        $form = FormPengajuan::find($id);
        return view('Dosen.FormPengajuan', compact('form'));
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
