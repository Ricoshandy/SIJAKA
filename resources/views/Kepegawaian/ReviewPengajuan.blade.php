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

    <form method="POST" action="{{ route('action.review', ['pengajuanId' => $pengajuan->id]) }}" style="padding: 0 20px; margin-left: 40px;">
        @csrf
        <div style="display: grid; grid-template-columns: repeat(1, 1fr); width: 100%;">
            @foreach ($pengajuan->getFormPengajuan->getFormPengajuanDetails()->orderBy('order', 'ASC')->get() as $key)
                
                @php
                $column = $key->key;    
                @endphp

            <div style="margin-top: 16px; background-color:rgb(245, 255, 245); border-radius: 8px; padding: 14px 14px; border: 1px solid oklch(70.7% 0.022 261.325)">
                
                <div class="space-x-3" style="font-weight: bold; margin-bottom: 5px; display: flex; align-items: center;">
                    <div>
                        {{ $key->title }} 
                    </div>
                    <button class="action-button" type="button" id="accordion-{{ $pengajuan->$column }}-button" onclick="toggleAccordion('accordion-{{ $pengajuan->$column }}', '/{{$pengajuan->$column}}')">
                        <span>
                            Expand
                        </span>    
                        <svg id="accordion-{{ $pengajuan->$column }}-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 18px; height: 18px; margin-left: 6px;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 5.25 7.5 7.5 7.5-7.5m-15 6 7.5 7.5 7.5-7.5" />
                        </svg>
                    </button>
                    <a href="/{{$pengajuan->$column}}" target="_blank" class="action-button" style="--btn-bg: green;"   >
                        <span>
                            Open In New Tab
                        </span>    
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 18px; height: 18px; margin-left: 6px;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                        </svg>
                    </a>
                </div>

            </div>

            <div style="padding: 5px; background-color: #fff; border-radius: 8px; display: flex;">
                <div style="background-color: lightgray; border-radius: 6px; margin-left: 10px; padding: 3px 6px; display: flex; align-items: center;">
                    <label style="cursor: pointer; padding: 6px;" for="form-{{ $pengajuan->$column }}-verifikasi">Verifikasi</label>
                    <input type="radio" name="{{ $key->key }}" id="form-{{ $pengajuan->$column }}-verifikasi" value="diverifikasi" style="cursor: pointer; accent-color: blue;" required>
                </div>
                <div style="background-color: lightgray; border-radius: 6px; margin-left: 10px; padding: 3px 6px; display: flex; align-items: center;">
                    <label style="cursor: pointer; padding: 6px;" for="form-{{ $pengajuan->$column }}-revisi">Revisi</label>
                    <input type="radio" name="{{ $key->key }}" id="form-{{ $pengajuan->$column }}-revisi" value="revisi" style="cursor: pointer; accent-color: red;" required>
                </div>
                <div style="background-color: lightgray; border-radius: 6px; margin-left: 10px; padding: 3px 6px; display: flex; align-items: center;">
                    <label style="cursor: pointer; padding: 6px;" for="{{ $pengajuan->$column }}-keterangan">Keterangan</label>
                    <input style="border-radius: 5px; padding: 4px;" type="text" name="{{ $key->key }}-keterangan" id="form-{{ $pengajuan->$column }}-keterangan">
                </div>
            </div>

            <div id="accordion-{{ $pengajuan->$column }}-content" style="padding: 6px; background-color: #666; border-radius: 8px; display: none;">
                 <iframe id="accordion-{{ $pengajuan->$column }}-container" src="" frameborder="0" width="100%" style="height: 80vh;" ></iframe>
            </div>

            @endforeach

            <div style="display: flex; justify-content: center; margin-bottom: 16px; margin-top: 16px;">
                <button style="padding: 10px; background-color: green; font-weight: 600; color: white;">
                    Submit Review Berkas
                </button>
            </div>
        </div>


    </form>

<script>
    function toggleAccordion(id, value) {
        var content = document.getElementById(id + "-content");
        var icon = document.getElementById(id + "-icon");
        var container = document.getElementById(id + "-container");

        if (content.style.display === "none" || content.style.display === "") {
            content.style.display = "block";
            icon.style.transform = "rotate(180deg)";
        } else {
            content.style.display = "none";
            icon.style.transform = "rotate(0deg)";
        }

        if (container.src !== window.location.origin + value) {
            container.src = value;
            console.log('getting src .....');
        } else {
            console.log('not getting src');
        }
        
    }

    function iframeSrc(id, valueSrc) {
        
        
    }
</script>

@endsection