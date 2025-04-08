@extends('Kepegawaian.Components.sidebar')
@section('main-content')
<div class="header">
    <h1>Sistem Informasi Kenaikan Jabatan Akademik Dosen</h1>
</div>
<div class="stats">

    <div class="stat-box">
        <h3>Total Dosen</h3>
        <p>{{ $totalDosen }}</p>
    </div>
    <div class="stat-box">
        <h3>Total Pengajuan</h3>
        <p>{{ $totalPengajuan }}</p>
    </div>
    <div class="stat-box">
        <h3>Berkas Di Tolak</h3>
        <p>{{ $berkasDitolak }}</p>
    </div>
    <div class="stat-box">
        <h3>Berkas Di Terima</h3>
        <p>{{ $berkasDiterima }}</p>
    </div>
    
</div>

@endsection