@php use Carbon\Carbon; @endphp
@extends('Kepegawaian.Components.sidebar')
@section('main-content')


        <div class="header">
            <h1>List Periode Pengajuan</h1>
        </div>
        <div style="padding: 0 28px; ">

            <div style="color: #333; background-color: white; border-radius: 8px; padding: 10px 10px; width:100%;">
                
                <div onclick="document.getElementById('modal').style.display='flex'" style="display:flex; justify-content: end; margin-bottom: 16px; margin-top: 8px;">
                    <button class="action-button">+ Tambah Periode Baru</button>
                </div>

                <table style="width:100%; border-collapse: collapse; border-top-left-radius: 10px; border-top-right-radius: 10px; overflow: hidden;">
                    <thead>
                        <tr style="background-color:rgb(160, 255, 255);">
                            <th align="left" style="padding: 12px 6px">No</th>
                            <th>Label</th>
                            <th>Periode Dimulai</th>
                            <th>Periode Berakhir</th>
                            <th>Status Periode</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($periodes as $i => $period)    
                        <tr style="background-color: {{ $i % 2 == 0 ? '#ffffff' : '#dddddd' }};">
                            <td align="left" style="padding: 6px 6px">{{ $i+1 }}</td>

                            <td align="center">{{ $period->name }}</td>

                            <td align="center">
                                <div style="border-radius: 10px; font-style: italic; padding: 4px 0; color: white; background-color:rgb(72, 156, 240);">
                                    {{ \Carbon\Carbon::parse($period->date_start)->translatedFormat('d F Y') }}
                                </div>
                            </td>

                            <td align="center">
                                <div style="padding: 4px 0; font-weight: bold; color: white; border-radius: 5px; background-color: rgb(40, 115, 190)">
                                    {{ \Carbon\Carbon::parse($period->date_end)->translatedFormat('d F Y') }}
                                </div>
                            </td>

                            <td align="center">
                                @php
                                    $now = Carbon::now();
                                    $start = Carbon::parse($period->date_start);
                                    $end = Carbon::parse($period->date_end);
                                    $status = '';
                                    $bgColor = '';
                                    if ($now->between($start, $end)) {
                                        $status = 'Aktif';
                                        $bgColor = 'green'; // Amber
                                    } elseif ($now->lt($start)) {
                                        $status = 'Belum Dimulai';
                                        $bgColor = '#3b82f6'; // Blue
                                    } else {
                                        $status = 'Berakhir';
                                        $bgColor = '#ef4444'; // Red
                                    }
                                @endphp
                                <div style="padding: 4px 8px; font-weight: bold; width: fit-content; color: white; border-radius: 5px; background-color: {{ $bgColor }};">
                                    {{ $status }}
                                </div>
                            </td>

                            <td align="center" style="padding: 6px 0; display: flex; justify-content: center;">
                                <div>
                                    <button onclick="document.getElementById('modal-{{ $period->id }}').style.display='flex'" class="icon-button" style="--btn-bg: green;" href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </button>
                                </div>

                                <div style="margin-left: 6px;">
                                    <button onclick="document.getElementById('delete-modal-{{ $period->id }}').style.display='flex'" class="icon-button" style="--btn-bg: red;" href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </div>
                                
                            </td>

                        </tr>



<div id="modal-{{ $period->id }}" style="position: fixed; width: 100vw; height: 100vh; background-color: rgba(0, 0, 0, 0.35); z-index: 999; top: 0; left: 0; display: none; align-items: center; justify-content: center;">
    <div style="background-color: white; border-radius: 10px; padding: 20px; max-width: 500px; width: 90%; box-shadow: 0 4px 12px rgba(0,0,0,0.2); position: relative;">
        
        <button onclick="this.parentElement.parentElement.style.display='none'" style="position: absolute; top: 10px; right: 10px; background: none; border: none; font-size: 18px; font-weight: bold; cursor: pointer;">&times;</button>
        
        <h2 style="margin-top: 0;">Edit Periode {{ $period->name }}</h2>
        <form method="POST" action="{{ route('periode.edit', ['id' => $period->id]) }}">
            @csrf

            <div style="margin-bottom: 1rem;">
            <label for="name" style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.25rem;">Name of Period</label>
            <input value="{{ $period->name }}" type="text" id="name" name="name" placeholder="Enter name of period"
                    style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.375rem; font-size: 1rem;" />
            </div>

            <div style="margin-bottom: 1rem;">
            <label for="date_start" style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.25rem;">Start Date</label>
            <input value="{{ $period->date_start }}" type="date" id="date_start" name="date_start"
                    style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.375rem; font-size: 1rem;" />
            </div>

            <div style="margin-bottom: 1.5rem;">
            <label for="date_end" style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.25rem;">End Date</label>
            <input value="{{ $period->date_end }}" type="date" id="date_end" name="date_end"
                    style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.375rem; font-size: 1rem;" />
            </div>

            <button type="submit" 
                    style="width: 100%; padding: 0.5rem; background-color: #10b981; color: white; border: none; border-radius: 0.375rem; font-weight: 600; cursor: pointer;">
            Submit Perubahan
            </button>

        </form>
        <button onclick="this.parentElement.parentElement.style.display='none'" style="margin-top: 20px; padding: 8px 16px; background-color:rgb(255, 0, 0); color: white; border: none; border-radius: 6px; cursor: pointer;">Batal</button>

    </div>

