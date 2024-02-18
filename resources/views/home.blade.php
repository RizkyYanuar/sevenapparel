<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
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
            <div class="w-full h-full">

            </div>
        </div>
        <div class="w-full flex flex-row justify-center items-center gap-6 p-20 fs-poppins">
            <div class="w-full flex flex-col gap-2">
                <i class="bi bi-truck text-7xl text-[#6d9fa3]"></i>
                <p class="text-xl font-bold">Gratis Ongkir</p>
                <p class="text-base text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Perspiciatis, atque?</p>
            </div>
            <div class="w-full flex flex-col gap-2">
                <i class="bi bi-credit-card text-7xl text-[#6d9fa3]"></i>
                <p class="text-xl font-bold">Pembayaran Aman</p>
                <p class="text-base text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Perspiciatis, atque?</p>
            </div>
            <div class="w-full flex flex-col gap-2">
                <i class="bi bi-clock text-7xl text-[#6d9fa3]"></i>
                <p class="text-xl font-bold">Support 24/7</p>
                <p class="text-base text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Perspiciatis, atque?</p>
            </div>
            <div class="w-full flex flex-col gap-2">
                <i class="bi bi-fingerprint text-7xl text-[#6d9fa3]"></i>
                <p class="text-xl font-bold">Barang Original</p>
                <p class="text-base text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Perspiciatis, atque?</p>
            </div>
        </div>
        <div class="latest-arrival w-full px-16 fs-poppins">
            <p class="text-5xl fs-outfit">Latest Arrival</p>
            <p class="text-xl text-gray-700">Showing our Latest Arrival on this Summer.</p>
            <div class="grid grid-cols-5 gap-6 mt-6">
                <div class="w-full h-72 bg-[#f7f8fc]"></div>
                <div class="w-full h-72 bg-[#f7f8fc]"></div>
                <div class="w-full h-72 bg-[#f7f8fc]"></div>
                <div class="w-full h-72 bg-[#f7f8fc]"></div>
                <div class="w-full h-72 bg-[#f7f8fc]"></div>
                <div class="w-full h-72 bg-[#f7f8fc]"></div>
                <div class="w-full h-72 bg-[#f7f8fc]"></div>
                <div class="w-full h-72 bg-[#f7f8fc]"></div>
                <div class="w-full h-72 bg-[#f7f8fc]"></div>
                <div class="w-full h-72 bg-[#f7f8fc]"></div>
            </div>
        </div>
        <div class="featured-product w-full p-20 fs-poppins">
            <p class="text-3xl fs-outfit">Featured Product</p>
            <p class="text-base text-gray-700">Showing our Featured Product on Seven Apparel.</p>
            <div class="grid grid-cols-5 gap-6 mt-6">
                @foreach ($products as $product)
                    <div class="w-full h-72 bg-[#f7f8fc]">
                        <a href="/product/{{ $product->id }}">{{ $product->product_name }}</a>
                        <p class="text-sm">{{ $product->stock }}</p>
                    </div>
                @endforeach
                <div class="w-full h-72 bg-[#f7f8fc]"></div>
                <div class="w-full h-72 bg-[#f7f8fc]"></div>
                <div class="w-full h-72 bg-[#f7f8fc]"></div>
                <div class="w-full h-72 bg-[#f7f8fc]"></div>
                <div class="w-full h-72 bg-[#f7f8fc]"></div>
                <div class="w-full h-72 bg-[#f7f8fc]"></div>
                <div class="w-full h-72 bg-[#f7f8fc]"></div>
                <div class="w-full h-72 bg-[#f7f8fc]"></div>
                <div class="w-full h-72 bg-[#f7f8fc]"></div>
            </div>
        </div>
        <div class="w-full px-20 fs-poppins">
            <div class="flex flex-row gap-6">
                <div class="w-full bg-[#e9e5f1] py-16 px-8 flex flex-col justify-center gap-1">
                    <p class="text-base text-[#6d9fa3]">
                        Newest Collection
                    </p>
                    <p class="text-3xl fs-outfit">Women's New Collection</p>
                    <a href="" class="underline text-blue-500 hover:text-blue-600 duration-100">Shop Now</a>
                </div>
                <div class="w-full bg-[#f6ebd8] py-16 px-8 flex flex-col justify-center gap-1">
                    <p class="text-base text-[#6d9fa3]">
                        Newest Collection
                    </p>
                    <p class="text-3xl fs-outfit">Men's Trendy Fashion</p>
                    <a href="" class="underline text-blue-500 hover:text-blue-600 duration-100">Shop Now</a>
                </div>

            </div>
        </div>
        <div class="w-full p-20 fs-poppins">
            <p class="text-3xl fs-outfit">Shop by Category</p>
            <p class="text-base text-gray-700">Showing the List Product by Category</p>
            <div class="grid grid-cols-4 gap-4 mt-6">
                <div class="flex w-full flex-col items-center gap-1">
                    <div class="h-40 bg-sky-600 w-full">
                    </div>
                    <p class="text-base text-gray-600">
                        Cloths
                    </p>
                    <p class="text-sm text-gray-400">
                        7Apprl Cloths
                    </p>
                </div>
                <div class="flex w-full flex-col items-center gap-1">
                    <div class="h-40 bg-[#e9e5f1] w-full">
                    </div>
                    <p class="text-base text-gray-600">
                        Bags
                    </p>
                    <p class="text-sm text-gray-400">
                        7Apprl Bags
                    </p>
                </div>
                <div class="flex w-full flex-col items-center gap-1">
                    <div class="h-40 bg-sky-600 w-full">
                    </div>
                    <p class="text-base text-gray-600">
                        Watches
                    </p>
                    <p class="text-sm text-gray-400">
                        7Apprl Watches
                    </p>
                </div>
                <div class="flex w-full flex-col items-center gap-1">
                    <div class="h-40 bg-[#e9e5f1] w-full">
                    </div>
                    <p class="text-base text-gray-600">
                        Jewellery
                    </p>
                    <p class="text-sm text-gray-400">
                        7Apprl Jewellery
                    </p>
                </div>

            </div>
        </div>
        <div class="w-full p-20 grid grid-cols-3 bg-[#deeceb] fs-poppins gap-6 relative">
            <div class="flex flex-col gap-4 z-10">
                <p class="text-4xl fs-outfit mt-12">What Customers Say About us.</p>
                <p class="text-base text-gray-700">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ea, eos.
                </p>
            </div>
            <div class="bg-white flex flex-col p-6 gap-4 z-10">
                <i class="bi bi-quote text-4xl text-[#6d9fa3]"></i>
                <p class="text-base text-gray-700">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate
                    exercitationem nihil cumque fuga quidem, dolor minima id minus necessitatibus architecto est illum
                    totam ducimus porro modi explicabo laudantium facilis eius.</p>
                <div class="flex flex-col">
                    <p class="text-base font-bold">Rizky Yanuar Irawan</p>
                    <p class="text-sm text-gray-500">Model Zara</p>
                </div>
            </div>
            <div class="bg-white flex flex-col p-6 gap-4 z-10">
                <i class="bi bi-quote text-4xl text-[#6d9fa3]"></i>
                <p class="text-base text-gray-700">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate
                    exercitationem nihil cumque fuga quidem, dolor minima id minus necessitatibus architecto est illum
                    totam ducimus porro modi explicabo laudantium facilis eius.</p>
                <div class="flex flex-col">
                    <p class="text-base font-bold">Rizky Yanuar Irawan</p>
                    <p class="text-sm text-gray-500">Model Zara</p>
                </div>
            </div>
            <div class="absolute w-72 h-36 rounded-t-full bg-blue-200 bottom-0 left-16"></div>
            <div class="absolute w-72 h-72 rounded-full bg-blue-200 top-2 right-1/3"></div>
            <div class="absolute w-36 h-36 rounded-full bg-blue-200 bottom-2 right-8"></div>
            <div class="absolute w-16 h-16 rounded-full bg-blue-200 top-6 right-8"></div>
        </div>
        @include('components/footer')
    </body>


</html>
