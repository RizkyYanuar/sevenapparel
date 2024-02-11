<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Detail Product</title>
        @vite(['resources/css/tailwind.css', 'resources/js/app.js', 'resources/css/app.css'])

    </head>

    <body>
        @include('components/navbar')
        <div class="w-full h-screen bg-[#deeceb] p-20 fs-poppins grid grid-cols-2 gap-6">
            <div class="w-full h-full flex justify-center items-center">
                <div class="w-96 h-96">
                    <img src="{{ asset('storage/' . $product->product_image) }}" alt="" class="w-full h-full">
                </div>
            </div>
            <div class="w-full h-full flex items-center">
                <div class="">
                    <p class="text-3xl fs-outfit">Detail Produk</p>
                    <p class="text-base">Nama Produk: <span class="text-gray-700">{{ $product->product_name }}</span>
                    </p>
                    <p class="text-base">Deskripsi Produk: <br> <span class="text-gray-700">{{ $product->desc }}</span>
                    </p>
                    <p class="text-base">Stock Produk: <span class="text-gray-700">{{ $product->stock }}</span></p>
                    <p class="text-base">Harga: <span class="text-gray-700">{{ $product->harga }}</span>
                    </p>
                    <button type="button"
                        class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 mt-2 duration-100">Beli
                        Sekarang</button>
                </div>
            </div>
        </div>
        <div class="w-full fs-poppins p-20 flex flex-col" id="comments">
            <p class="text-3xl fs-outfit">Komentar ({{ $totalComments }})</p>
            <form action="/{{ $product->id }}/comment" method="post" id="commentForm">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <div class="flex flex-row w-full gap-4 justify-around">
                    <div class="relative z- my-4 grow">
                        <input type="text" id="text"
                            class="block w-full px-0 py-2 text-base bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " name="comment" required />
                        <label for="text"
                            class="absolute text-base duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Tulis
                            sesuatu...</label>
                    </div>
                    <button type="submit"
                        class="text-white border bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base px-5 text-center me-2 mb-2 mt-2 duration-100">Kirim</button>
                </div>
            </form>
            @if (!isset($comments))
                <p class="text-base">Belum ada Komentar.</p>
            @else
                <div class="flex flex-col gap-4 w-full">
                    @foreach ($comments as $comment)
                        <div class="flex flex-row gap-6">
                            <div class="w-11 h-11">
                                @if ($comment->user->user_image)
                                    <img src="{{ asset('storage/' . $comment->user->user_image) }}" alt="">
                                @else
                                    <img src="{{ asset('storage/userimg/defaultuser.jpg') }}" alt="">
                                @endif
                            </div>
                            <div>
                                <p class="text-base">
                                    &#64;{{ $comment->user->name }} &#183;
                                    <span
                                        class="text-gray-500">{{ strftime('%e %B %Y, %H:%M', strtotime($comment->created_at)) }}</span>
                                </p>
                                <p class="text-sm text-gray-700">{{ $comment->comment }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        @include('components/footer')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const commentForm = document.getElementById('commentForm');
                commentForm.addEventListener('submit', function(event) {
                    event.preventDefault(); // Mencegah pengiriman formulir
                    const formData = new FormData(commentForm);
                    fetch(commentForm.action, {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Kode untuk menampilkan pesan sukses atau melakukan apa pun yang diperlukan
                                window.location.reload(); // Refresh halaman setelah berhasil
                            } else {
                                // Kode untuk menangani kesalahan atau menampilkan pesan gagal
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            });
        </script>

    </body>

</html>
