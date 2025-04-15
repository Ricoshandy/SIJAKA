@php use Carbon\Carbon; @endphp
@extends('Dosen.Components.sidebar')
@section('main-content')

    <div class="">

    <div class="header">
        <h1>Pilih Jenis Pengajuan</h1>
    </div>


    <div style="
        margin-left: 40px;
        background-color: white;
        padding: 24px;
        text-align: center;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        font-family: sans-serif;
        margin-bottom: 20px;
    ">
        @if ($activePeriode !== null)
            <h2 style="font-size: 20px; font-weight: 700; color: #1f2937; margin-bottom: 6px;">
                Periode Aktif: {{ $activePeriode->name }}
            </h2>
            <p style="font-size: 16px; color: #4b5563;">
                {{ \Carbon\Carbon::parse($activePeriode->date_start)->translatedFormat('d F Y') }}
                &nbsp;–&nbsp;
                {{ \Carbon\Carbon::parse($activePeriode->date_end)->translatedFormat('d F Y') }}
            </p>
        @else
            <p style="font-size: 16px; color: #b91c1c; font-weight: 500; line-height: 1.6;">
                Tidak ada <span style="text-decoration: underline;">periode pengajuan</span> yang aktif.<br>
                Silakan <span style="background-color: #fee2e2; padding: 2px 4px; border-radius: 4px;">hubungi staff kepegawaian</span> untuk mengkonfirmasi periode pengajuan.<br>
                <span style="font-style: italic;">Periode pengajuan hanya dapat dibuat oleh <u>staff kepegawaian</u>.</span>
            </p>
        @endif
    </div>


        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin: auto; padding: 10px 28px;">
            @foreach ($options as $index => $option)
                @php
                    $colors = ['green', 'blue']; 
                    $color = $colors[floor($index / 4) % count($colors)];
                @endphp

                <div style="padding: 10px; text-align: center;">
                    <a href="{{ $activePeriode !== null ? route('form', ['id' => $option->id]) : '#' }}" class="action-button" style="--btn-bg: {{ $color }}; {{ $activePeriode !== null ? '' : 'cursor: not-allowed;' }}">
                        <div style="padding: 6px; text-align: left; font-weight: 400; font-family: sans-serif; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">

                            <div>Rumpun: <span style="font-weight: 600;">{{ $option->rumpun }}</span></div>
                            <div>Usulan: <span style="font-weight: 600;">{{ $option->usul }}</span></div>

                        </div>
                    </a>
                </div>
            @endforeach
            
        </div>

    </div>

@endsection