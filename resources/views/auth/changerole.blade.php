<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Role</title>
    @vite(['resources/css/tailwind.css', 'resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    @include('components/navbar')
    @include('components/alerts')
    <div class="flex items-center justify-center py-12 w-screen fs-poppins">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-[#deeceb] dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jenis Kelamin
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No Telp
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4 capitalize">
                                {{ $user->jenis_kelamin }}
                            </td>
                            <td class="px-6 py-4 capitalize">
                                {{ $user->no_telp }}
                            </td>
                            <td class="px-6 py-4 capitalize">
                                {{ $user->roles }}
                            </td>
                            <td class="px-6 py-4 capitalize">
                                {{ $user->status }}
                            </td>
                            @if ($user->status === 'Pending' && $user->roles !== 'admin')
                                <td class="px-6 py-4 text-right">
                                    <a href="/users/{{ $user->id }}/changerole"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer duration-100">
                                        Approve
                                    </a>
                                </td>
                            @else
                                <td class="px-6 py-4 text-right">
                                    <a href="/users/{{ $user->id }}/changerole"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer duration-100">
                                        Ubah
                                    </a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
    @isset($usercrole)
        <p class="hidden" data-modal-target="crud-modal" data-modal-toggle="crud-modal"></p>
        <div id="crud-modal" tabindex="-1"
            class="overflow-y-auto overflow-x-hidden fixed flex z-50 justify-center items-center w-full md:inset-0 h-full max-h-full bg-gray-700/50 fs-poppins">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Approve User
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" method="post" action="/users/{{ $usercrole->id }}/changeroleprocess">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <p class="text-base text-gray-900 capitalize">Nama User: {{ $usercrole->name }}</p>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="roles"
                                    class="block mb-2 text-base font-medium text-gray-900 dark:text-white">User
                                    Role</label>
                                <select id="roles"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 capitalize"
                                    name="roles">
                                    <option value="guest" {{ $usercrole->roles === 'guest' ? 'selected' : '' }}>
                                        Guest</option>
                                    <option value="user" {{ $usercrole->roles === 'user' ? 'selected' : '' }}>User
                                    </option>
                                    <option value="admin" {{ $usercrole->roles === 'admin' ? 'selected' : '' }}>
                                        Admin</option>
                                </select>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="status"
                                    class="block mb-2 text-base font-medium text-gray-900 dark:text-white">User
                                    Status</label>
                                <select id="status"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 capitalize"
                                    name="status">
                                    <option value="Pending" {{ $usercrole->status === 'Pending' ? 'selected' : '' }}>
                                        Pending
                                    </option>
                                    <option value="Aktif" {{ $usercrole->status === 'Aktif' ? 'selected' : '' }}>Aktif
                                    </option>
                                    <option value="Nonaktif" {{ $usercrole->status === 'Nonaktif' ? 'selected' : '' }}>
                                        Nonaktif
                                    </option>
                                </select>
                            </div>

                        </div>
                        <button type="submit"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Approve
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endisset
</body>

</html>
