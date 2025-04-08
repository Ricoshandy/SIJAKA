@if (session('success'))

<div style="position: fixed; width: 100vw; height: 100vh; background-color: rgba(0, 0, 0, 0.35); z-index: 999; top: 0; left: 0; display: flex; align-items: center; justify-content: center;">
    <div style="background-color: white; border-radius: 10px; padding: 20px; max-width: 500px; width: 90%; box-shadow: 0 4px 12px rgba(0,0,0,0.2); position: relative;">
        
        <button onclick="this.parentElement.parentElement.style.display='none'" style="position: absolute; top: 10px; right: 10px; background: none; border: none; font-size: 18px; font-weight: bold; cursor: pointer;">&times;</button>
        
        <h2 style="margin-top: 0;">Action Success!</h2>
        <p style="color: green;">{{ session('success') }}</p>
        <button onclick="this.parentElement.parentElement.style.display='none'" style="margin-top: 20px; padding: 8px 16px; background-color: #007bff; color: white; border: none; border-radius: 6px; cursor: pointer;">Tutup Notifikasi</button>

    </div>

</div>

@endif

@if ($errors->any())
<div style="position: fixed; width: 100vw; height: 100vh; background-color: rgba(0, 0, 0, 0.35); z-index: 999; top: 0; left: 0; display: flex; align-items: center; justify-content: center;">
    <div style="background-color: white; border-radius: 10px; padding: 20px; max-width: 500px; width: 90%; box-shadow: 0 4px 12px rgba(0,0,0,0.2); position: relative;">
        
        <button onclick="this.parentElement.parentElement.style.display='none'" style="position: absolute; top: 10px; right: 10px; background: none; border: none; font-size: 18px; font-weight: bold; cursor: pointer;">&times;</button>
        
        <h2 style="margin-top: 0;">Action Errors!</h2>
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button onclick="this.parentElement.parentElement.style.display='none'" style="margin-top: 20px; padding: 8px 16px; background-color: #007bff; color: white; border: none; border-radius: 6px; cursor: pointer;">Tutup Notifikasi</button>

    </div>

</div>
@endif