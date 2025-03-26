<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Pengajuan</title>
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
        <div style="padding: 0 28px; ">

            <div style="color: #333; background-color: white; border-radius: 8px; padding: 10px 10px; width:100%;">
                <table style="width:100%; border-collapse: collapse; border: 1px solid black;">
                    <thead>
                        <tr>
                            <th align="left" style="padding: 8px 0;">No</th>
                            <th>Id Pengajuan</th>
                            <th>Rumpun</th>
                            <th>Usul</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengajuans as $i => $pengajuan)    
                            <tr style="border: 1px solid black;">
                                <td align="left">{{ $i+1 }}</td>
                                <td align="center">{{ $pengajuan->id }}</td>
                                <td align="center">{{ $pengajuan->getFormPengajuan->rumpun }}</td>
                                <td align="center">{{ $pengajuan->getFormPengajuan->usul }}</td>
                                <td align="center">{{ $pengajuan->created_at }}</td>
                                <td align="center" style="padding: 6px 0;">
                                    <a href="{{ route('pengajuan.view', ['id' => $pengajuan->id]) }}">Lihat</a>
                                    <span> - </span>
                                    <a href="{{ route('pengajuan.edit', ['id' => $pengajuan->id]) }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>

    </div>

</body>
</html>