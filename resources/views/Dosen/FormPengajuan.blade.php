@extends('Dosen.Components.sidebar')
@section('main-content')

    <div class="header">
        <h1>Form Usul Kenaikan Jabatan</h1>
    </div>
        <div style="margin-left: 40px;">
            <p style="text-align: left; font-size: 16px; color: #333; background-color: white; border-radius: 8px; padding: 10px 10px;">Pengajuan dapat disimpan terlebih dahulu tanpa harus melengkapi semua form</p>

            <div style="
                background-color: white;
                padding: 24px;
                text-align: center;
                border-radius: 12px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
                font-family: sans-serif;
                margin-bottom: 20px;
            ">
                @if ($activePeriode !== null)
                    <h2 style="font-size: 20px; font-weight: 700; color: #1f2937; margin-bottom: 6px;">
                        Periode Aktif: {{ $activePeriode->name }}
                    </h2>
                    <p style="font-size: 16px; color: #4b5563;">
                        {{ \Carbon\Carbon::parse($activePeriode->date_start)->translatedFormat('d F Y') }}
                        &nbsp;–&nbsp;
                        {{ \Carbon\Carbon::parse($activePeriode->date_end)->translatedFormat('d F Y') }}
                    </p>
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; width: 100%;">
                        <h1 style="text-align: left; font-size: 18px; color: #333; background-color:rgb(136, 239, 255); border-radius: 8px; padding: 10px 10px;">Rumpun: {{ $form->rumpun }}</h1>
                        <h1 style="text-align: left; font-size: 18px; color: #333; background-color:rgb(190, 245, 255); border-radius: 8px; padding: 10px 10px;">Usulan: Ke {{ $form->usul }}</h1>
                    </div>
                @else
                    <p style="font-size: 16px; color: #b91c1c; font-weight: 500; line-height: 1.6;">
                        Tidak ada <span style="text-decoration: underline;">periode pengajuan</span> yang aktif.<br>
                        Silakan <span style="background-color: #fee2e2; padding: 2px 4px; border-radius: 4px;">hubungi staff kepegawaian</span> untuk mengkonfirmasi periode pengajuan.<br>
                        <span style="font-style: italic;">Periode pengajuan hanya dapat dibuat oleh <u>staff kepegawaian</u>.</span>
                    </p>
                @endif
            </div>
            
            @php
                $formDetails = $form->getFormPengajuanDetails()->orderBy('order', 'ASC')->get();
            @endphp

            <form action="{{ route('pengajuan.submit', ['id' => $form->id]) }}" method="POST" enctype="multipart/form-data" style="max-width: 100%; margin-top: 20px;">
                @csrf
                <input type="text" style="display: none;" name="periode_id" value="{{ $activePeriode->id }}">

                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; width: 100%;">

                    @foreach ($formDetails as $detail)
                    <div class="file-upload-container" id="container-{{ $detail->key }}" style="margin-bottom: 16px; background-color:rgb(245, 255, 245); border-radius: 8px; padding: 14px 14px;">
                        <label for="{{ $detail->key }}" style="font-weight: bold; display: block; margin-bottom: 5px; border-bottom: 1px solid black;">
                            {{ $detail->title }}
                        </label>

                        @if (!empty($detail->description))
                            <p style="font-size: 14px; color: #666; margin-bottom: 5px;">
                                {{ $detail->description }}
                            </p>
                        @endif

                        <input type="file" name="{{ $detail->key }}" id="{{ $detail->key }}" class="file-input" data-container="container-{{ $detail->key }}" 
                            style="padding: 9px 0; display: block; width: 100%; font-size: 18px; color: #111827;  border-radius: 8px 8px 0 0; cursor: pointer; background-color:rgba(249, 250, 251, 0);">
                    </div>
                    @endforeach

                </div>

                <div style="display: flex; justify-content: space-around; width: 100%;">

                    <button type="submit" style="background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">
                        Simpan Pengajuan
                    </button>

                    <button type="submit" name="pengajuan" value="true" style="background-color:rgb(14, 121, 0); color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">
                        Simpan dan Ajukan Kenaikan Jabatan
                    </button>
                </div>

            </form>
        </div>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".file-input").forEach(input => {
                input.addEventListener("change", function () {
                    let containerId = this.getAttribute("data-container");
                    let container = document.getElementById(containerId);

                    if (this.files.length > 0) {
                        container.style.backgroundColor = "lightgreen";
                    } else {
                        container.style.backgroundColor = "rgb(245, 255, 245)";
                    }
                });
            });
        });
    </script>

@endsection