<?php

namespace Database\Seeders\FormPengajuanDetail\Umum;

use App\Models\FormPengajuan;
use App\Models\FormPengajuanDetail;
use Illuminate\Database\Seeder;
use Str;

class FormLektorKepalaSeeder extends Seeder
{
    public function run(): void
    {
        $lektorKepala_umum = FormPengajuan::where([
                ['rumpun', '=', 'UMUM'],
                ['usul', '=', 'LEKTOR_KEPALA']
            ])->first();
        
        $data_lektorKepala_umum = [
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $lektorKepala_umum->id,
                'key' => 'ijazah_tertinggi',
                'title' => 'Scan Ijazah Tertinggi*',
                'description' => null,
                'detail' => null,
                'order' => 1,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $lektorKepala_umum->id,
                'key' => 'disertasi',
                'title' => 'Scan Disertasi',
                'description' => 'Scan Disertasi (Cover, lembar pengesahan, daftar isi, ringkasan disertasi)*',
                'detail' => null,
                'order' => 2,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $lektorKepala_umum->id,
                'key' => 'sk_cpns',
                'title' => 'Scan SK CPNS',
                'description' => 'Scan SK CPNS / SK Pengangkatan sebagai DTNPNS*',
                'detail' => null,
                'order' => 3,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $lektorKepala_umum->id,
                'key' => 'sk_pns',
                'title' => 'Scan SK PNS',
                'description' => null,
                'detail' => null,
                'order' => 4,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $lektorKepala_umum->id,
                'key' => 'sk_pengangkatan_fungsional_pertama',
                'title' => 'SK Pengangkatan Jabatan Fungsional Pertama',
                'description' => 'SK Pengangkatan Jabatan Fungsional Pertama (Memastikan telah terupdate di SISTER)*',
                'detail' => null,
                'order' => 5,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $lektorKepala_umum->id,
                'key' => 'sk_kenaikan_pangkat_terakhir',
                'title' => 'SK Kenaikan Pangkat Golongan Terakhir',
                'description' => 'SK Kenaikan Pangkat Golongan Terakhir (Memastikan telah terupdate di SISTER)*',
                'detail' => null,
                'order' => 6,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $lektorKepala_umum->id,
                'key' => 'sk_kenaikan_fungsional_terakhir',
                'title' => 'SK Kenaikan Jabatan Fungsional Terakhir',
                'description' => 'SK Kenaikan Jabatan Fungsional Terakhir (Memastikan telah terupdate di SISTER)*',
                'detail' => null,
                'order' => 7,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $lektorKepala_umum->id,
                'key' => 'sk_pak_integrasi',
                'title' => 'SK PAK Integrasi (dari SISTER)',
                'description' => null,
                'detail' => null,
                'order' => 8,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $lektorKepala_umum->id,
                'key' => 'sk_pak_konversi',
                'title' => 'SK PAK Konversi',
                'description' => 'SK PAK Konversi (dari e-kinerja) dengan keterangan bahwa dapat dinaikkan dalam jenjang jabatan Madya',
                'detail' => null,
                'order' => 9,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $lektorKepala_umum->id,
                'key' => 'dupak',
                'title' => 'DUPAK (bagi DTNPNS)*',
                'description' => null,
                'detail' => null,
                'order' => 10,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $lektorKepala_umum->id,
                'key' => 'lbkd',
                'title' => 'LBKD 4 Semester terakhir*',
                'description' => null,
                'detail' => null,
                'order' => 11,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $lektorKepala_umum->id,
                'key' => 'skp',
                'title' => 'SKP 2 Tahun terakhir*',
                'description' => null,
                'detail' => null,
                'order' => 12,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $lektorKepala_umum->id,
                'key' => 'keabsahan_karil',
                'title' => 'Surat Pernyataan Keabsahan Karya Ilmiah*',
                'description' => null,
                'detail' => null,
                'order' => 13,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $lektorKepala_umum->id,
                'key' => 'profile_penelitian',
                'title' => 'Profile Penelitian Dosen',
                'description' => 'Profile Penelitian Dosen (sebagai penulis pertama pada jurnal SINTA 2 untuk berijazah Doktor dan Jurnal Internasional terindeks Scopus SJR 0.1 bagi dosen berijazah Magister)*',
                'detail' => null,
                'order' => 14,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $lektorKepala_umum->id,
                'key' => 'sertifikat_pendidik',
                'title' => 'Sertifikat Pendidik (Serdos)*',
                'description' => null,
                'detail' => null,
                'order' => 15,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $lektorKepala_umum->id,
                'key' => 'pakta_integritas_validasi_karya',
                'title' => 'Pakta Integritas Pengesahan Validasi Karya',
                'description' => 'Surat Penyataan Pakta Integritas Pengesahan Hasil Validasi Karya Ilmiah oleh Pimpinan yang ditanda tangan diatasa materai*',
                'detail' => null,
                'order' => 16,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $lektorKepala_umum->id,
                'key' => 'peta_jabatan',
                'title' => 'Peta Jabatan Akademik Dosen*',
                'description' => null,
                'detail' => null,
                'order' => 17,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $lektorKepala_umum->id,
                'key' => 'pengantar_dekan',
                'title' => 'Surat Pengantar dari Dekan*',
                'description' => null,
                'detail' => null,
                'order' => 18,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $lektorKepala_umum->id,
                'key' => 'surat_hukuman_disiplin',
                'title' => 'Keterangan Tidak Dijatuhi Hukuman Disiplin',
                'description' => 'Surat Keterangan Tidak Pernah Dijatuhi Hukuman Disiplin Tingkat Sedang/Berat*',
                'detail' => null,
                'order' => 19,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $lektorKepala_umum->id,
                'key' => 'surat_status_pidana',
                'title' => 'Surat Pernyataan Tidak Menjalani Pidana*',
                'description' => 'Surat Pernyataan tidak Sedang Menjalani Proses Pidana atau Pernah dipidana Penjara*',
                'detail' => null,
                'order' => 20,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $lektorKepala_umum->id,
                'key' => 'isian_pribadi',
                'title' => 'Isian Data Pribadi*',
                'description' => null,
                'detail' => null,
                'order' => 21,
            ],
        ];
        
        FormPengajuanDetail::insert($data_lektorKepala_umum);
        
    }
}
