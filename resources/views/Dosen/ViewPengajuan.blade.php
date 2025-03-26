<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>From Pengajuan</title>
    <link rel="stylesheet" href="\css\style.css">
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="\image\Logo.png" alt="Logo">
        </div>
        <h2>Dosen</h2>
        <nav>
            <ul>
                <li>Dashboard</li>
                <li>
                    <a href="{{ route('pengajuan.form') }}">
                        Buat Pengajuan
                    </a>
                </li>
                <li>
                    <a href="{{ route('pengajuan.list') }}">
                        List Pengajuan
                    </a>
                </li>
                <li>Upload Berkas
                    <ul>
                        <li>Berkas Masuk</li>
                        <li>Berkas Keluar</li>
                    </ul>
                </li>
                <li>Tracking Dokumen</li>
            </ul>
        </nav>
    </div>
    <div class="main-content">
        <div class="header">
            <h1>Form Usul Kenaikan Jabatan</h1>
        </div>
        <div style="padding: 0 28px;">
            
            @if ($errors->any())
                <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 10px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h1 style="text-align: left; font-size: 24px; color: #333; background-color:rgb(136, 239, 255); border-radius: 8px; padding: 10px 10px;">Rumpun: {{ $pengajuan->getFormPengajuan->rumpun }}</h1>
            <h1 style="text-align: left; font-size: 24px; color: #333; background-color:rgb(190, 245, 255); border-radius: 8px; padding: 10px 10px;">Usulan: Ke {{ $pengajuan->getFormPengajuan->usul }}</h1>

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

    </div>


</body>
</html>