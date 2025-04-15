@extends('Dosen.Components.sidebar')
@section('main-content')

<div class="header">
    <h1>Sistem Informasi Kenaikan Jabatan Akademik Dosen</h1>
</div>

<div class="stats">

    <div class="stat-box">
        <h3>Total Dosen</h3>
        <p>{{$dosen}}</p>
    </div>
    <div class="stat-box">
        <h3>Total Pengajuan Saya</h3>
        <p>{{ $pengajuanSaya }}</p>
    </div>
    <div class="stat-box">
        <h3>Pengajuan Saya Dalam Proses</h3>
        <p>{{ $dalamProses  }}</p>
    </div>
    
</div>

@endsection