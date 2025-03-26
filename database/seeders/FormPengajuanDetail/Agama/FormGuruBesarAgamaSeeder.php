<?php

namespace Database\Seeders\FormPengajuanDetail\Agama;

use App\Models\FormPengajuan;
use App\Models\FormPengajuanDetail;
use Illuminate\Database\Seeder;
use Str;

class FormGuruBesarAgamaSeeder extends Seeder
{
    public function run(): void
    {
        $guruBesar_agama = FormPengajuan::where([
                ['rumpun', '=', 'AGAMA'],
                ['usul', '=', 'GURU_BESAR']
            ])->first();
        
        $data_guruBesar_agama = [
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $guruBesar_agama->id,
                'key' => 'ijazah_tertinggi',
                'title' => 'Scan Ijazah Pendidikan Doktor',
                'description' => 'Scan Ijazah Pendidikan Doktor dan Ijazah Penyetaraan (bagi lulusan luar negeri)*',
                'detail' => null,
                'order' => 1,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $guruBesar_agama->id,
                'key' => 'disertasi',
                'title' => 'Scan Disertasi',
                'description' => 'Scan Disertasi (Cover, lembar pengesahan, daftar isi, ringkasan disertasi)*',
                'detail' => null,
                'order' => 2,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $guruBesar_agama->id,
                'key' => 'sk_cpns',
                'title' => 'Scan SK CPNS',
                'description' => 'Scan SK CPNS / SK Pengangkatan sebagai DTNPNS*',
                'detail' => null,
                'order' => 3,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $guruBesar_agama->id,
                'key' => 'sk_pns',
                'title' => 'Scan SK PNS',
                'description' => null,
                'detail' => null,
                'order' => 4,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $guruBesar_agama->id,
                'key' => 'sk_pengangkatan_fungsional_pertama',
                'title' => 'SK Pengangkatan Jabatan Fungsional Pertama',
                'description' => 'SK Pengangkatan Jabatan Fungsional Pertama (Memastikan telah terupdate di SISTER)*',
                'detail' => null,
                'order' => 5,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $guruBesar_agama->id,
                'key' => 'sk_kenaikan_pangkat_terakhir',
                'title' => 'SK Kenaikan Pangkat Golongan Terakhir',
                'description' => 'SK Kenaikan Pangkat Golongan Terakhir / SK Inpassing gol. IV/a / IV/b / IV/c bagi DTNPNS dengan masa kerja minimal 10 tahun*',
                'detail' => null,
                'order' => 6,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $guruBesar_agama->id,
                'key' => 'sk_kenaikan_fungsional_terakhir',
                'title' => 'SK Kenaikan Jabatan Fungsional Terakhir',
                'description' => 'SK Kenaikan Jabatan Fungsional Terakhir (Memastikan telah terupdate di SISTER)*',
                'detail' => null,
                'order' => 7,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $guruBesar_agama->id,
                'key' => 'sk_pak_integrasi',
                'title' => 'SK PAK Integrasi (dari SISTER)',
                'description' => null,
                'detail' => null,
                'order' => 8,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $guruBesar_agama->id,
                'key' => 'sk_pak_konversi',
                'title' => 'SK PAK Konversi',
                'description' => 'SK PAK Konversi (dari e-kinerja) dengan keterangan bahwa dapat dinaikkan dalam jenjang jabatan Utama',
                'detail' => null,
                'order' => 9,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $guruBesar_agama->id,
                'key' => 'dupak',
                'title' => 'DUPAK (bagi DTNPNS)*',
                'description' => null,
                'detail' => null,
                'order' => 10,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $guruBesar_agama->id,
                'key' => 'lbkd',
                'title' => 'LBKD 4 Semester terakhir*',
                'description' => null,
                'detail' => null,
                'order' => 11,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $guruBesar_agama->id,
                'key' => 'skp',
                'title' => 'SKP 2 Tahun terakhir*',
                'description' => null,
                'detail' => null,
                'order' => 12,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $guruBesar_agama->id,
                'key' => 'keabsahan_karil',
                'title' => 'Surat Pernyataan Keabsahan Karya Ilmiah*',
                'description' => null,
                'detail' => null,
                'order' => 13,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $guruBesar_agama->id,
                'key' => 'profile_penelitian',
                'title' => 'Profile Penelitian Dosen',
                'description' => 'Profile Penelitian Dosen (sebagai penulis pertama pada jurnal Jurnal Internasional terindeks Scopus SJR 0.1)*',
                'detail' => null,
                'order' => 14,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $guruBesar_agama->id,
                'key' => 'sertifikat_pendidik',
                'title' => 'Sertifikat Pendidik (Serdos)*',
                'description' => null,
                'detail' => null,
                'order' => 15,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $guruBesar_agama->id,
                'key' => 'peta_jabatan',
                'title' => 'Peta Jabatan Akademik Dosen*',
                'description' => null,
                'detail' => null,
                'order' => 16,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $guruBesar_agama->id,
                'key' => 'pengantar_dekan',
                'title' => 'Dokumen tambahan Syarat Khusus',
                'description' => 'Dokumen tambahan Syarat Khusus (pilih salah satu kategori, lihat detail)*',
                'detail' => '
<div>
    <h1>Sebagai Ketua Penelitian hibah kompetitif minimal tingakt daerah</h1>
    <ul>
        <li>SK hibah penelitian yang menunjukkan sebagai ketua penelitian</li>
        <li>Kontrak Penerima hibah</li>
        <li>Laporan hasil penerima hibah penelitian</li>
        <li>Nominal hibah tidak menjadi poin yang perlu dipertimbangkan</li>
        <li>Hibah yang diperoleh dari internal Perguruan Tinggi, tidak dapat dijadikan Syarat Khusus tambahan</li>
    </ul>
</div>
<div>
    <h1>Membimbing 3 mahasiwa doktor</h1>
    <ul>
        <li>SK Penugasan sebagai pembimbing  mahasiwa yang dimaksud</li>
        <li>Lembar Pengesahan disertasi mahasiswa yang dimaksud</li>
    </ul>
</div>
<div>
    <h1>Menguji 3 mahasiswa doktor </h1>
    <ul>
        <li>SK/ Surat Tugas Menjadi penguji disertasi</li>
        <li>Berita Acara Sidang Tertutup</li>
        <li>Lembar pengesahan disertasi</li>
    </ul>
</div>
<div>
    <h1>Sebagai reviewer 2 jurnal internasional bereputasi</h1>
    <ul>
    <li>Sertifikat sebagai reviewer / bukti penugasan atau permintaan dari jurnal</li>
    </ul>
</div>
                ',
                'order' => 17,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $guruBesar_agama->id,
                'key' => 'sayrat_khusus',
                'title' => 'Surat Pengantar dari Dekan*',
                'description' => null,
                'detail' => null,
                'order' => 18,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $guruBesar_agama->id,
                'key' => 'surat_hukuman_disiplin',
                'title' => 'Keterangan Tidak Dijatuhi Hukuman Disiplin',
                'description' => 'Surat Keterangan Tidak Pernah Dijatuhi Hukuman Disiplin Tingkat Sedang/Berat*',
                'detail' => null,
                'order' => 19,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $guruBesar_agama->id,
                'key' => 'surat_status_pidana',
                'title' => 'Surat Pernyataan Tidak Menjalani Pidana*',
                'description' => 'Surat Pernyataan tidak Sedang Menjalani Proses Pidana atau Pernah dipidana Penjara*',
                'detail' => null,
                'order' => 20,
            ],
            [
                'id' => Str::uuid(),
                'form_pengajuan_id' => $guruBesar_agama->id,
                'key' => 'isian_pribadi',
                'title' => 'Isian Data Pribadi*',
                'description' => null,
                'detail' => null,
                'order' => 21,
            ],
        ];
        
        FormPengajuanDetail::insert($data_guruBesar_agama);
        
    }
}
