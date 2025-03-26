<?php

namespace Database\Seeders\FormPengajuanDetail\Umum;

use App\Models\FormPengajuan;
use App\Models\FormPengajuanDetail;
use Illuminate\Database\Seeder;
use Str;

class FormAsistenAhliSeeder extends Seeder
{
    public function run(): void
    {
        $asistenAhli_umum = FormPengajuan::where([
                ['rumpun', '=', 'UMUM'],
                ['usul', '=', 'ASISTEN_AHLI']
            ])->first();
        
        $data_asistenAhli_umum = [
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $asistenAhli_umum->id,
                'key' => 'ijazah_tertinggi',
                'title' => 'Scan Ijazah Tertinggi*',
                'description' => null,
                'detail' => null,
                'order' => 1,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $asistenAhli_umum->id,
                'key' => 'disertasi',
                'title' => 'Scan Disertasi',
                'description' => 'Scan Disertasi (Cover, lembar pengesahan, daftar isi, ringkasan disertasi)*',
                'detail' => null,
                'order' => 2,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $asistenAhli_umum->id,
                'key' => 'sk_cpns',
                'title' => 'Scan SK CPNS',
                'description' => 'Scan SK CPNS / SK Pengangkatan sebagai DTNPNS*',
                'detail' => null,
                'order' => 3,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $asistenAhli_umum->id,
                'key' => 'sk_pns',
                'title' => 'Scan SK PNS',
                'description' => null,
                'detail' => null,
                'order' => 4,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $asistenAhli_umum->id,
                'key' => 'sk_pak_integrasi',
                'title' => 'SK PAK Integrasi (dari SISTER)',
                'description' => null,
                'detail' => null,
                'order' => 5,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $asistenAhli_umum->id,
                'key' => 'sk_pak_konversi',
                'title' => 'SK PAK Konversi (dari e-kinerja)',
                'description' => null,
                'detail' => null,
                'order' => 6,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $asistenAhli_umum->id,
                'key' => 'dupak',
                'title' => 'DUPAK (bagi DTNPNS)*',
                'description' => null,
                'detail' => null,
                'order' => 7,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $asistenAhli_umum->id,
                'key' => 'lbkd',
                'title' => 'LBKD 4 Semester terakhir*',
                'description' => null,
                'detail' => null,
                'order' => 8,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $asistenAhli_umum->id,
                'key' => 'skp',
                'title' => 'SKP 2 Tahun terakhir*',
                'description' => null,
                'detail' => null,
                'order' => 9,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $asistenAhli_umum->id,
                'key' => 'keabsahan_karil',
                'title' => 'Surat Pernyataan Keabsahan Karya Ilmiah*',
                'description' => null,
                'detail' => null,
                'order' => 10,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $asistenAhli_umum->id,
                'key' => 'profile_penelitian',
                'title' => 'Profile Penelitian Dosen',
                'description' => 'Profile Penelitian Dosen (min. SINTA 6 sebagai penulis pertama)*',
                'detail' => null,
                'order' => 11,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $asistenAhli_umum->id,
                'key' => 'peta_jabatan',
                'title' => 'Peta Jabatan Akademik Dosen*',
                'description' => null,
                'detail' => null,
                'order' => 12,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $asistenAhli_umum->id,
                'key' => 'pengantar_dekan',
                'title' => 'Surat Pengantar dari Dekan*',
                'description' => null,
                'detail' => null,
                'order' => 13,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $asistenAhli_umum->id,
                'key' => 'surat_hukuman_disiplin',
                'title' => 'Keterangan Tidak Dijatuhi Hukuman Disiplin',
                'description' => 'Surat Keterangan Tidak Pernah Dijatuhi Hukuman Disiplin Tingkat Sedang/Berat*',
                'detail' => null,
                'order' => 14,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $asistenAhli_umum->id,
                'key' => 'surat_status_pidana',
                'title' => 'Surat Pernyataan Tidak Menjalani Pidana*',
                'description' => 'Surat Pernyataan tidak Sedang Menjalani Proses Pidana atau Pernah dipidana Penjara*',
                'detail' => null,
                'order' => 15,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $asistenAhli_umum->id,
                'key' => 'isian_pribadi',
                'title' => 'Isian Data Pribadi*',
                'description' => null,
                'detail' => null,
                'order' => 16,
            ],
        ];
        
        FormPengajuanDetail::insert($data_asistenAhli_umum);
        
    }
}
