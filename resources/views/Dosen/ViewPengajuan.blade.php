@extends('Dosen.Components.sidebar')
@section('main-content')

    <div class="header">
        <h1>View Usul Kenaikan Jabatan</h1>
        <p style="text-align: left;">Pengajuan Oleh:</p>

        <div style="text-align: left; box-shadow: inset 3px 2px 15px rgba(0, 0, 0, 0.2); border-radius: 15px; width: fit-content; padding: 8px;">
            <div style="">
                <div style="display:flex; align-items: center;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="black" style="width: 46px; height: 46px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <div style="border-bottom: 1px solid black; padding: 3px">
                        <p style="margin: 2px 0; font-weight: 600; font-size: 14px; white-space: nowrap;">{{ $pengajuan->getUser->name }}</p>
                        <p style="margin: 2px 0; font-size: 12px; white-space: nowrap;">{{ $pengajuan->getUser->email }}</p>
                    </div>
                </div>
            </div>
            <div style="display: flex">
                <p style="text-align: left; font-size: 12px; color: #333; background-color:rgb(136, 239, 255); border-radius: 8px; padding: 6px; font-weight: 600;">Rumpun {{ $pengajuan->getFormPengajuan->rumpun }}</p>
                <p style="text-align: left; font-size: 12px; color: #333; background-color:rgb(190, 245, 255); border-radius: 8px; padding: 6px; font-weight: 600; margin-left: 4px;">Usulan Ke {{ $pengajuan->getFormPengajuan->usul }}</p>
            </div>
        </div>
    </div>
    
    <div style="padding: 0 28px;">


        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; width: 100%;">
            @foreach ($pengajuan->getFormPengajuan->getFormPengajuanDetails()->orderBy('order', 'ASC')->get() as $key)
            <div class="file-upload-container" style="margin-bottom: 16px; background-color:rgb(245, 255, 245); border-radius: 8px; padding: 14px 14px;">
                
                @php
                $column = $key->key;    
                @endphp

                <label style="font-weight: bold; display: block; margin-bottom: 5px;">
                    {{ $key->title }}
                </label>

                @if ($pengajuan->$column !== null)
                    <iframe src="/{{$pengajuan->$column}}" frameborder="0" width="100%" height="100%"></iframe>
                @else
                    <span style="color: red;">*Berkas Belum di Upload*</span>
                @endif

            </div>
            @endforeach
        </div>


    </div>

@endsection