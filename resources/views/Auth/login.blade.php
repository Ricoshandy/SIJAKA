<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    

<form 
    action="{{ route('login') }}"
    method="POST"
>

<!-- INI WAJIB ADA DI SETIAP FORM LARAVEL -->
    @csrf
<!-- --------------------------------------- -->

@if (session('error'))
    <div style="color: red;">
        {{ session('error') }}
    </div>
@endif

<div>
    <label for="email">Masukkan Email</label>
    <input type="email" name="email" id="email">
</div>

<div>
    <label for="password">Masukkan Password</label>
    <input type="password" name="password" id="password">
</div>

<div>
    <button type="submit">Login Sekarang</button>
</div>

</form>


</body>
</html>