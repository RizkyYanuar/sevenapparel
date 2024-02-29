<div class="navbar">
    <navbar class="">
        <div class="navbar w-full h-16 bg-[#deeceb] fs-poppins flex flex-row">
            <div class="basis-3/12 flex justify-center items-center">
                <p class="text-2xl">Seven Apparel.</p>
            </div>
            <div class="basis-3/6 flex justify-center items-center gap-6 text-base relative">
                <a href="/home" class="nav-link">Home</a>
                <a href="/home#featured-product" class="nav-link">Product</a>
                <a href="" class="nav-link">Categories</a>
                <a href="/home#about" class="nav-link">About</a>
                <a href="" class="nav-link">Get in Touch</a>
            </div>

            <div class="basis-3/12 flex justify-center items-center gap-6">
                @if (auth()->user()->roles === 'admin')
                    <div> <i class="bi bi-list text-2xl hamburger-menu hover:cursor-pointer"></i>
                    </div>
                    <div class="admin-panel w-80 bg-white absolute right-56 top-9 hidden rounded-sm z-20">
                        <p class="text-base font-bold p-2">Admin Panel</p>
                        <a href="/users/changerole" class="block p-3 hover:bg-slate-100 w-full text-left text-sm">
                            <button type="button">Ubah Role User</button></a>
                        <span class="block w-full h-0.5 bg-slate-400 "></span>
                        <a href="/product/createproduct" class="block p-3 hover:bg-slate-100 w-full text-left text-sm">
                            <button type="button">Tambah Produk</button></a>
                    </div>
                @endif
                <a href="/user/profile"> <i class="bi bi-person-fill text-2xl"></i>
                </a>
                <i class="bi bi-cart2 text-2xl"></i>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="btn underline hover:text-blue-500 duration-100">
                        {{ __('Logout') }}
                    </button>
                </form>
            </div>
        </div>
    </navbar>
</div>
