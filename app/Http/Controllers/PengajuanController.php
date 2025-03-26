<?php

namespace App\Http\Controllers;

use App\Models\FormPengajuan;
use App\Models\Pengajuan;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Str;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function submit(Request $request, $id)
    {
        $user = Auth::user();

        $form = FormPengajuan::with('getFormPengajuanDetails')->findOrFail($id);
        $formDetails = $form->getFormPengajuanDetails;

        $uploadedFiles = [];

        $pengajuan = new Pengajuan();
        $pengajuan->user_id = $user->id;
        $pengajuan->form_pengajuan_id = $id;

        foreach ($formDetails as $detail) {
            if ($request->hasFile($detail->key)) {
                
                $key = $detail->key;

                $file = $request->file($key);
                $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $destinationPath = 'pengajuan/' . $user->email . '/' . $key;
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }
                $file->move($destinationPath, $fileName);
                $uploadedFiles[$key] = $destinationPath . '/' . $fileName;

                $pengajuan->$key = $uploadedFiles[$key];
            }
        }

        $pengajuan->save();

        return redirect()->route('dosen_dashboard')->with('success', 'Data berhasil disimpan!');
    }

    public function pengajuan_view($id)
    {
        $pengajuan = Pengajuan::find($id);
        return view('Dosen.ViewPengajuan', compact('pengajuan'));
    }


    public function pengajuan_edit($id)
    {
        $pengajuan = Pengajuan::find($id);
        return view('Dosen.EditPengajuan', compact('pengajuan'));
    }

    public function pengajuan_edit_submit(Request $request, $id)
    {
        $uploadedFiles = [];

        $pengajuan = Pengajuan::find($id);
        $formDetails = $pengajuan->getFormPengajuan->getFormPengajuanDetails;

        $user = $pengajuan->getUser;

        foreach ($formDetails as $detail) {
            if ($request->hasFile($detail->key)) {
                
                $key = $detail->key;

                if ($pengajuan->$key !== null) {
                    unlink($pengajuan->$key);
                }

                $file = $request->file($key);
                $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $destinationPath = 'pengajuan/' . $user->email . '/' . $key;
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }
                $file->move($destinationPath, $fileName);
                $uploadedFiles[$key] = $destinationPath . '/' . $fileName;

                $pengajuan->$key = $uploadedFiles[$key];
            }
        }

        $pengajuan->save();

        return redirect()->route('dosen_dashboard')->with('success', 'Data berhasil disimpan!');
    }
}
