<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>listproduk</title> @vite(['resources/css/tailwind.css', 'resources/js/app.js', 'resources/css/app.css', 'resources/js/product.js'])
</head>

<body>
    @include('components/navbar')
    @include('components/alerts')
    <div class="w-full px-20 py-8">
        <p class="text-4xl fs-outfit mb-4">List Produk</p>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-sm text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Gambar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Deskripsi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Stok
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($semuaproduk as $produk)
                        <tr class="bg-white border-b hover:bg-gray-50" id="{{ $produk->id }}">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $loop->iteration }}
                            </th>
                            <th class="px-6 py-4">
                                <img src="{{ asset('storage/' . $produk->product_image) }}" alt=""
                                    class="w-16 h-16 object-cover">
                            </th>
                            <th class="px-6 py-4">
                                {{ $produk->product_name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $produk->desc }}
                            </td>
                            <td class="px-6 py-4 capitalize">
                                {{ $produk->stock }}
                            </td>
                            <td class="px-6 py-4 capitalize">
                                @if ($produk->stock > 0)
                                    <p class="text-sm text-green-500">Ditampilkan</p>
                                @else
                                    <p class="text-sm text-red-500">Disembunyikan</p>
                                @endif
                            </td>
                            <td class="px-6 py-4 capitalize">
                                Rp{{ $produk->harga }}
                            </td>
                            <td class="px-6 py-4 capitalize">
                                <a href="/product/{{ $produk->id }}/editproduct"
                                    class="text-yellow-300 hover:text-yellow-400">Edit</a>
                                <form action="/product/{{ $produk->id }}/deleteproduct" method="post">
                                    <button type="button" class="text-red-500 hover:text-red-600"
                                        data-modal-target="delete-product-modal-{{ $produk->id }}"
                                        data-modal-toggle="delete-product-modal-{{ $produk->id }}">Delete</button>
                                    <div id="delete-product-modal-{{ $produk->id }}" tabindex="-1"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button"
                                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                    data-modal-hide="delete-product-modal-{{ $produk->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                                <div class="p-4 md:p-5 text-center">
                                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                    <h3
                                                        class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                        Yakin
                                                        ingin menghapus product ini?</h3>
                                                    <form action="/product/{{ $produk->id }}/deleteproduct"
                                                        method="post" class="inline">
                                                        @csrf
                                                        <button type="submit"
                                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                            Ya, Saya yakin.
                                                        </button>
                                                    </form>
                                                    <button data-modal-hide="delete-product-modal-{{ $produk->id }}"
                                                        type="button"
                                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Tidak,
                                                        Kembali.</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('components/footer')
</body>

</html>
