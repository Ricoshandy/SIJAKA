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
    
    <div style="margin-left: 40px">


        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; width: 100%;">
            @foreach ($pengajuan->getFormPengajuan->getFormPengajuanDetails()->orderBy('order', 'ASC')->get() as $key)
            <div class="file-upload-container" style="display:flex; align-items: center; background-color:rgb(245, 255, 245); border-radius: 8px; padding: 14px 14px;">
                
                @php
                $column = $key->key;    
                @endphp

                <label style="font-weight: bold; display: block; margin-bottom: 5px;">
                    {{ $key->title }}
                </label>

                @if ($pengajuan->$column !== null)
                    <button onclick="show('/{{$pengajuan->$column}}', '{{ $key->title }}')" class="icon-button" style="--btn-bg: green; margin-left: 8px;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </button>
                    <!-- <iframe src="/{{$pengajuan->$column}}" frameborder="0" width="100%" height="100%"></iframe> -->
                @else
                    <span style="color: red;">*Berkas Belum di Upload*</span>
                @endif

            </div>
            @endforeach
        </div>


    </div>

@endsection

<div id="modal" style="position: fixed; width: 100vw; height: 100vh; background-color: rgba(0, 0, 0, 0.35); z-index: 999; top: 0; left: 0; display: none; align-items: center; justify-content: center;">
    <div style="background-color: white; border-radius: 10px; padding: 20px; max-width: 500px; width: 90%; box-shadow: 0 4px 12px rgba(0,0,0,0.2); position: relative;">
        
        <button onclick="this.parentElement.parentElement.style.display='none'" style="position: absolute; top: 10px; right: 10px; background: none; border: none; font-size: 18px; font-weight: bold; cursor: pointer;">&times;</button>
        
        <h2 id="title" style="margin-top: 0;"></h2>
        <div>
            <iframe id="container" src="" width="100%" height="500px" frameborder="0"></iframe>
        </div>
        <button onclick="this.parentElement.parentElement.style.display='none'" style="margin-top: 20px; padding: 8px 16px; background-color:rgb(0, 60, 255); color: white; border: none; border-radius: 6px; cursor: pointer;">Tutup</button>

    </div>

</div>

<script>
    function show(value, title){
        document.getElementById('modal').style.display='flex';
        let container = document.getElementById("container");
        document.getElementById("title").innerText = "File " + title;
        if (container.src !== window.location.origin + value) {
            container.src = value;
            console.log('getting src .....');
        } else {
            console.log('not getting src');
        }
    }
</script>