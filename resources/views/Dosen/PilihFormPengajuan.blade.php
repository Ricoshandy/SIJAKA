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
            <h1>Sistem Informasi Kenaikan Jabatan Akademik Dosen</h1>
        </div>
        <div class="">

            <h1 style="text-align: center; font-size: 24px; color: #333;">Pilih Pengajuan</h1>

            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin: auto; padding: 10px 28px;">
                @foreach ($options as $index => $option)
                    @php
                        $colors = ['green', 'blue']; 
                        $color = $colors[floor($index / 4) % count($colors)];
                    @endphp

                    <div style="padding: 10px; text-align: center;">
                        <a href="{{ route('form', ['id' => $option->id]) }}" style="display: block; text-decoration: none; color: white; background-color: {{ $color }}; padding: 10px 15px; border-radius: 5px; font-size: 16px;">
                            Rumpun {{ $option->rumpun }} - Ke {{ $option->usul }}
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</body>
</html>