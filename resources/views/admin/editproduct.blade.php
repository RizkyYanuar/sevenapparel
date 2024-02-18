<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Edit Product</title>
        @vite(['resources/css/tailwind.css', 'resources/js/app.js', 'resources/css/app.css'])

    </head>

    <body>
        @include('components/navbar')
        @include('components/alerts')
        <div class="w-full bg-[#deeceb] p-20 fs-poppins">
            <div class="">
                <form action="/product/{{ $product->id }}/editproduct" method="post" enctype="multipart/form-data"
                    class="w-full flex justify-center items-center">
                    @csrf
                    <input type="hidden" name="old_product_image" value="{{ $product->product_image }}">
                    <div class="flex flex-col w-2/4 gap-4">
                        <div>
                            <label for="product-name"
                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                Produk</label>
                            <input type="text" id="product-name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Cth: Denim..." required name="product_name"
                                value="{{ old('product_name', $product->product_name) }}">
                        </div>

                        <div>

                            <label class="block mb-2 text-base font-medium text-gray-900 dark:text-white"
                                for="product_image">Gambar Produk</label>
                            @if ($product->product_image)
                                <div class="mb-4" style="width: 256px; height:256px;">
                                    <img src="{{ asset('storage/' . $product->product_image) }}" alt="">
                                </div>
                            @endif
                            <input
                                class="block w-full text-base text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-[#deeceb] focus:outline-none"
                                id="product_image" type="file" name="product_image">
                        </div>
                        <div>

                            <label for="desc"
                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Deskripsi
                                Produk</label>
                            <textarea id="desc" rows="4"
                                class="block p-2.5 w-full text-base text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="..." required name="desc">{{ old('desc', $product->desc) }}</textarea>

                        </div>
                        <div>
                            <label for="stock"
                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Stok
                                Produk</label>
                            <input type="number" id="stock" aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="20..." required name="stock" value="{{ old('stock', $product->stock) }}">
                        </div>
                        <div>
                            <label for="harga"
                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Harga
                                Produk</label>
                            <input type="number" id="harga" aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Rp..." required name="harga" value="{{ old('harga', $product->harga) }}">
                        </div>
                        <button type="submit"
                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Edit
                            Produk</button>
                    </div>
                </form>
            </div>
        </div>
        @include('components/footer')
    </body>

</html>
