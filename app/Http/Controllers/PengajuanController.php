<?php

namespace App\Http\Controllers;

use App\Models\FormPengajuan;
use App\Models\Pengajuan;
use App\Models\ProgresPengajuan;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
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
        $pengajuan->periode_id = $request->input('periode_id');

        $requestCount = 0;

        foreach ($formDetails as $detail) {
            if ($request->hasFile($detail->key)) {
                
                $key = $detail->key;

                $file = $request->file($key);
                $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $destinationPath = "pengajuan/{$user->email}/{$key}";
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }
                Storage::putFileAs($destinationPath, $file, $fileName);
                $uploadedFiles[$key] = $destinationPath . '/' . $fileName;

                $pengajuan->$key = $uploadedFiles[$key];
                $requestCount++;
            }
        }

        if ($request->pengajuan && $requestCount == $formDetails->count()) {
            $message = 'Pengajuan anda berhasil dan sedang dalam proses review oleh staff kepegawaian';
            $pengajuan->status = 'BARU';
            $pengajuan->tahap = 'VERIFIKASI_BERKAS';
            $keterangan = 'Form Pengajuan telah diselesaikan, dikirim ke staff kepegawaian untuk di verifikasi';
        } else {
            $message = 'Pengajuan anda berhasil disimpan, namun belum di ajukan dan belum dapat diverifikasi staff kepegawaian.';
            $pengajuan->status = 'DRAFT';
            $pengajuan->tahap = 'PERLU_DILENGKAPI';
            $keterangan = 'Form Pengajuan disimpan, Perlu dilengkapi agar dapat diverifikasi oleh staff kepegawaian';
        }

        $pengajuan->save();

        
        ProgresPengajuan::create([
            'pengajuan_id' => $pengajuan->id,
            'verified_by' => $user->id,
            'status' => $pengajuan->status,
            'tahap' => $pengajuan->tahap,
            'keterangan' => $keterangan,
        ]);
        

        return redirect()->route('dosen_dashboard')->with('success', $message);
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

        $requestCount = 0;

        foreach ($formDetails as $detail) {

            $key = $detail->key;

            if ($request->hasFile($detail->key)) {    

                if ($pengajuan->$key !== null && Storage::exists($pengajuan->$key)) {
                    Storage::delete($pengajuan->$key);
                }

                $file = $request->file($key);
                $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $destinationPath = "pengajuan/{$user->email}/{$key}";
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }
                Storage::putFileAs($destinationPath, $file, $fileName);
                $uploadedFiles[$key] = $destinationPath . '/' . $fileName;

                $pengajuan->$key = $uploadedFiles[$key];
            }
            
            if ($pengajuan->$key !== null) {
                $requestCount++;
            }
        }

        if ($request->pengajuan && $requestCount == $formDetails->count()) {
            $message = 'Pengajuan anda berhasil dan sedang dalam proses review oleh staff kepegawaian';
            $pengajuan->status = 'BARU';
            $pengajuan->tahap = 'VERIFIKASI_BERKAS';
            $keterangan = 'Form Pengajuan telah diselesaikan, dikirim ke staff kepegawaian untuk di verifikasi';
        } else {
            $message = 'Pengajuan anda berhasil disimpan, namun belum di ajukan dan belum dapat diverifikasi staff kepegawaian.';
            $pengajuan->status = 'DRAFT';
            $pengajuan->tahap = 'PERLU_DILENGKAPI';
            $keterangan = 'Form Pengajuan disimpan, Namun belum lengkap Perlu dilengkapi agar dapat diverifikasi oleh staff kepegawaian';
        }

        $pengajuan->save();


        ProgresPengajuan::create([
            'pengajuan_id' => $pengajuan->id,
            'verified_by' => $user->id,
            'status' => $pengajuan->status,
            'tahap' => $pengajuan->tahap,
            'keterangan' => $keterangan,
        ]);

        return redirect()->route('dosen_dashboard')->with('success', $message);
    }

    public function kepegawaian_pengajuan_list()
    {
        $pengajuans = Pengajuan::all();
        return view('Kepegawaian.ListPengajuan', compact('pengajuans'));
    }

    public function pengajuan_review($id)
    {
        $pengajuan = Pengajuan::find($id);
        return view('Kepegawaian.ReviewPengajuan', compact('pengajuan'));
    }

    public function pengajuan_sister($id)
    {
        $pengajuan = Pengajuan::find($id);
        return view('Kepegawaian.SisterPengajuan', compact('pengajuan'));
    }

    public function pengajuan_progress($id){
        $pengajuan = Pengajuan::find($id);
        return view('Dosen.ProgressPengajuan', compact('pengajuan'));
    }


    public function comite_pengajuan_list()
    {
        $pengajuans = Pengajuan::all();
        return view('Comite.ListPengajuan', compact('pengajuans'));
    }

    public function sidang_komite_view($id){
        $pengajuan = Pengajuan::find($id);
        return view('Comite.SidangKomite', compact('pengajuan'));
    }

    public function getFile($email, $key, $file){
        $path = "private/pengajuan/$email/$key/$file";
        $fullPath = storage_path('app/' . $path);
        if (!file_exists($fullPath)) {
            abort(404);
        }
        return response()->file($fullPath);
    }

    public function getFileSidang($email, $file){
        $path = "private/sidang/$email/$file";
        $fullPath = storage_path('app/' . $path);
        if (!file_exists($fullPath)) {
            abort(404);
        }
        return response()->file($fullPath);
    }

    public function sidang_senat_view($id){
        $pengajuan = Pengajuan::find($id);
        return view('Senat.SidangSenat', compact('pengajuan'));
    }

    public function senat_pengajuan_list()
    {
        $pengajuans = Pengajuan::all();
        return view('Senat.ListPengajuan', compact('pengajuans'));
    }

    public function download_pengajuan($id_pengajuan) {
        $pengajuan = Pengajuan::find($id_pengajuan);
        $zipFileName = 'Pengajuan-' . $pengajuan->getUser->email . '.zip';
        $zipFilePath = storage_path('app/public/tmp/' . $zipFileName);
        $zip = new ZipArchive;

        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
            foreach ( $pengajuan->getFormPengajuan->getFormPengajuanDetails()->orderBy('order', 'ASC')->get() as $key ) {
                $column = $key->key; 
                $filePath = '/'. $pengajuan->$column;
                
                if (file_exists($filePath)) {
                    // $zip->addFile($filePath, basename($file));
                }
            }
            $zip->close();
    
            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        } else {
            return back()->with('error', 'Gagal membuat file ZIP.');
        }

        $allFiles = [];
        foreach ( $pengajuan->getFormPengajuan->getFormPengajuanDetails()->orderBy('order', 'ASC')->get() as $key ){
            $column = $key->key;    
            
            // <div style="margin-bottom: 6px;">
            //     <button class="action-button" onclick="show('/{{ $pengajuan->$column }}', 'Berkas {{ $key->title }}')">
            //         {{ $key->title }}
            //     </button>
            // </div>
        }
    }
}
