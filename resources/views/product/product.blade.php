<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Product</title>
    @vite(['resources/css/tailwind.css', 'resources/js/app.js', 'resources/css/app.css', 'resources/js/product.js'])

</head>

<body>
    @include('components/navbar')
    @include('components/alerts')
    <div class="w-full h-screen bg-[#deeceb] p-20 fs-poppins grid grid-cols-2 gap-6" id="product{{ $product->id }}">
        <div class="w-full h-full flex justify-center items-center">
            <div class="w-96 h-96">
                <img src="{{ asset('storage/' . $product->product_image) }}" alt="" class="w-full h-full">
            </div>
        </div>
        <div class="w-full h-full flex items-center">
            <div class="w-full">
                <p class="text-3xl fs-outfit">{{ $product->product_name }}</p>
                <p class="text-base text-gray-700">Detail Produk
                </p>
                <p class="text-base text-gray-700">Deskripsi: <br> <span class="text-black">{{ $product->desc }}</span>
                </p>
                <p class="text-base text-gray-700">Stock: <span class="text-black">{{ $product->stock }}</span>
                </p>
                <p class="text-base text-gray-700">Harga: <span class="text-black">{{ $product->harga }}</span>
                </p>
                <div class="w-full">
                    <form action="/product/checkout" method="post" class="inline">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="harga" value="{{ $product->harga }}">
                        <button type="submit"
                            class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 mt-2 duration-100">Beli
                            Sekarang</button>
                    </form>
                    @if (auth()->user()->roles === 'admin')
                        <form action="/product/{{ $product->id }}/editproduct" method="get" class="inline">
                            @csrf
                            <button type="submit"
                                class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 mt-2 duration-100">Edit
                                Produk</button>
                        </form>

                        <button data-modal-target="delete-product-modal" data-modal-toggle="delete-product-modal"
                            class="block text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline"
                            type="button">
                            Hapus Produk
                        </button>

                        <div id="delete-product-modal" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                        data-modal-hide="delete-product-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Yakin
                                            ingin menghapus product ini?</h3>
                                        <form action="/product/{{ $product->id }}/deleteproduct" method="post"
                                            class="inline">
                                            @csrf
                                            <button type="submit"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                Ya, Saya yakin.
                                            </button>
                                        </form>
                                        <button data-modal-hide="delete-product-modal" type="button"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Tidak,
                                            Kembali.</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="likes">
                    @if ($product->likes->contains('userId', auth()->user()->id))
                        <form action="/product/unlike" method="post" id="productUnlikeForm" class="inline">
                            @csrf
                            <input type="hidden" name="userId" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="productId" value="{{ $product->id }}">
                            <button type="submit" class=""><i
                                    class="bi bi-heart-fill text-base text-red-500"></i></button>
                        </form>
                    @else
                        <form action="/product/like" method="post" id="productLikeForm" class="inline">
                            @csrf
                            <input type="hidden" name="productId" value="{{ $product->id }}">
                            <input type="hidden" name="userId" value="{{ auth()->user()->id }}">
                            <button type="submit"><i class="bi bi-heart text-base"></i></button>
                        </form>
                    @endif
                    <p class="text-base inline">{{ $total_likes }}</p>
                </div>

            </div>
        </div>
    </div>
    <div class="w-full fs-poppins p-20 flex flex-col" id="comments">
        <p class="text-3xl fs-outfit">Komentar ({{ $totalComments }})</p>
        @if (auth()->user()->roles === 'admin' || auth()->user()->roles === 'user')
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
        @else
            <p class="text-base my-4 text-gray-700 italic bold">Anda Harus Memiliki Role User untuk berkomentar.</p>
        @endif
        @if (!isset($comments))
            <p class="text-base">Belum ada Komentar.</p>
        @else
            <div class="flex flex-col gap-4 w-full">
                @foreach ($comments as $comment)
                    <div class="flex flex-row gap-6" id="{{ $comment->id }}">
                        <div class="w-11 h-11 rounded-full">
                            @if ($comment->user->user_image)
                                <img src="{{ asset('storage/' . $comment->user->user_image) }}" alt=""
                                    class="rounded-full">
                            @else
                                <img src="{{ asset('storage/userimg/defaultuser.png') }}" alt=""
                                    class="rounded-full">
                            @endif
                        </div>
                        <div class="">
                            <div>
                                <p class="text-base">
                                    &#64;{{ $comment->user->name }} &#183;
                                    <span
                                        class="text-gray-500">{{ strftime('%e %B %Y, %H:%M', strtotime($comment->created_at)) }}</span>

                                </p>
                                <p class="text-sm text-gray-700">{{ $comment->comment }}
                                </p>
                            </div>
                        </div>
                        <div class="w-11 h-11 flex gap-3">
                            <form action="/{{ $comment->id }}/likecomment" method="post"
                                data-form-id="commentLikeForm" class="commentLikeForm hidden">
                                @csrf
                                <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                                <input type="hidden" value="{{ $comment->id }}" name="comment_id">
                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                            </form>
                            <form action="/{{ $comment->id }}/unlikecomment" method="post"
                                data-form-id="commentLikeForm" class="commentUnlikeForm hidden">
                                @csrf
                                <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                                <input type="hidden" value="{{ $comment->id }}" name="comment_id">
                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                            </form>
                            @if ($comment->likes->contains('user_id', auth()->user()->id))
                                <div class="flex comment-unlike-button gap-1"><i
                                        class="bi bi-heart-fill text-red-500 cursor-pointer text-base"></i>{{ $comment->likes_count }}
                                </div>
                            @else
                                <div class="flex comment-like-button gap-1"><i
                                        class="bi bi-heart cursor-pointer text-base"></i>{{ $comment->likes_count }}
                                </div>
                            @endif
                            <i class="bi bi-chat-right-text hover:cursor-pointer"
                                data-modal-target="reply-comment-modal-{{ $comment->id }}"
                                data-modal-toggle="reply-comment-modal-{{ $comment->id }}"></i>
                            <div id="reply-comment-modal-{{ $comment->id }}" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-2xl max-h-full">
                                    <button type="button"
                                        class="text-gray-400 bg-white hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center mb-2"
                                        data-modal-hide="reply-comment-modal-{{ $comment->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <form action="/comment/reply" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <textarea id="message" rows="4"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Tulis Balasan anda disini." name="comment"></textarea>
                                        <button type="submit"
                                            class="text-white mt-2 hover:text-gray-300">Balas</button>
                                    </form>
                                </div>
                            </div>
                            @if ($comment->user->id === auth()->user()->id)
                                <i class="bi bi-trash3 text-red-500 hover:cursor-pointer hover:text-red-600"
                                    data-modal-target="delete-comment-modal-{{ $comment->id }}"
                                    data-modal-toggle="delete-comment-modal-{{ $comment->id }}"></i>
                                <div id="delete-comment-modal-{{ $comment->id }}" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button"
                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                data-modal-hide="delete-comment-modal-{{ $comment->id }}">
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
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500">
                                                    Yakin
                                                    ingin menghapus Komentar ini?</h3>
                                                <form action="/comment/delete" method="post" class="inline">
                                                    @csrf
                                                    <input type="hidden" name="comment_id"
                                                        value="{{ $comment->id }}">
                                                    <button type="submit"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                        Ya, Saya yakin.
                                                    </button>
                                                </form>
                                                <button data-modal-hide="delete-comment-modal-{{ $comment->id }}"
                                                    type="button"
                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Tidak,
                                                    Kembali.</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>

                    <div class="replyComment flex flex-col gap-4">
                        @if ($comment->replies()->count() > 0)
                            <button id="replyButton"
                                class="text-blue-500 hover:text-blue-600 font-medium rounded-lg text-sm px-5 py-0.5 text-center inline-flex items-center ms-3"
                                type="button">Lihat Balasan ({{ $comment->replies()->count() }})<svg
                                    class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>

                            </button>
                        @endif

                        <!-- Dropdown menu -->
                        <div id="dropdown" class="w-full hidden ps-8">
                            @foreach ($replyComment as $reply)
                                @if ($comment->id == $reply->comment_id)
                                    <div class="flex gap-6 mb-4">
                                        <div class="w-11 h-11 rounded-full">
                                            @if ($reply->user->user_image)
                                                <img src="{{ asset('storage/' . $reply->user->user_image) }}"
                                                    alt="" class="rounded-full">
                                            @else
                                                <img src="{{ asset('storage/userimg/defaultuser.png') }}"
                                                    alt="" class="rounded-full">
                                            @endif
                                        </div>
                                        <div class="">
                                            <div>
                                                <p class="text-base">
                                                    &#64;{{ $reply->user->name }} &#183;
                                                    <span
                                                        class="text-gray-500">{{ strftime('%e %B %Y, %H:%M', strtotime($reply->created_at)) }}</span>
                                                </p>
                                                <p class="text-sm text-gray-700">{{ $reply->comment }}</p>
                                            </div>
                                        </div>
                                        <div class="flex gap-3">
                                            @if ($reply->user_id === auth()->user()->id)
                                                <i class="bi bi-trash3 text-red-500 hover:cursor-pointer hover:text-red-600"
                                                    data-modal-target="delete-reply-comment-modal-{{ $reply->id }}"
                                                    data-modal-toggle="delete-reply-comment-modal-{{ $reply->id }}"></i>
                                                <div id="delete-reply-comment-modal-{{ $reply->id }}"
                                                    tabindex="-1"
                                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                                        <div
                                                            class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button"
                                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                                data-modal-hide="delete-reply-comment-modal-{{ $reply->id }}">
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
                                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 20 20">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                </svg>
                                                                <h3 class="mb-5 text-lg font-normal text-gray-500">
                                                                    Yakin
                                                                    ingin menghapus Komentar ini?</h3>
                                                                <form action="/comment/reply/delete" method="post"
                                                                    class="inline">
                                                                    @csrf
                                                                    <input type="hidden" name="reply_id"
                                                                        value="{{ $reply->id }}">

                                                                    <button type="submit"
                                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                        Ya, Saya yakin.
                                                                    </button>
                                                                </form>
                                                                <button
                                                                    data-modal-hide="delete-reply-comment-modal-{{ $reply->id }}"
                                                                    type="button"
                                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Tidak,
                                                                    Kembali.</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    @include('components/footer')

</body>

</html>
