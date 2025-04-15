@extends('Dosen.Components.sidebar')
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
                            <th>Id Pengajuan</th>
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
                                <td align="center">{{ $pengajuan->id }}</td>
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
                                <td align="center" class="space-x-3" style="padding: 6px 0; align-items: center; display: flex; width: fit-content">
                                    
                                    <a class="icon-button" style="--btn-bg: blue;" href="{{ route('pengajuan.view', ['id' => $pengajuan->id]) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </a>

                                    @if ($pengajuan->tahap == 'PERLU_DILENGKAPI')
                                        
                                        <a class="icon-button" style="--btn-bg: green;" href="{{ route('pengajuan.edit', ['id' => $pengajuan->id]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>
                                        
                                    @endif

                                    <a class="icon-button" style="--btn-bg: skyblue;" href="{{ route('pengajuan.progress', ['id' => $pengajuan->id]) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                    </a>

                                    @if ($pengajuan->tahap == 'SK_KENAIKAN' && $pengajuan->status == 'DISETUJUI')
                                        
                                        <a class="action-button" style="--btn-bg: green;" href="{{ route('sk.download', ['id_pengajuan' => $pengajuan->id]) }}">
                                            Download SK
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