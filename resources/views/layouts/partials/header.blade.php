<header class="bg-white fixed z-50 top-0 left-0 w-full shadow-md transition duration-500">
    <nav class="grid w-full grid-cols-3 items-center py-3 px-5 max-w-5xl mx-auto">
        <a href="{{ route('welcome') }}" class="flex items-center">
            <img src="/assets/images/logo.png" class="h-8" alt="almodina Logo" />
        </a>
        <form class="">
            <label for="default-search" class="mb-2 font-semibold sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-1 flex items-center ps-2 pointer-events-none">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search" class="block w-full p-2 ps-10 border border-neutral-300 rounded-lg focus:ring-neutral-300 text-sm" placeholder="Search Mockups, Logos..." required />
                <button type="submit" class="text-white absolute right-0 inset-y-0 bg-green-700 hover:bg-green-800 font-semibold rounded-lg px-4">Search</button>
            </div>
        </form>
        <div class="flex items-center justify-end space-x-6 text-xs">
            <a href="" class="">Get Help</a>
            @if(!auth()->check())
            <div class="relative flex items-center gap-x-4">
                <i class="fa-regular fa-user"></i>
                <a href="{{ route('login') }}" class="block">
                    <p class="mb-0 text-neutral-900">Welcome</p>
                    <p class="font-semibold text-neutral-900">Login/Signup</p>
                </a>
            </div>
            @endif
            @if(auth()->check())
            <a href="{{ route('booking.index') }}" class="flex items-center gap-3">
                <img class="w-8 h-8 rounded-full" src="{{ auth()->user()->thumbnail }}" alt="" />
                <div class="font-medium">
                    <div class="">{{ auth()->user()->name }}</div>
                    <div class="text-gray-500">Orders & Account</div>
                </div>
            </a>
            @endif
        </div>
    </nav>
</header>