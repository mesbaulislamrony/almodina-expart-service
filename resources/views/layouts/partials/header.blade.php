<header class="bg-white fixed z-50 top-0 left-0 w-full shadow-md transition duration-500">
    <nav class="grid w-full grid-cols-5 items-center py-3 px-5 max-w-5xl mx-auto">
        <a href="{{ route('welcome') }}" class="flex items-center">
            <img src="/assets/images/logo.png" class="h-8" alt="almodina Logo" />
        </a>
        <div class="col-span-4 flex items-center justify-end space-x-6 text-xs">
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