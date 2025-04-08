@extends('Dosen.Components.sidebar')
@section('main-content')

<div class="header">
    <h1>Sistem Informasi Kenaikan Jabatan Akademik Dosen</h1>
</div>

<div class="stats">

    <div class="stat-box">
        <h3>Dosen</h3>
        <p>3031</p>
    </div>
    <div class="stat-box">
        <h3>Total Pengajuan</h3>
        <p>{{ Auth::user()->getPengajuans()->count() }}</p>
    </div>
    <div class="stat-box">
        <h3>Di Tolak</h3>
        <p>120</p>
    </div>
    <div class="stat-box">
        <h3>Di Terima</h3>
        <p>46</p>
    </div>
    
</div>

@endsection