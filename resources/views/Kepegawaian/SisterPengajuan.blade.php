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


    <div style="margin-left: 40px;">
        <div style="
            background-color: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            max-width: 600px;
            margin: 20px auto;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            font-family: sans-serif;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        ">
            <!-- Icon -->
            <div style="
                background-color:rgb(255, 196, 0);
                padding: 12px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
            ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                </svg>

            </div>

            <!-- Nama File -->
            <div style="flex-grow: 1;">
                <p style="margin: 0; font-weight: 600; color: #1f2937;">Pengajuan-{{ $pengajuan->getUser->email }}.zip</p>
                <p style="margin: 0; font-size: 14px; color: #6b7280;">Ukuran: 5.3 MB</p>
            </div>

            <!-- Tombol Download -->
            <a href="{{ route('download.pengajuan', ['id_pengajuan' => $pengajuan->id]) }}" download style="
                background: linear-gradient(to right, #3b82f6, #06b6d4);
                padding: 10px 16px;
                border-radius: 8px;
                color: white;
                font-weight: bold;
                font-size: 14px;
                text-decoration: none;
                transition: background 0.3s ease;
            "
            onmouseover="this.style.opacity='0.9'"
            onmouseout="this.style.opacity='1'"
            >
                ⬇ Unduh
            </a>
        </div>

    </div>

    <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap; font-family: sans-serif; margin: 20px;">
        <!-- Kotak 1 -->
        <div style="background-color: white; padding: 16px 24px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06); white-space: nowrap; font-weight: 500;">
            <div style="margin-top: 16px; background-color:rgb(245, 255, 245); border-radius: 8px; padding: 14px 14px; border: 1px solid oklch(70.7% 0.022 261.325)">
                <div class="space-x-3" style="font-weight: bold; margin-bottom: 5px; display: flex; align-items: center;">
                    <div>
                        Berkas Pengajuan Dosen
                    </div>
                    <button class="action-button" type="button" id="accordion-button" onclick="toggleAccordionPengajuan()">
                        <span>
                            Expand
                        </span>    
                        <svg id="berkas-accordion-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 18px; height: 18px; margin-left: 6px;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 5.25 7.5 7.5 7.5-7.5m-15 6 7.5 7.5 7.5-7.5" />
                        </svg>
                    </button>
                </div>
            </div>
            <div id="accordion-content" style="padding: 6px; background-color: #fff; border-radius: 8px; display: none;">
                 <div id="accordion-container">
                    @foreach ( $pengajuan->getFormPengajuan->getFormPengajuanDetails()->orderBy('order', 'ASC')->get() as $key )
                        @php
                        $column = $key->key;    
                        @endphp
                        <div style="margin-bottom: 6px;">
                            <button class="action-button" onclick="show('/{{ $pengajuan->$column }}', 'Berkas {{ $key->title }}')">
                                {{ $key->title }}
                            </button>
                        </div>
                    @endforeach
                 </div>
            </div>
        </div>

        <!-- Kotak 2 -->
        <div style="background-color: white; padding: 16px 24px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06); white-space: nowrap; font-weight: 500;">
            <div style="margin-top: 16px; background-color:rgb(245, 255, 245); border-radius: 8px; padding: 14px 14px; border: 1px solid oklch(70.7% 0.022 261.325)">
                <div class="space-x-3" style="font-weight: bold; margin-bottom: 5px; display: flex; align-items: center;">
                    <div>
                        Berkas Sidang Komite
                    </div>
                    <button class="action-button" type="button" onclick="show('/{{ $pengajuan->sidangKomiteTerakhir->berita_acara }}', 'Berkas Sidang Komite')">
                        <span>
                            View
                        </span>    
                        <svg style="margin-left: 3px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Kotak 3 -->
        <div style="background-color: white; padding: 16px 24px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06); white-space: nowrap;font-weight: 500;">
            <div style="margin-top: 16px; background-color:rgb(245, 255, 245); border-radius: 8px; padding: 14px 14px; border: 1px solid oklch(70.7% 0.022 261.325)">
                <div class="space-x-3" style="font-weight: bold; margin-bottom: 5px; display: flex; align-items: center;">
                    <div>
                        Berkas Sidang Senat
                    </div>
                    <button class="action-button" type="button" onclick="show('/{{ $pengajuan->sidangKomiteTerakhir->berita_acara }}', 'Berkas Sidang Senat')">
                        <span>
                            View
                        </span>    
                        <svg style="margin-left: 3px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>


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

<script>
    function toggleAccordionPengajuan() {
        var content = document.getElementById("accordion-content");
        var icon = document.getElementById("berkas-accordion-icon");
        var container = document.getElementById("accordion-container");

        if (content.style.display === "none" || content.style.display === "") {
            content.style.display = "block";
            icon.style.transform = "rotate(180deg)";
        } else {
            content.style.display = "none";
            icon.style.transform = "rotate(0deg)";
        }
        
    }

    function iframeSrc(id, valueSrc) {
        
        
    }
</script>

@endsection