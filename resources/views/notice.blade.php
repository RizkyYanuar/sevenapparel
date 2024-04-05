<?php

// Enkripsi parameter 'verify'
$encryptedVerify = md5(auth()->user()->id);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account Status</title>
    @vite(['resources/css/tailwind.css', 'resources/js/app.js', 'resources/css/app.css'])

</head>

<body>
    @include('components/navbar')
    @include('components/alerts')
    <div class="w-full h-screen p-16 fs-poppins flex justify-center items-center">
        <div class="w-[36rem] p-4">
            <p class="fs-outfit text-4xl">Status akun anda adalah {{ auth()->user()->status }}.</p>
            <p class="fs-outfit text-4xl">Role akun anda adalah {{ auth()->user()->roles }}.</p>
            <form action="/user/verifyemail" method="post" class="inline">
                @csrf
                <input type="hidden" name="emailRecipient" value="{{ auth()->user()->email }}">
                <input type="hidden" name="emailSubject" value="Verifikasi Akun SevenApparel">
                <input type="hidden" name="emailBody"
                    value='Hi! {{ auth()->user()->name }}, Terimakasih Telah mendaftar di Seven Apparel! <br>Mohon Verifikasi Akun anda.</br> <a href="http://localhost:8000/user/verifyaccount?verify={{ urlencode($encryptedVerify) }}" style="padding: 16px; display: block; background-color: blue; color:white;">Verifikasi akun</a>'>
                <p class="text-base">Klik <button type="submit"
                        class="text-blue-500 hover:text-blue-600 underline">disini</button>
                    untuk melakukan verifikasi akun.</p>
            </form>
            <p class="text-base">Tetap <a href="/home" class="text-blue-500 hover:text-blue-600 underline">masuk</a>
                dengan role guest.</p>
            <p class="text-sm italic text-end text-red-500">*atau hubungi admin untuk mengubah role anda.</p>
        </div>
    </div>
    @include('components/footer')
</body>

</html>
