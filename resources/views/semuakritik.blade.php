<?php
$jumlahPerVariabel = count($kritik) / 2;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Semua Kritik dan Saran</title>
    @vite(['resources/css/tailwind.css', 'resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    @include('components/navbar')
    @include('components/alerts')
    <div class="bg-[#deeceb] px-20 py-2"><button type="button"
            class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"><a
                href="/home#feedback">Kembali</a></button></div>
    <div class="w-full px-20 fs-poppins grid grid-cols-1 md:grid-cols-2 gap-8 bg-[#deeceb]">
        <div class="flex flex-col gap-4">
            @foreach ($kritik as $item)
                @if ($loop->iteration <= $jumlahPerVariabel)
                    <div class="bg-white flex flex-col p-6 gap-4 rounded">
                        <div class="flex justify-between">
                            <i class="bi bi-quote text-4xl text-[#6d9fa3]"></i>
                            <div>
                                <i class="bi bi-trash3 text-red-500 hover:cursor-pointer hover:text-red-600"
                                    data-modal-target="delete-item-modal-{{ $item->id }}"
                                    data-modal-toggle="delete-item-modal-{{ $item->id }}"></i>
                                <div id="delete-item-modal-{{ $item->id }}" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button"
                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                data-modal-hide="delete-item-modal-{{ $item->id }}">
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
                                                    ingin menghapus Feedback ini?</h3>
                                                <form action="/kritikdansaran/delete" method="post" class="inline">
                                                    @csrf
                                                    <input type="hidden" name="kritik_id" value="{{ $item->id }}">
                                                    <button type="submit"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                        Ya, Saya yakin.
                                                    </button>
                                                </form>
                                                <button data-modal-hide="delete-item-modal-{{ $item->id }}"
                                                    type="button"
                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Tidak,
                                                    Kembali.</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-base text-gray-700"><span class="font-bold">Kritik:</span> {{ $item->kritik }}
                        </p>
                        <p class="text-base text-gray-700"><span class="font-bold">Saran:</span> {{ $item->saran }}</p>
                        <div class="flex items-end justify-end h-full gap-4">
                            <div class="w-11 h-11 rounded-full">
                                @if ($item->user->user_image)
                                    <img src="{{ asset('storage/' . $item->user->user_image) }}" alt=""
                                        class="rounded-full">
                                @else
                                    <img src="{{ asset('storage/userimg/defaultuser.png') }}" alt=""
                                        class="rounded-full">
                                @endif
                            </div>
                            <div class="flex flex-col">
                                <p class="text-base font-bold">{{ $item->nama }}</p>
                                <p class="text-sm text-black italic"><span class="text-gray-700">as
                                    </span>{{ $item->user->roles }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="flex flex-col gap-4">
            @foreach ($kritik as $item)
                @if ($loop->iteration > $jumlahPerVariabel)
                    <div class="bg-white flex flex-col p-6 gap-4 rounded">
                        <div class="flex justify-between">
                            <i class="bi bi-quote text-4xl text-[#6d9fa3]"></i>
                            <div>
                                <i class="bi bi-trash3 text-red-500 hover:cursor-pointer hover:text-red-600"
                                    data-modal-target="delete-item-modal-{{ $item->id }}"
                                    data-modal-toggle="delete-item-modal-{{ $item->id }}"></i>
                                <div id="delete-item-modal-{{ $item->id }}" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button"
                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                data-modal-hide="delete-item-modal-{{ $item->id }}">
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
                                                    ingin menghapus Feedback ini?</h3>
                                                <form action="/kritikdansaran/delete" method="post" class="inline">
                                                    @csrf
                                                    <input type="hidden" name="kritik_id"
                                                        value="{{ $item->id }}">
                                                    <button type="submit"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                        Ya, Saya yakin.
                                                    </button>
                                                </form>
                                                <button data-modal-hide="delete-item-modal-{{ $item->id }}"
                                                    type="button"
                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Tidak,
                                                    Kembali.</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-base text-gray-700"><span class="font-bold">Kritik:</span> {{ $item->kritik }}
                        </p>
                        <p class="text-base text-gray-700"><span class="font-bold">Saran:</span> {{ $item->saran }}
                        </p>
                        <div class="flex items-end justify-end h-full gap-4">
                            <div class="w-11 h-11 rounded-full">
                                @if ($item->user->user_image)
                                    <img src="{{ asset('storage/' . $item->user->user_image) }}" alt=""
                                        class="rounded-full">
                                @else
                                    <img src="{{ asset('storage/userimg/defaultuser.png') }}" alt=""
                                        class="rounded-full">
                                @endif
                            </div>
                            <div class="flex flex-col">
                                <p class="text-base font-bold">{{ $item->nama }}</p>
                                <p class="text-sm text-black italic"><span class="text-gray-700">as
                                    </span>{{ $item->user->roles }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

    </div>
    @include('components/footer')

</body>

</html>
