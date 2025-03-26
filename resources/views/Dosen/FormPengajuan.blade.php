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

            <h1 style="text-align: left; font-size: 24px; color: #333; background-color:rgb(136, 239, 255); border-radius: 8px; padding: 10px 10px;">Rumpun: {{ $form->rumpun }}</h1>
            <h1 style="text-align: left; font-size: 24px; color: #333; background-color:rgb(190, 245, 255); border-radius: 8px; padding: 10px 10px;">Usulan: Ke {{ $form->usul }}</h1>
            <p style="text-align: left; font-size: 16px; color: #333; background-color: white; border-radius: 8px; padding: 10px 10px;">Pengajuan dapat disimpan terlebih dahulu tanpa harus melengkapi semua form</p>

            @php
                $formDetails = $form->getFormPengajuanDetails;
            @endphp

            <form action="{{ route('pengajuan.submit', ['id' => $form->id]) }}" method="POST" enctype="multipart/form-data" style="max-width: 100%; margin-top: 20px;">
                @csrf

                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; width: 100%;">

                    @foreach ($formDetails as $detail)
                    <div class="file-upload-container" id="container-{{ $detail->key }}" style="margin-bottom: 16px; background-color:rgb(245, 255, 245); border-radius: 8px; padding: 14px 14px;">
                        <label for="{{ $detail->key }}" style="font-weight: bold; display: block; margin-bottom: 5px;">
                            {{ $detail->title }}
                        </label>

                        @if (!empty($detail->description))
                            <p style="font-size: 14px; color: #666; margin-bottom: 5px;">
                                {{ $detail->description }}
                            </p>
                        @endif

                        <input type="file" name="{{ $detail->key }}" id="{{ $detail->key }}" class="file-input" data-container="container-{{ $detail->key }}" 
                            style="padding: 6px 0; display: block; width: 100%; font-size: 18px; color: #111827; border: 1px solid #d1d5db; border-radius: 8px; cursor: pointer; background-color: #f9fafb;">
                    </div>
                    @endforeach

                </div>

                <button type="submit" style="background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">
                    Simpan Pengajuan
                </button>
            </form>
        </div>

    </div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".file-input").forEach(input => {
            input.addEventListener("change", function () {
                let containerId = this.getAttribute("data-container");
                let container = document.getElementById(containerId);

                if (this.files.length > 0) {
                    container.style.backgroundColor = "lightgreen"; // Warna hijau jika file dipilih
                } else {
                    container.style.backgroundColor = "rgb(245, 255, 245)"; // Warna default
                }
            });
        });
    });
</script>
</body>
</html>