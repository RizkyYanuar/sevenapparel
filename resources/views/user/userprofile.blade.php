<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    @vite(['resources/css/tailwind.css', 'resources/js/app.js', 'resources/css/app.css'])

</head>

<body>
    @include('components/navbar')
    @include('components/alerts')
    <div class="w-full bg-[#deeceb] px-16 py-8 grid grid-cols-2 fs-poppins gap-6">
        <div class="flex flex-col gap-4 bg-white rounded-lg p-8">
            <p class="text-4xl fs-outfit">Customize Your Profile</p>
            <form action="profile/{{ auth()->user()->id }}" method="post" enctype="multipart/form-data"
                class="w-full flex items-center">
                @csrf
                <input type="hidden" name="old_user_image"
                    value="{{ auth()->user()->user_image ? auth()->user()->user_image : 'userimg/defaultuser.png' }}">
                <div class="flex flex-col w-full gap-4">
                    <div>
                        <label for="product-name"
                            class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                            : </label>
                        <input type="text" id="product-name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Namaa..." name="name" value="{{ old('name', auth()->user()->name) }}">
                    </div>
                    <div>

                        <label class="block mb-2 text-base font-medium text-gray-900 dark:text-white"
                            for="product_image">Foto Profil: </label>
                        <input
                            class="block w-full text-base text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-[#deeceb] focus:outline-none"
                            id="product_image" type="file" name="user_image">
                    </div>
                    <div>
                        <label for="no_telp"
                            class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nomor Telepon:
                        </label>
                        <input type="number" id="no_telp" aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="+62...." name="no_telp" value="{{ old('no_telp', auth()->user()->no_telp) }}">
                    </div>
                    <div class="">
                        <label for="jenis_kelamin"
                            class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Jenis
                            Kelamin</label>
                        <select id="jenis_kelamin"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            name="jenis_kelamin">
                            <option {{ auth()->user()->jenis_kelamin === 'Belum Diketahui' ? 'selected' : '' }}
                                value="Belum Diketahui">Jenis
                                Kelamin</option>
                            <option value="Laki Laki"
                                {{ auth()->user()->jenis_kelamin === 'Laki Laki' ? 'selected' : '' }}>Laki Laki
                            </option>
                            <option value="Perempuan"
                                {{ auth()->user()->jenis_kelamin === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div>
                        <label for="alamat"
                            class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Alamat
                        </label>
                        <textarea id="alamat" rows="4"
                            class="block p-2.5 w-full text-base text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                            placeholder="Jl. . . . . ." name="alamat">{{ auth()->user()->alamat }}</textarea>
                    </div>
                    <button type="submit"
                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Simpan
                        Perubahan</button>
                </div>
            </form>
        </div>
        <div class="flex flex-col gap-4 bg-white rounded-lg p-8">
            <p class="text-4xl fs-outfit">Your Profile</p>
            <div class="flex flex-row gap-8 mb-3">
                <div class="w-32 h-32 rounded-full">
                    @if (auth()->user()->user_image)
                        <img src="{{ asset('storage/' . auth()->user()->user_image) }}" alt=""
                            class="w-32 h-32 rounded-full object-cover">
                    @else
                        <img src="{{ asset('storage/userimg/defaultuser.png') }}" alt=""
                            class="w-32 h-32 rounded-full object-cover">
                    @endif
                </div>
                <div class="flex flex-col justify-center">
                    <p class="text-2xl fs-outfit">
                        {{ auth()->user()->name }}
                    </p>
                    <p class="text-base text-gray-700 italic">
                        as {{ auth()->user()->roles }}.
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-2">
                <p class="flex text-base gap-x-20">Nama</p>
                <span class="text-gray-600">{{ auth()->user()->name }}</span>
            </div>
            <hr>
            <div class="grid grid-cols-2">
                <p class="flex text-base gap-x-20">Email</p>
                <span class="text-gray-600">{{ auth()->user()->email }}</span>
            </div>
            <hr>
            <div class="grid grid-cols-2">
                <p class="flex text-base gap-x-20">Nomor Telepon</p>
                <span class="text-gray-600">{{ auth()->user()->no_telp }}</span>
            </div>
            <hr>
            <div class="grid grid-cols-2">
                <p class="flex text-base gap-x-20">Jenis Kelamin</p>
                <span class="text-gray-600">{{ auth()->user()->jenis_kelamin }}</span>
            </div>
            <hr>
            <div class="grid grid-cols-2">
                <p class="flex text-base gap-x-20">Alamat</p>
                <span class="text-gray-600">{{ auth()->user()->alamat }}</span>
            </div>
            <hr>
            <div class="grid grid-cols-2">
                <p class="flex text-base gap-x-20">Role</p>
                <span class="text-gray-600">{{ auth()->user()->roles }}</span>
            </div>
            <hr>
        </div>
    </div>
    <div class="w-full bg-[#deeceb] px-16 fs-poppins">
        <div class="bg-white rounded-lg p-8">
            <p class="text-4xl fs-outfit mb-4" id="transaction">
                List Transaksi Anda
            </p>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-sm text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Produk
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total Pembelian
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $loop->iteration }}
                                </th>
                                <th class="px-6 py-4">
                                    {{ $transaction->product->product_name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $transaction->harga }}
                                </td>
                                <td class="px-6 py-4 capitalize">
                                    @if ($transaction->status === 'pending')
                                        <p class="text-base capitalize text-yellow-300">
                                            {{ $transaction->status }}
                                        </p>
                                    @else
                                        <p class="text-base capitalize text-green-500">
                                            {{ $transaction->status }}
                                        </p>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <p class="font-medium text-blue-600 hover:underline hover:cursor-pointer"
                                        data-modal-target="transaction-modal-{{ $transaction->id }}"
                                        data-modal-toggle="transaction-modal-{{ $transaction->id }}">Detail</p>
                                </td>
                            </tr>
                            <div id="transaction-modal-{{ $transaction->id }}" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-2xl max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                            Detail Transaksi
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                data-modal-hide="transaction-modal-{{ $transaction->id }}">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-4 md:p-5 space-y-4">
                                            <div class="flex justify-between">
                                                <p class="text-base text-gray-800">No. Transaksi:</p>
                                                <p class="text-base">{{ $loop->iteration }}</p>
                                            </div>
                                            <div class="flex justify-between">
                                                <p class="text-base text-gray-800">Produk:</p>
                                                <p class="text-base">{{ $transaction->product->product_name }}</p>
                                            </div>
                                            <div class="flex justify-between">
                                                <p class="text-base text-gray-800">Alamat Pengiriman:</p>
                                                <p class="text-base">{{ $transaction->detail->alamat }}</p>
                                            </div>
                                            <div class="flex justify-between">
                                                <p class="text-base text-gray-800">No. Telepon Penerima:</p>
                                                <p class="text-base">{{ $transaction->detail->no_telp }}</p>
                                            </div>
                                            <div class="flex justify-between">
                                                <p class="text-base text-gray-800">Email Penerima:</p>
                                                <p class="text-base">{{ $transaction->detail->email }}</p>
                                            </div>
                                            <div class="flex justify-between">
                                                <p class="text-base text-gray-800">Waktu Transaksi:</p>
                                                <p class="text-base">
                                                    {{ strftime('%e %B %Y, %H:%M', strtotime($transaction->created_at)) }}
                                                </p>
                                            </div>
                                            <div class="flex justify-between">
                                                <p class="text-base text-gray-800">Total Pembelian:</p>
                                                <p class="text-base">{{ $transaction->harga }}</p>
                                            </div>
                                            <div class="flex justify-between">
                                                <p class="text-base text-gray-800">Status Transaksi:</p>
                                                @if ($transaction->status === 'pending')
                                                    <p class="text-base capitalize text-yellow-300">
                                                        {{ $transaction->status }}
                                                    </p>
                                                @else
                                                    <p class="text-base capitalize text-green-500">
                                                        {{ $transaction->status }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                                            <button data-modal-hide="transaction-modal-{{ $transaction->id }}"
                                                type="button"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Konfirmasi</button>
                                            @if ($transaction->status === 'pending')
                                                <button
                                                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ms-4"
                                                    id="pay-button-{{ $transaction->id }}">
                                                    Bayar
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}">
                            </script>
                            <script type="text/javascript">
                                document.getElementById('pay-button-{{ $transaction->id }}').onclick = function() {
                                    // SnapToken acquired from previous step
                                    snap.pay('{{ $transaction->snap_token }}', {
                                        // Optional
                                        onSuccess: function(result) {
                                            /* You may add your own js here, this is just example */
                                            window.location.href =
                                                "{{ route('transactionSuccess', ['transactionId' => $transaction->id, 'productId' => $transaction->product->id]) }}";

                                        },
                                        // Optional
                                        onPending: function(result) {
                                            /* You may add your own js here, this is just example */
                                            window.location.href = "{{ route('paymenterror') }}"
                                        },
                                        // Optional
                                        onError: function(result) {
                                            window.location.href = "{{ route('paymenterror') }}"
                                        }
                                    });
                                };
                            </script>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('components/footer')

</body>

</html>
