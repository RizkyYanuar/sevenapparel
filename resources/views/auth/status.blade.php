<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Status</title>
        @vite(['resources/css/tailwind.css', 'resources/js/app.js', 'resources/css/app.css'])
    </head>

    <body>
        <div class="w-screen h-screen bg-[#deeceb] flex justify-center items-center">
            <div class="status bg-white p-20 rounded-2xl fs-poppins">
                <p class="text-2xl">Status Akun anda adalah <span class="capitalize ">{{ auth()->user()->roles }}</span>
                </p>
                @if (auth()->user()->roles === 'guest')
                    <p class="text-sm italic text-gray-600">Hubungi admin agar menjadi user.</p>
                    <p class="text-base"><a href="{{ route('home') }}"
                            class="text-blue-600 hover:text-blue-700 underline">Tetap masuk</a> dengan role guest.</p>
                @endif
                @if (auth()->user()->user_image)
                    <p>Terdapat gambar cuyy!</p>
                @else
                    <img src="{{ asset('storage/userimg/defaultuser.jpg') }}" alt="">
                @endif
            </div>
        </div>
    </body>

</html>
