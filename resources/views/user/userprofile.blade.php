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
    <div class="w-full bg-[#deeceb] p-16 grid grid-cols-2 fs-poppins gap-6">
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
                        <img src="{{ asset('storage/' . auth()->user()->user_image) }}" alt="">
                    @else
                        <img src="{{ asset('storage/userimg/defaultuser.png') }}" alt="">
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
                <p class="flex text-base gap-x-20">Role</p>
                <span class="text-gray-600">{{ auth()->user()->roles }}</span>
            </div>
            <hr>
        </div>
    </div>

    @include('components/footer')
</body>

</html>
