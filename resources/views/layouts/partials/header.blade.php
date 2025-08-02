<header class="bg-white fixed z-50 top-0 left-0 w-full shadow-md transition duration-500">
    <nav class="grid w-full grid-cols-3 items-center py-3 max-w-5xl mx-auto">
        <a href="{{ route('welcome') }}" class="flex items-center inline-block">
            <img src="/assets/logo.jpg" class="h-12" alt="Flowbite Logo" />
        </a>
        <form class="">
            <label for="default-search" class="mb-2 text-sm font-medium sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Search Mockups, Logos..." required />
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
            </div>
        </form>
        <div class="flex items-center justify-end space-x-6">
            <a href="">Get Help</a>
            @if(!auth()->check())
            <div class="relative flex items-center gap-x-4">
                <i class="fa-regular fa-user"></i>
                <a href="{{ route('login') }}" class="block text-sm/6 leading-5">
                    <p class="text-xs text-gray-900 mb-0">Welcome</p>
                    <p class="font-semibold text-gray-600">Login Or Sign Up</p>
                </a>
            </div>
            @endif
            @if(auth()->check())
            <a href="{{ route('booking.index') }}" class="flex items-center gap-3">
                <img class="w-8 h-8 rounded-full" src="{{ auth()->user()->image }}" alt="" />
                <div class="font-medium">
                    <div class="text-sm">{{ auth()->user()->name }}</div>
                    <div class="text-xs text-gray-500">Orders & Account</div>
                </div>
            </a>
            @endif
        </div>
    </nav>
</header>