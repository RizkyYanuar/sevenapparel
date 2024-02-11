<div class="navbar">
    <navbar class="">
        <div class="navbar w-full h-16 bg-[#deeceb] fs-poppins flex flex-row">
            <div class="basis-3/12 flex justify-center items-center">
                <p class="text-2xl">Seven Apparel.</p>
            </div>
            <div class="basis-3/6 flex justify-center items-center gap-6 text-base relative">
                <a href="" class="nav-link">Home</a>
                <a href="" class="nav-link">Product</a>
                <a href="" class="nav-link">Categories</a>
                <a href="" class="nav-link">About</a>
                <a href="" class="nav-link">Get in Touch</a>
            </div>
            <div class="basis-3/12 flex justify-center items-center gap-6">
                <i class="bi bi-search text-2xl"></i>
                <i class="bi bi-person-fill text-2xl"></i>
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
