<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\ProgresPengajuan;
use App\Models\ReviewPengajuan;
use Auth;
use Illuminate\Http\Request;

class ReviewPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function action_review(Request $request, $pengajuanId)
    {
        try {
            $reviewBefore = ReviewPengajuan::where('pengajuan_id', '=', $pengajuanId)->orderBy('created_at', 'DESC')->first();

            $pengajuan = Pengajuan::find($pengajuanId);
            $formDetails = $pengajuan->getFormPengajuan->getFormPengajuanDetails;

            $user = Auth::user();
            $requestCount = 0;

            foreach ($formDetails as $detail) {
                
                $key = $detail->key;

                if ($request->$key == 'revisi') {
                    $isVerified = false;
                } else {
                    $isVerified = true;
                    $requestCount++;
                }

                ReviewPengajuan::create([
                    'pengajuan_id' => $pengajuanId,
                    'verified_by' => $user->id,
                    'key' => $key,
                    'is_verified' => $isVerified,
                    'keterangan' => $request->input("$key-keterangan"),
                    'version' => empty($reviewBefore) ? 1 : $reviewBefore->version++
                ]);

            }

            if ($requestCount == $formDetails->count()) {
                $pengajuan->status = 'DALAM_PROSES';
                $pengajuan->tahap = 'SIDANG_KOMITE';
                $keteranganProgres = 'Berkas telah diverifikasi, lanjut ke tahap berikutnya';
                $status = 'DISETUJUI';
            } else {
                $pengajuan->status = 'REVISI';
                $pengajuan->tahap = 'PERLU_DILENGKAPI';
                $keteranganProgres = 'Berkas telah ditinjau dan perlu perbaikan';
                $status = 'REVISI';
            }

            
            ProgresPengajuan::create([
                'pengajuan_id' => $pengajuanId,
                'verified_by' => $user->id,
                'status' => $status,
                'tahap' => 'VERIFIKASI_BERKAS',
                'keterangan' => $keteranganProgres,
            ]);

            $pengajuan->save();

            return redirect()->route('kepegawaian.pengajuan.list')->with('success', 'Proses Review Berasil');

        } catch (\Throwable $th) {
            return redirect()->back()->with('errors', $th);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ReviewPengajuan $reviewPengajuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReviewPengajuan $reviewPengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReviewPengajuan $reviewPengajuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReviewPengajuan $reviewPengajuan)
    {
        //
    }
}
