@extends('Kepegawaian.Components.sidebar')
@section('main-content')


        <div class="header">
            <h1>List Usul Kenaikan Jabatan</h1>
        </div>
        <div style="padding: 0 28px; ">

            <div style="color: #333; background-color: white; border-radius: 8px; padding: 10px 10px; width:100%;">
                <table style="width:100%; border-collapse: collapse; border-top-left-radius: 10px; border-top-right-radius: 10px; overflow: hidden;">
                    <thead>
                        <tr style="background-color:rgb(160, 255, 255);">
                            <th align="left" style="padding: 12px 6px">No</th>
                            <th>Dosen</th>
                            <th>Rumpun</th>
                            <th>Usul</th>
                            <th>Status</th>
                            <th>Tahap</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengajuans as $i => $pengajuan)    
                        <tr style="background-color: {{ $i % 2 == 0 ? '#ffffff' : '#dddddd' }};">
                                <td align="left" style="padding: 6px 6px">{{ $i+1 }}</td>
                                <td align="center">{{ $pengajuan->getUser->name }}</td>
                                <td align="center">
                                    <div style="border-radius: 10px; font-weight: bold; padding: 4px 0; 
                                        background-color: {{ $pengajuan->getFormPengajuan->rumpun == 'AGAMA' ? '#ffebcc' : '#e7f1ff' }}; 
                                        color: {{ $pengajuan->getFormPengajuan->rumpun == 'AGAMA' ? '#d35400' : '#007bff' }};">
                                        {{ $pengajuan->getFormPengajuan->rumpun }}
                                    </div>
                                </td>

                                <td align="center">
                                    <div style="border-radius: 10px; font-style: italic; padding: 4px 0; color: white; 
                                        background-color: 
                                            {{ $pengajuan->getFormPengajuan->usul == 'ASISTEN_AHLI' ? '#6f42c1' : 
                                            ($pengajuan->getFormPengajuan->usul == 'LEKTOR' ? '#007bff' : 
                                            ($pengajuan->getFormPengajuan->usul == 'LEKTOR_KEPALA' ? '#17a2b8' : 
                                            ($pengajuan->getFormPengajuan->usul == 'GURU_BESAR' ? '#dc3545' : '#f8f9fa'))) }};">
                                        {{ $pengajuan->getFormPengajuan->usul }}
                                    </div>
                                </td>

                                <td align="center">
                                    <div style="padding: 4px 0; font-weight: bold; color: white; border-radius: 5px; 
                                        background-color: 
                                            {{ $pengajuan->status == 'DRAFT' ? '#6c757d' : 
                                            ($pengajuan->status == 'BARU' ? '#007bff' : 
                                            ($pengajuan->status == 'DALAM_PROSES' ? '#17a2b8' : 
                                            ($pengajuan->status == 'DISETUJUI' ? '#28a745' : 
                                            ($pengajuan->status == 'DITOLAK' ? '#dc3545' : 
                                            ($pengajuan->status == 'REVISI' ? '#ffc107' : '#6c757d'))))) }};">
                                        {{ $pengajuan->status }}
                                    </div>
                                </td>
                                <td align="center">{{ $pengajuan->tahap }}</td>
                                <td align="center" style="padding: 6px 0;">
                                    @if ($pengajuan->tahap == 'VERIFIKASI_BERKAS')
                                        <a class="icon-button" style="--btn-bg: green;" href="{{ route('pengajuan.review', ['id' => $pengajuan->id]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m0-3-3-3m0 0-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75" />
                                            </svg>
                                        </a>
                                    @elseif ($pengajuan->tahap == 'PENGAJUAN_SISTER')
                                        <a class="icon-button" style="--btn-bg: skyblue;" href="{{ route('pengajuan.sister', ['id' => $pengajuan->id]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                            </svg>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>

@endsection