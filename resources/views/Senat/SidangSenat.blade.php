@extends('Senat.Components.sidebar')
@section('main-content')

    <div class="header">
        <h1>SIDANG SENAT</h1>
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
    <form method="POST" action="{{ route('action.sidang.senat', ['pengajuanId' => $pengajuan->id]) }}" style="padding: 0 28px;" enctype="multipart/form-data">
        @csrf
        <div style="display: grid; grid-template-columns: repeat(1, 1fr); width: 100%;">
            
        <div style="padding: 16px; background-color:rgb(182, 244, 255);">
            <div>
                <label for="">Upload Berkas Sidang (Berita Acara)</label>
                <br>
                <br>
                <input type="file" name="berita_acara" id="" required>
                <input type="hidden" name="sidang" value="SENAT">
            </div>

            <div style="margin-top: 26px;">
                <div style="margin-bottom: 8px">Hasil Sidang</div>
                <div style="display: flex;">
                    <div style="padding: 6px; background-color:rgba(255, 255, 255, 0.75); border-radius: 8px;">
                        <label style="cursor: pointer;" for="lulus">LULUS</label>
                        <input style="cursor: pointer; accent-color: green;" type="radio" name="status" value="LULUS" id="lulus" required>
                    </div>
                    <!-- <div style="padding: 6px; background-color:rgba(255, 255, 255, 0.75); border-radius: 8px; margin-left: 8px;">
                        <label style="cursor: pointer;" for="revisi">LULUS DENGAN REVISI</label>
                        <input style="cursor: pointer; accent-color: yellow;" type="radio" name="status" value="REVISI" id="revisi">
                    </div> -->
                    <div style="padding: 6px; background-color:rgba(255, 255, 255, 0.75); border-radius: 8px; margin-left: 8px;">
                        <label style="cursor: pointer;" for="tidaklulus">TIDAK LULUS</label>
                        <input style="cursor: pointer; accent-color: red;" type="radio" name="status" value="TIDAK_LULUS" id="tidaklulus" required>
                    </div>
                </div>
            </div>
        </div>

            <div style="display: flex; justify-content: center; margin-bottom: 16px; margin-top: 16px;">
                <button style="padding: 10px; background-color: green; font-weight: 600; color: white;">
                    Submit Berkas Sidang
                </button>
            </div>
        </div>


    </form>

<script>
    function toggleAccordion(id) {
        var content = document.getElementById(id + "-content");
        var icon = document.getElementById(id + "-icon");

        if (content.style.display === "none" || content.style.display === "") {
            content.style.display = "block";
            icon.style.transform = "rotate(180deg)";
        } else {
            content.style.display = "none";
            icon.style.transform = "rotate(0deg)";
        }
    }
</script>

@endsection