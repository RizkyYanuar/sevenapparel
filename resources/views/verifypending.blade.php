<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Akun</title>
    @vite(['resources/css/tailwind.css', 'resources/js/app.js', 'resources/css/app.css'])

</head>

<body>
    @include('components/navbar')
    @include('components/alerts')
    <div class="w-full h-screen p-16 fs-poppins flex justify-center items-center">
        <div class="w-[36rem] bg-white p-4">
            <p class="text-4xl fs-outfit text-yellow-400">Email Verifikasi Telah Dikirim</p>
            <p class="text-base">Mohon cek email anda untuk memverifikasi.</p>
        </div>
    </div>
    @include('components/footer')
</body>

</html>
