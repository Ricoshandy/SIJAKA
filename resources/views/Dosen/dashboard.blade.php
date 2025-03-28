<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        <div class="stats">
            
            @if (session('success'))
                <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 10px;">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 10px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="stat-box">
                <h3>Dosen</h3>
                <p>3031</p>
            </div>
            <div class="stat-box">
                <h3>Total Pengajuan</h3>
                <p>{{ Auth::user()->getPengajuans()->count() }}</p>
            </div>
            <div class="stat-box">
                <h3>Di Tolak</h3>
                <p>120</p>
            </div>
            <div class="stat-box">
                <h3>Di Terima</h3>
                <p>46</p>
            </div>
        </div>
    </div>
</body>
</html>