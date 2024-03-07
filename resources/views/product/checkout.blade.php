<?php $transactionArray = json_decode($transaction, true);

$snap_token = $transactionArray[0]; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    @vite(['resources/css/tailwind.css', 'resources/js/app.js', 'resources/css/app.css', 'resources/js/product.js'])

</head>

<body>
    @include('components/navbar')
    <div class="w-full h-screen px-16 py-4 fs-poppins">
        <p class="text-3xl fs-outfit">Detail Pemesanan</p>
        <p class="text-base text-gray-700 mb-4">Anda akan melakukan checkout <span
                class="text-blue-500">{{ $product->product_name }}</span>
        </p>
        <div class="grid grid-cols-2 gap-6">
            <div class="flex flex-col gap-6" style="">
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
                <form action="" method="post" class="gap-6">
                    @csrf
                    <div>
                        <label for="alamat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                            Pengiriman</label>
                        <textarea id="alamat" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                            placeholder="Jl. . . . . ." disabled>{{ auth()->user()->alamat }}</textarea>
                    </div>
                    <div class="relative z- my-4 grow">
                        <input type="text" id="text"
                            class="block w-full px-0 py-2 text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " name="email" value="{{ auth()->user()->email }}" required disabled />
                        <label for="text"
                            class="absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Email</label>
                    </div>
                    <div class="relative z- mt-4 grow">
                        <input type="text" id="text"
                            class="block w-full px-0 py-2 text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " name="no_telp" value="{{ auth()->user()->no_telp }}" required disabled />
                        <label for="text"
                            class="absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nomor
                            Telepon</label>
                    </div>
                </form>
                <p class="text-red-500 text-sm">*Jika ingin mengganti, ubah ini di pengaturan profil.</p>
            </div>
            <div class="">
                <div class="text-3xl fs-outfit mb-4">Detail Pembayaran</div>
                <div class="flex justify-between text-gray-700">
                    <p class="text-sm">Subtotal untuk Produk</p>
                    <p class="text-sm">Rp{{ $product->harga }}</p>
                </div>
                <div class="flex justify-between text-gray-700">
                    <p class="text-base">Total untuk Produk</p>
                    <p class="text-base text-blue-500">Rp{{ $product->harga }}</p>
                </div>
                <div class="flex justify-end mt-4">
                    <button
                        class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white"
                        id="pay-button">
                        <span
                            class="relative px-4 py-2 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0">
                            Bayar
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>


    @include('components/footer')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            // SnapToken acquired from previous step
            snap.pay('{{ $snap_token }}', {
                // Optional
                onSuccess: function(result) {
                    /* You may add your own js here, this is just example */
                    window.location.href =
                        "{{ route('transactionSuccess', ['transactionId' => $transactionId, 'productId' => $product->id]) }}";

                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        };
    </script>
</body>

</html>
