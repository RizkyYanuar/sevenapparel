<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pembayaran Berhasil</title>
    @vite(['resources/css/tailwind.css', 'resources/js/app.js', 'resources/css/app.css', 'resources/js/product.js'])

</head>

<body>
    @include('components/navbar')
    <div class="w-full h-screen px-16 py-6 fs-poppins">
        <p class="text-3xl fs-outfit mb-4 text-green-500">
            Pembayaran Berhasil.
        </p>
        <div class="w-full grid grid-cols-2">
            <div class="flex flex-col gap-4">
                <p class="text-xl">Detail Pemesanan: </p>
                <div class="flex gap-4">
                    <div class="w-28">
                        <img src="{{ asset('storage/' . $product->product_image) }}" alt="" srcset=""
                            class="object-cover">
                    </div>
                    <div class="flex flex-col justify-end">
                        <p class="text-xl">{{ $product->product_name }}</p>
                        <p class="text-base">Rp. {{ $product->harga }}</p>
                    </div>
                </div>
                <p class="text-base">Alamat Pengiriman: <br>
                    {{ $transactionDetail->alamat }}</p>
                <p class="text-base">Penerima:
                    <br>
                    {{ $user->name }}
                </p>
                <p class="text-base">No. Telepon Penerima:
                    <br>
                    {{ $user->no_telp }}
                </p>
                <p class="text-base">Email Penerima:
                    <br>
                    {{ $user->email }}
                </p>
            </div>
            <div class="flex flex-col gap-4">
                <div class="flex justify-between">
                    <p class="text-base">Jumlah Pembayaran</p>
                    <p class="text-base">Rp{{ $transaction->harga }}</p>
                </div>
                <div class="flex justify-between">
                    <p class="text-xl">Status Pembayaran:
                    </p>
                    <p class="text-green-500 text-xl">
                        {{ $transaction->status }}
                    </p>
                </div>
                <div class="flex justify-between">
                    <p class="text-base">Kembali ke <a href="/home" class="underline text-blue-500">home</a></p>
                    <p class="text-base"><a href="/user/profile#transaction" class="underline text-blue-500">Lihat
                            Transaksi</a></p>
                </div>
            </div>
        </div>
    </div>
    @include('components/footer')
</body>

</html>