</div>

<div id="delete-modal-{{ $period->id }}" style="position: fixed; width: 100vw; height: 100vh; background-color: rgba(0, 0, 0, 0.35); z-index: 999; top: 0; left: 0; display: none; align-items: center; justify-content: center;">
    <div style="background-color: white; border-radius: 10px; padding: 20px; max-width: 500px; width: 90%; box-shadow: 0 4px 12px rgba(0,0,0,0.2); position: relative;">
        
        <button onclick="this.parentElement.parentElement.style.display='none'" style="position: absolute; top: 10px; right: 10px; background: none; border: none; font-size: 18px; font-weight: bold; cursor: pointer;">&times;</button>
        
        <h2 style="margin-top: 0;">Hapus Periode {{ $period->name }} ?</h2>
        
        <div style="display: flex; justify-content: space-around; align-items: center;">
            
            <div>
                <a href="{{ route('periode.delete', ['id' => $period->id]) }}" 
                    style="width: 100%; padding: 0.5rem; background-color: #10b981; color: white; border: none; border-radius: 0.375rem; font-weight: 600; cursor: pointer;">
                    Hapus Periode Ini
                </a>
            </div>
            
            <button onclick="this.parentElement.parentElement.style.display='none'" style="margin-top: 20px; padding: 8px 16px; background-color:rgb(255, 0, 0); color: white; border: none; border-radius: 6px; cursor: pointer;">Batal</button>
        </div>

    </div>

</div>


                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>

@endsection


<div id="modal" style="position: fixed; width: 100vw; height: 100vh; background-color: rgba(0, 0, 0, 0.35); z-index: 999; top: 0; left: 0; display: none; align-items: center; justify-content: center;">
    <div style="background-color: white; border-radius: 10px; padding: 20px; max-width: 500px; width: 90%; box-shadow: 0 4px 12px rgba(0,0,0,0.2); position: relative;">
        
        <button onclick="this.parentElement.parentElement.style.display='none'" style="position: absolute; top: 10px; right: 10px; background: none; border: none; font-size: 18px; font-weight: bold; cursor: pointer;">&times;</button>
        
        <h2 style="margin-top: 0;">Add Periode of Submission</h2>
        <form method="POST" action="{{ route('periode.add') }}">
            @csrf

            <div style="margin-bottom: 1rem;">
            <label for="name" style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.25rem;">Name of Period</label>
            <input type="text" id="name" name="name" placeholder="Enter name of period"
                    style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.375rem; font-size: 1rem;" />
            </div>

            <div style="margin-bottom: 1rem;">
            <label for="date_start" style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.25rem;">Start Date</label>
            <input type="date" id="date_start" name="date_start"
                    style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.375rem; font-size: 1rem;" />
            </div>

            <div style="margin-bottom: 1.5rem;">
            <label for="date_end" style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.25rem;">End Date</label>
            <input type="date" id="date_end" name="date_end"
                    style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.375rem; font-size: 1rem;" />
            </div>

            <button type="submit" 
                    style="width: 100%; padding: 0.5rem; background-color: #10b981; color: white; border: none; border-radius: 0.375rem; font-weight: 600; cursor: pointer;">
            Submit
            </button>

        </form>
        <button onclick="this.parentElement.parentElement.style.display='none'" style="margin-top: 20px; padding: 8px 16px; background-color:rgb(255, 0, 0); color: white; border: none; border-radius: 6px; cursor: pointer;">Batal</button>

    </div>

</div>