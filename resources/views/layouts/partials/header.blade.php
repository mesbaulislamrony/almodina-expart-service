<header class="bg-white py-3 fixed z-50 top-0 left-0 w-full shadow-md transition duration-500">
    <nav class="flex justify-between items-center gap-x-3 px-5 max-w-5xl mx-auto">
        <a href="{{ route('welcome') }}" class="flex-none">
            <img src="/assets/images/logo.png" class="h-8" alt="almodina Logo" />
        </a>
        <div class="flex-1 px-6" style="display: none;">
            <form class="flex items-center gap-x-4">
                <button type="button" class="inline-block items-center px-3 py-2.5 rounded-lg font-semibold border border-green-700 text-gray-900 hover:bg-green-700 hover:text-white text-center transition ease-in-out duration-150">{{ __('Dhaka') }}</button>
                <div class="relative w-full">
                    <input id="text" class="block w-full border-gray-300 border border-green-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="search" name="search" :value="old('search')" placeholder="Find your service here e.g. AC, Car, Facial etc . . ." />
                    <x-primary-button class="absolute inset-y-0 end-0 flex items-center px-6 bg-green-700 hover:bg-green-800 text-white">
                        <i class="fa-solid fa-search"></i>
                    </x-primary-button>
                </div>
            </form>
        </div>
        <div class="flex justify-between items-center space-x-6">
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
                <img class="w-8 h-8 rounded-full" src="{{ \Illuminate\Support\Facades\Auth::user()->thumbnail }}" alt="" />
                <div class="font-medium">
                    <div class="">{{ \Illuminate\Support\Facades\Auth::user()->name }}</div>
                    <div class="text-gray-500">Orders & Account</div>
                </div>
            </a>
            @endif
        </div>
    </nav>
</header>