<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Berhasil</title>
    @vite(['resources/css/tailwind.css', 'resources/js/app.js', 'resources/css/app.css'])

</head>

<body>
    @include('components/navbar')
    @include('components/alerts')
    <div class="w-full h-screen p-16 fs-poppins flex justify-center items-center">
        <div class="w-[36rem] bg-white p-4">
            <p class="text-4xl fs-outfit text-green-500">Verifikasi Berhasil</p>
            <p class="text-base">Setelah verifikasi, mohon untuk mengisi data anda di profil.</p>
            <p class="text-base">Anda akan diarahkan ke Beranda secara otomatis dalam <span id="seconds">5</span>
                detik.</p>
        </div>
    </div>
    @include('components/footer')


    <script>
        // Set waktu awal untuk hitung mundur (dalam detik)
        var countdown = 5;

        // Mulai hitung mundur dan update tampilan setiap 1 detik
        var timer = setInterval(function() {
            // Kurangi nilai hitung mundur
            countdown--;

            // Tampilkan nilai hitung mundur di HTML
            document.getElementById('seconds').innerText = countdown;

            // Hentikan hitung mundur jika sudah mencapai 0 detik
            if (countdown <= 0) {
                clearInterval(timer);
                window.location.href = '/home';
            }
        }, 1000);
    </script>

</body>

</html>
