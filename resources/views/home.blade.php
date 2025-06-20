<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @vite(['resources/css/tailwind.css', 'resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    @include('components/navbar')
    @include('components/alerts')

    <div class="w-full h-screen bg-[#deeceb] p-20 flex flex-row fs-poppins justify-center items-center gap-6">
        <div class="flex flex-col justify-center w-full h-full gap-4">
            <p class="text-2xl uppercase text-gray-500">Seven Apparel Katalog</p>
            <p class="text-6xl capitalize fs-outfit">Make your fashion more perfect</p>
            <p class="text-xl text-gray-700">Temukan tren terbaru, koleksi lengkap, dan inspirasi gaya terkini untuk
                segala
                kesempatan. Segera temukan gaya Anda di sini!</p>
        </div>
        <div class="w-full h-full relative">
            <div class="w-96 h-96 absolute bg-white top-12 left-24 rounded-full"></div>
            <img src="{{ asset('img/istockphoto-1337854976-612x612-removebg-preview.png') }}" alt=""
                class="object-cover -top-24 relative" style="width: 116%; height:116%;">
        </div>
    </div>
    <div class="w-full flex flex-row justify-center items-center gap-6 p-20 fs-poppins">
        <div class="w-full flex flex-col gap-2" data-aos="fade-up" data-aos-duration="600">
            <i class="bi bi-truck text-7xl text-[#6d9fa3]"></i>
            <p class="text-xl font-bold">Gratis Ongkir</p>
            <p class="text-base text-gray-500">Selalu tersedia gratis Ongkir untuk Setiap Pesananmu!
                Nikmati Pengiriman Gratis, Belanja Lebih Untung, Hemat Lebih Banyak!</p>
        </div>
        <div class="w-full flex flex-col gap-2" data-aos="fade-down" data-aos-duration="600">
            <i class="bi bi-credit-card text-7xl text-[#6d9fa3]"></i>
            <p class="text-xl font-bold">Pembayaran Aman</p>
            <p class="text-base text-gray-500">Langkah Teguh dengan Pembayaran Aman! Transaksi Tanpa Batas Khawatir,
                Kepercayaan Terjaga Tiap Saat!</p>
        </div>
        <div class="w-full flex flex-col gap-2" data-aos="fade-up" data-aos-duration="600">
            <i class="bi bi-clock text-7xl text-[#6d9fa3]"></i>
            <p class="text-xl font-bold">Pelayanan Cepat</p>
            <p class="text-base text-gray-500">Pelayanan Kami Siap Memberikan Respons Cepat dan Tanggap, Memberikan
                Pengalaman Terbaik untuk Setiap Kebutuhan Anda!</p>
        </div>
        <div class="w-full flex flex-col gap-2" data-aos="fade-down" data-aos-duration="600">
            <i class="bi bi-fingerprint text-7xl text-[#6d9fa3]"></i>
            <p class="text-xl font-bold">Barang Original</p>
            <p class="text-base text-gray-500">Jaminan Keaslian Terpercaya! Pilih Hanya Barang Original untuk Kualitas
                Tak Terbantahkan dan Kepuasan Tanpa Batas!</p>
        </div>
    </div>
    <div class="latest-arrival w-full px-16 fs-poppins grid items-center grid-cols-2 fs-poppins">
        <div class="w-full h-full bg-[#deeceb] p-4 flex items-center">
            <div>
                <p class="text-3xl fs-outfit">
                    Fashion Katalog
                </p>
                <p class="text-base text-gray-700">
                    Belanja Di Seven Apparel Dengan Diskon 50%!!
                </p>
                <p class="text-base">
                    Jangan lewatkan kesempatan istimewa ini! Dapatkan produk unggulan kami dengan harga terbaik. Segera
                    checkout untuk nikmati pengalaman belanja yang tak terlupakan.
                </p>
            </div>
        </div>
        <div id="default-carousel" class="relative w-[540px]" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative overflow-hidden h-[270px]">
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('img/sale3.png') }}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('img/sale4.jpg') }}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 5 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('img/sale5.jpg') }}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="2"></button>
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>
    <div class="featured-product w-full p-20 fs-poppins" id="featured-product">
        <p class="text-base text-gray-700">Showing our Featured Product on Seven Apparel.</p>
        <p class="text-3xl fs-outfit mt-6 mb-2" id="produkjaket">Jaket</p>
        <div class="grid grid-cols-5 gap-6">
            @foreach ($produkjaket as $jaket)
                @if ($jaket->stock > 0)
                    <div class="w-full rounded" data-aos="{{ $loop->iteration % 2 == 0 ? 'fade-down' : 'fade-up' }}"
                        data-aos-duration="1000">
                        <div
                            class="relative h-72 overflow-y-hidden mb-3 bg-[#deeceb] flex justify-center items-center">
                            <img src="storage/{{ $jaket->product_image }}" alt="">
                            <div class="absolute top-2 left-2 text-sm bg-green-800 text-white px-2 py-0.5">
                                TOP
                            </div>
                            <div class="absolute top-2 right-2 text-sm bg-red-600 text-white p-2 py-0.5">
                                SALE
                            </div>
                        </div>
                        <div class="px-2 pb-2">
                            <p class="text-sm text-gray-500">
                                @if ($jaket->sold->count() >= 1)
                                    <i class="bi bi-star-fill text-yellow-300"></i>
                                    <i class="bi bi-star-fill text-yellow-300"></i>
                                    <i class="bi bi-star-fill text-yellow-300"></i>
                                    <i class="bi bi-star-fill text-yellow-300"></i>
                                    <i class="bi bi-star-fill text-yellow-300 me-2"></i>
                                @else
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star me-2"></i>
                                @endif
                                {{ $jaket->sold->count() }} Terjual
                            </p>
                            <a href="/product/{{ $jaket->id }}"
                                class="font-bold capitalize">{{ $jaket->product_name }}</a>
                            <p class="text-sm text-gray-500">Stock: {{ $jaket->stock }}</p>
                            <p class="text-base font-bold text-green-800">Rp{{ $jaket->harga }}
                                <del class="ms-2 text-gray-500">Rp{{ $jaket->harga * 2 + 1 }}</del>
                            </p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <p class="text-3xl fs-outfit mt-6 mb-2" id="produksepatu">Sepatu</p>

        <div class="grid grid-cols-5 gap-6">
            @foreach ($produksepatu as $sepatu)
                @if ($sepatu->stock > 0)
                    <div class="w-full rounded" data-aos="{{ $loop->iteration % 2 == 0 ? 'fade-down' : 'fade-up' }}"
                        data-aos-duration="1000">
                        <div
                            class="relative h-72 overflow-y-hidden mb-3 bg-[#deeceb] flex justify-center items-center">
                            <img src="storage/{{ $sepatu->product_image }}" alt="">
                            <div class="absolute top-2 left-2 text-sm bg-green-800 text-white px-2 py-0.5">
                                TOP
                            </div>
                            <div class="absolute top-2 right-2 text-sm bg-red-600 text-white p-2 py-0.5">
                                SALE
                            </div>
                        </div>
                        <div class="px-2 pb-2">
                            <p class="text-sm text-gray-500">
                                @if ($sepatu->sold->count() >= 1)
                                    <i class="bi bi-star-fill text-yellow-300"></i>
                                    <i class="bi bi-star-fill text-yellow-300"></i>
                                    <i class="bi bi-star-fill text-yellow-300"></i>
                                    <i class="bi bi-star-fill text-yellow-300"></i>
                                    <i class="bi bi-star-fill text-yellow-300 me-2"></i>
                                @else
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star me-2"></i>
                                @endif
                                {{ $sepatu->sold->count() }} Terjual
                            </p>
                            <a href="/product/{{ $sepatu->id }}"
                                class="font-bold capitalize">{{ $sepatu->product_name }}</a>
                            <p class="text-sm text-gray-500">Stock: {{ $sepatu->stock }}</p>
                            <p class="text-base font-bold text-green-800">Rp{{ $sepatu->harga }}
                                <del class="ms-2 text-gray-500">Rp{{ $sepatu->harga * 2 + 1 }}</del>
                            </p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <p class="text-3xl fs-outfit mt-6 mb-2" id="produktopi">Topi</p>

        <div class="grid grid-cols-5 gap-6">
            @foreach ($produktopi as $topi)
                @if ($topi->stock > 0)
                    <div class="w-full rounded" data-aos="{{ $loop->iteration % 2 == 0 ? 'fade-down' : 'fade-up' }}"
                        data-aos-duration="1000">
                        <div
                            class="relative h-72 overflow-y-hidden mb-3 bg-[#deeceb] flex justify-center items-center">
                            <img src="storage/{{ $topi->product_image }}" alt="">
                            <div class="absolute top-2 left-2 text-sm bg-green-800 text-white px-2 py-0.5">
                                TOP
                            </div>
                            <div class="absolute top-2 right-2 text-sm bg-red-600 text-white p-2 py-0.5">
                                SALE
                            </div>
                        </div>
                        <div class="px-2 pb-2">
                            <p class="text-sm text-gray-500">
                                @if ($topi->sold->count() >= 1)
                                    <i class="bi bi-star-fill text-yellow-300"></i>
                                    <i class="bi bi-star-fill text-yellow-300"></i>
                                    <i class="bi bi-star-fill text-yellow-300"></i>
                                    <i class="bi bi-star-fill text-yellow-300"></i>
                                    <i class="bi bi-star-fill text-yellow-300 me-2"></i>
                                @else
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star me-2"></i>
                                @endif
                                {{ $topi->sold->count() }} Terjual
                            </p>
                            <a href="/product/{{ $topi->id }}"
                                class="font-bold capitalize">{{ $topi->product_name }}</a>
                            <p class="text-sm text-gray-500">Stock: {{ $topi->stock }}</p>
                            <p class="text-base font-bold text-green-800">Rp{{ $topi->harga }}
                                <del class="ms-2 text-gray-500">Rp{{ $topi->harga * 2 + 1 }}</del>
                            </p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <p class="text-3xl fs-outfit mt-6 mb-2" id="produkaksesoris">Aksesoris</p>

        <div class="grid grid-cols-5 gap-6">
            @foreach ($produkaksesoris as $aksesoris)
                @if ($aksesoris->stock > 0)
                    <div class="w-full rounded" data-aos="{{ $loop->iteration % 2 == 0 ? 'fade-down' : 'fade-up' }}"
                        data-aos-duration="1000">
                        <div
                            class="relative h-72 overflow-y-hidden mb-3 bg-[#deeceb] flex justify-center items-center">
                            <img src="storage/{{ $aksesoris->product_image }}" alt="">
                            <div class="absolute top-2 left-2 text-sm bg-green-800 text-white px-2 py-0.5">
                                TOP
                            </div>
                            <div class="absolute top-2 right-2 text-sm bg-red-600 text-white p-2 py-0.5">
                                SALE
                            </div>
                        </div>
                        <div class="px-2 pb-2">
                            <p class="text-sm text-gray-500">
                                @if ($aksesoris->sold->count() >= 1)
                                    <i class="bi bi-star-fill text-yellow-300"></i>
                                    <i class="bi bi-star-fill text-yellow-300"></i>
                                    <i class="bi bi-star-fill text-yellow-300"></i>
                                    <i class="bi bi-star-fill text-yellow-300"></i>
                                    <i class="bi bi-star-fill text-yellow-300 me-2"></i>
                                @else
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star me-2"></i>
                                @endif
                                {{ $aksesoris->sold->count() }} Terjual
                            </p>
                            <a href="/product/{{ $aksesoris->id }}"
                                class="font-bold capitalize">{{ $aksesoris->product_name }}</a>
                            <p class="text-sm text-gray-500">Stock: {{ $aksesoris->stock }}</p>
                            <p class="text-base font-bold text-green-800">Rp{{ $aksesoris->harga }}
                                <del class="ms-2 text-gray-500">Rp{{ $aksesoris->harga * 2 + 1 }}</del>
                            </p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="w-full px-20 fs-poppins">
        <div class="flex flex-row gap-6">
            <div class="women-new-collection w-full bg-[#e9e5f1] py-16 px-8 flex flex-col justify-center gap-1"
                data-aos="fade-right" data-aos-duration="800">
                <p class="text-base text-[#6d9fa3]">
                    Newest Collection
                </p>
                <p class="text-3xl fs-outfit">Women's New <br> Collection</p>
                <a href="" class="underline text-blue-500 hover:text-blue-600 duration-100">Shop Now</a>
            </div>

            <div class="men-trendy-fashion w-full bg-[#f6ebd8] py-16 px-8 flex flex-col justify-center gap-1"
                data-aos="fade-left" data-aos-duration="800">
                <p class="text-base text-[#6d9fa3]">
                    Newest Collection
                </p>
                <p class="text-3xl fs-outfit">Men's Trendy <br> Fashion</p>
                <a href="" class="underline text-blue-500 hover:text-blue-600 duration-100">Shop Now</a>
            </div>

        </div>
    </div>
    <div class="w-full p-20 fs-poppins">
        <p class="text-3xl fs-outfit">Belanja menurut Kategori</p>
        <p class="text-base text-gray-700">List Kategori Produk</p>
        <div class="grid grid-cols-4 gap-4 mt-6">
            <div class="flex w-full flex-col items-center gap-1" data-aos="fade-right" data-aos-duration="800">
                <div class="h-44 bg-[#e9e5f1] w-full">
                    <img src="storage/{{ $produksepatu[0]->product_image }}" alt=""
                        class="w-full h-full object-cover">
                </div>
                <p class="text-base text-gray-600">
                    <a href="#produksepatu">Sepatu</a>
                </p>
                <p class="text-sm text-gray-400">
                    Sepatu Sevenapprlco.
                </p>
            </div>
            <div class="flex w-full flex-col items-center gap-1" data-aos="fade-down" data-aos-duration="800">
                <div class="h-44 bg-[#e9e5f1] w-full">
                    <img src="storage/{{ $produkjaket[0]->product_image }}" alt=""
                        class="w-full h-full object-cover">
                </div>
                <p class="text-base text-gray-600">
                    <a href="#produkjaket">Jaket</a>

                </p>
                <p class="text-sm text-gray-400">
                    Jaket Sevenapprlco.
                </p>
            </div>
            <div class="flex w-full flex-col items-center gap-1" data-aos="fade-up" data-aos-duration="800">
                <div class="h-44 bg-[#e9e5f1] w-full">
                    <img src="storage/{{ $produktopi[0]->product_image }}" alt=""
                        class="w-full h-full object-cover">
                </div>
                <p class="text-base text-gray-600">
                    <a href="#produktopi">Topi</a>
                </p>
                <p class="text-sm text-gray-400">
                    Sepatu Sevenapprlco.
                </p>
            </div>
            <div class="flex w-full flex-col items-center gap-1" data-aos="fade-left" data-aos-duration="800">
                <div class="h-44 bg-[#e9e5f1] w-full">
                    <img src="storage/{{ $produkaksesoris[0]->product_image }}" alt=""
                        class="w-full h-full object-cover">
                </div>
                <p class="text-base text-gray-600">
                    <a href="#produkaksesoris">Aksesoris</a>
                </p>
                <p class="text-sm text-gray-400">
                    Aksesoris Sevenapprlco.
                </p>
            </div>

        </div>
    </div>
    <div class="w-full p-20 grid grid-cols-3 bg-[#deeceb] fs-poppins gap-6 relative" id="feedback">
        <div class="flex flex-col gap-4 z-10">
            <p class="text-4xl fs-outfit mt-12">Feedback</p>
            <p class="text-base text-gray-700">Jika Anda Memiliki Kritik Dan Saran, Ketik di Sini
            </p>
            <a href="/kritikdansaran">
                <button type="submit"
                    class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 mt-2 duration-100">
                    Isi di sini
                </button>
            </a>
        </div>
        @foreach ($kritik as $item)
            <div class="bg-white flex flex-col p-6 gap-4 z-10"
                data-aos="{{ $loop->first ? 'flip-left' : 'flip-right' }}" data-aos-duration="1000">
                <i class="bi bi-quote text-4xl text-[#6d9fa3]"></i>
                <p class="text-base text-gray-700"><span class="font-bold">Kritik:</span> {{ $item->kritik }}</p>
                <p class="text-base text-gray-700"><span class="font-bold">Saran:</span> {{ $item->saran }}</p>
                <div class="flex flex-col items-end justify-end h-full">
                    <p class="text-base font-bold">{{ $item->nama }}</p>
                    <p class="text-sm text-black italic"><span class="text-gray-700">as
                        </span>{{ $item->user->roles }}</p>
                </div>
            </div>
        @endforeach
        <div class="absolute w-72 h-36 rounded-t-full bg-blue-200 bottom-0 left-16"></div>
        <div class="absolute w-72 h-72 rounded-full bg-blue-200 top-2 right-1/3"></div>
        <div class="absolute w-36 h-36 rounded-full bg-blue-200 bottom-2 right-8"></div>
        <div class="absolute w-16 h-16 rounded-full bg-blue-200 top-6 right-8"></div>
    </div>
    <div class="relative w-full -mt-10 flex justify-end z-20 px-20 fs-poppins">
        <p class="text-xl">Lihat Semua <a href="/kritikdansaran/semua"
                class="text-blue-500 underline hover:text-blue-600">Kritik dan
                Saran</a></p>
    </div>
    @include('components/footer')
</body>


</html>
