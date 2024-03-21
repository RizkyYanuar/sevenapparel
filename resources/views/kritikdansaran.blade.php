<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kritik dan Saran</title>
    @vite(['resources/css/tailwind.css', 'resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    @include('components/navbar')
    @include('components/alerts')
    <div class="px-20 py-4"><button type="button"
            class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"><a
                href="/home#feedback">Kembali</a></button></div>
    <div class="w-full px-20 fs-poppins grid grid-cols-2 gap-6">
        <div class="">
            <p class="text-4xl fs-outfit mb-4 ">Kritik dan Saran</p>
            <form action="/kritikdansaran" method="post">
                @csrf
                <input type="hidden" name="nama" value="{{ auth()->user()->name }}">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <div class="mb-4">
                    <label for="name" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                        : </label>
                    <p class="text-base">{{ auth()->user()->name }}</p>
                </div>
                <div class="mb-4">
                    <label for="kritik" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Kritik
                    </label>
                    <textarea id="kritik" rows="4"
                        class="block p-2.5 w-full text-base text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                        placeholder="Masukkan Kritik anda di sini" name="kritik"></textarea>
                </div>
                <div class="mb-4">
                    <label for="Saran" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Saran
                    </label>
                    <textarea id="Saran" rows="4"
                        class="block p-2.5 w-full text-base text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                        placeholder="Masukkan Saran anda di sini" name="saran"></textarea>
                </div>
                <button type="submit"
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Kirim</button>
            </form>
        </div>
        <div class="">
            <p class="text-3xl fs-outfit mb-4">Kritik dan saran yang anda tulis</p>
            @foreach ($kritik as $item)
                <div class="mb-3 mt-3">
                    <div class="flex gap-4">
                        <p class="text-base">
                            &#64;{{ $item->nama }} &#183;
                            <span
                                class="text-gray-500">{{ strftime('%e %B %Y, %H:%M', strtotime($item->created_at)) }}</span>
                        </p>
                        @if ($item->user_id === auth()->user()->id)
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
                                                    ingin menghapus Komentar ini?</h3>
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
                            <div>
                                <i class="bi bi-pencil-fill text-yellow-300 hover:cursor-pointer hover:text-yellow-400"
                                    data-modal-target="edit-item-modal-{{ $item->id }}"
                                    data-modal-toggle="edit-item-modal-{{ $item->id }}"></i>
                                <div id="edit-item-modal-{{ $item->id }}" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Edit Kritik dan Saran
                                                </h3>
                                                <button type="button"
                                                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="edit-item-modal-{{ $item->id }}">
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
                                            <div class="p-4 md:p-5">
                                                <form class="space-y-4" action="/kritikdansaran/edit" method="post">
                                                    @csrf
                                                    <input type="hidden" name="kritik_id"
                                                        value="{{ $item->id }}">
                                                    <div>
                                                        <label for="kritik"
                                                            class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Kritik
                                                        </label>
                                                        <textarea id="kritik" rows="4"
                                                            class="block p-2.5 w-full text-base text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                                            placeholder="Masukkan Kritik anda di sini" name="kritik">{{ $item->kritik }}</textarea>
                                                    </div>
                                                    <div>
                                                        <label for="saran"
                                                            class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Saran
                                                        </label>
                                                        <textarea id="saran" rows="4"
                                                            class="block p-2.5 w-full text-base text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                                            placeholder="Masukkan saran anda di sini" name="saran">{{ $item->saran }}</textarea>
                                                    </div>

                                                    <button type="submit"
                                                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan
                                                        Perubahan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <p class="text-base text-gray-700"><span class="font-bold">Kritik</span> :{{ $item->kritik }}
                    </p>
                    <p class="text-base text-gray-700"><span class="font-bold">Saran</span> :{{ $item->saran }}
                    </p>
                    <hr class="mt-3">
                </div>
            @endforeach
        </div>
    </div>

    @include('components/footer')
</body>

</html>
