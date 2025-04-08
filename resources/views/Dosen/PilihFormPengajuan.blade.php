@extends('Dosen.Components.sidebar')
@section('main-content')

    <div class="">

    <div class="header">
        <h1>Pilih Jenis Pengajuan</h1>
    </div>

        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin: auto; padding: 10px 28px;">
            @foreach ($options as $index => $option)
                @php
                    $colors = ['green', 'blue']; 
                    $color = $colors[floor($index / 4) % count($colors)];
                @endphp

                <div style="padding: 10px; text-align: center;">
                    <a href="{{ route('form', ['id' => $option->id]) }}" style="display: block; text-decoration: none; color: white; background-color: {{ $color }}; padding: 10px 15px; border-radius: 5px; font-size: 16px; font-weight: 700;">
                        Rumpun {{ $option->rumpun }} - Ke {{ $option->usul }}
                    </a>
                </div>
            @endforeach
        </div>

    </div>

@endsection