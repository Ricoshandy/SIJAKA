@php use Carbon\Carbon; @endphp
@extends('Dosen.Components.sidebar')

<style>
    .header-h1 {
        font-size: 24px;
        font-weight: 700;
        padding-bottom: 100px;
        margin-left: 40px;
        font-family: sans-serif;
    }

    /* Box Periode Aktif */
    .periode-box {
        margin-left: 40px;
        background-color: white;
        padding: 24px;
        text-align: center;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        font-family: sans-serif;
        margin-bottom: 20px;
    }

    .periode-title {
        font-size: 20px;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 6px;
    }

    .periode-date {
        font-size: 16px;
        color: #4b5563;
    }

    .periode-warning {
        font-size: 16px;
        color: #b91c1c;
        font-weight: 500;
        line-height: 1.6;
    }

    .periode-warning span {
        background-color: #fee2e2;
        padding: 2px 4px;
        border-radius: 4px;
    }

    /* GRID */
    .option-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
        margin: auto;
        padding: 10px 28px;
    }

    .option-card {
        padding: 10px;
        text-align: center;
    }

    .option-link {
        display: block;
        padding: 0;
        border-radius: 8px;
        text-decoration: none;
        color: black;
        transition: 0.2s ease-in-out;
    }

    .option-link:hover {
        opacity: 0.85;
    }

    .option-inner {
        padding: 20px;
        text-align: left;
        font-weight: 400;
        font-family: sans-serif;
        background-color: rgb(255, 255, 255);
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    .label-strong {
        font-weight: 600;
    }
</style>
@section('main-content')

<div class="">

    <div class="header">
        <h1 style="padding-bottom: 70px;">Pilih Jenis Pengajuan</h1>
    </div>

    <!-- PERIODE AKTIF BOX -->
    <div class="periode-box">

        @if ($activePeriode !== null)
            <h2 class="periode-title">
                Periode Aktif: {{ $activePeriode->name }}
            </h2>

            <p class="periode-date">
                {{ Carbon::parse($activePeriode->date_start)->translatedFormat('d F Y') }}
                –
                {{ Carbon::parse($activePeriode->date_end)->translatedFormat('d F Y') }}
            </p>

        @else
            <p class="periode-warning">
                Tidak ada <u>periode pengajuan</u> yang aktif.<br>
                Silakan <span>hubungi staff kepegawaian</span>.<br>
                <i>Periode pengajuan hanya dapat dibuat oleh <u>staff kepegawaian</u>.</i>
            </p>
        @endif

    </div>

    <!-- GRID OPSI -->
    <div class="option-grid">

        @foreach ($options as $index => $option)
            @php
                $colors = ['green', 'blue'];
                $bg = $colors[floor($index / 4) % count($colors)];
                $bgColor = ($bg === 'green') ? '#4ade80' : '#60a5fa'; 
            @endphp

            <div class="option-card">

                <a href="{{ $activePeriode ? route('form', ['id' => $option->id]) : '#' }}"
                    class="option-link"
                    style="background-color: {{ $bgColor }}; cursor: {{ $activePeriode ? 'pointer' : 'not-allowed' }};"
                >

                    <div class="option-inner">
                        <div>Rumpun : <span class="label-strong">{{ $option->rumpun }}</span></div>
                        <div>Usulan : <span class="label-strong">{{ $option->usul }}</span></div>
                    </div>

                </a>

            </div>

        @endforeach

    </div>

</div>

@endsection

