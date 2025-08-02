<x-guest-layout>
    <section class="max-w-5xl mx-auto py-12 relative text-center text-white">
        <img class="w-full mx-auto rounded-lg brightness-50" src="https://almodina.com.bd/storage/app/public/banner/banners-1742051946.jpg" alt="" />
        <div class="flex flex-col items-center justify-center absolute inset-0">
            <h1 class="text-3xl font-semibold">Your Personal Service Solution</h1>
            <p class="text-lg">One-stop solution for your services. Order any service, anytime, anywhere.</p>
        </div>
    </section>
    @if($categories->count() > 0)
    <section class="max-w-4xl mx-auto -mt-20">
        <div class="grid grid-cols-6 gap-4">
            @foreach($categories as $category)
            <a href="{{ route('categories', $category->slug) }}" class="block shadow-md rounded-lg overflow-hidden relative transition transform duration-700 hover:shadow-xl">
                <img class="w-full mx-auto" src="{{ $category->thumbnail }}" alt="" />
                <div class="flex flex-col items-center px-3 py-3 text-center">
                    <span class="line-clamp-2 text-sm">{{ $category->name }}</span>
                </div>
            </a>
            @endforeach
        </div>
    </section>
    @endif
    @if($services->count() > 0)
    <section class="max-w-5xl mx-auto py-12">
        <h1 class="text-xl">Trending Services</h1>
        <p class="">Provide you with the fastest service in less time.</p>
        <div class="grid grid-cols-4 gap-6 mt-6">
            @foreach($services as $service)
            <a href="{{ $service->url }}" class="border border-gray-100 transition transform duration-700 hover:shadow-xl rounded-lg overflow-hidden relative">
                <img class="w-full mx-auto" src="{{ $service->thumbnail }}" alt="" />
                <div class="px-3 py-3">
                    <p class="font-semibold text-gray-900 truncate">{{ $service->name }}</p>
                    <div class="flex justify-between gap-x-3">
                        <p class="text-sm">Start From {{ $service->price }} Tk</p>
                        <p class="text-sm text-gray-900 flex items-center">
                            <i class="fa-solid fa-star text-xs text-yellow-400">&nbsp;</i>
                            <span>4.7</span>
                        </p>
                    </div>
                </div>
                <span class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 text-xs rounded">10% off Tk. 299</span>
            </a>
            @endforeach
        </div>
    </section>
    @endif
    <section class="max-w-5xl mx-auto py-12">
        <img class="w-full rounded-lg mx-auto" src="{{ asset('assets/safety.png') }}" alt="" />
        <div class="grid w-full grid-cols-12 items-start gap-x-6">
            <div class="col-span-5">
                <div class="ps-12 py-12">
                    <h1 class="text-xl mb-6">We Care About The Quality And Safety...</h1>
                    <p class="">We Belive that priority of caution is mandatory.</p>
                </div>
            </div>
            <div class="col-span-7">
                <span class="font-semibold text-white bg-red-500 px-4 py-3 rounded-full inline-block">Ensuring Mask</span>
                <span>24/7 Support</span>
                <span>Sanitizing Hands & Equipment</span>
                <span>Safety Kit</span>
            </div>
        </div>
    </section>
    <section class="max-w-screen-xl mx-auto py-12 px-6">
        <h1 class="text-xl">Our values drive us to the highest.</h1>
        <p class="">We provide our services with a priority of quality. Which considers the clients happiness.</p>
        <dl class="mt-6 grid grid-cols-4 gap-6">
            <div class="flex flex-col-reverse gap-1">
                <dt class="">Order Served</dt>
                <dd class="text-xl font-semibold tracking-tight">2547+</dd>
            </div>
            <div class="flex flex-col-reverse gap-1">
                <dt class="">Service Providers</dt>
                <dd class="text-xl font-semibold tracking-tight">1532+</dd>
            </div>
            <div class="flex flex-col-reverse gap-1">
                <dt class="">Clients Reviews</dt>
                <dd class="text-xl font-semibold tracking-tight">4.9</dd>
            </div>
            <div class="flex flex-col-reverse gap-1">
                <dt class="">Years of Experience</dt>
                <dd class="text-xl font-semibold tracking-tight">10+</dd>
            </div>
        </dl>
    </section>
    <section class="max-w-screen-xl mx-auto py-12 px-6">
        <div class="grid w-full grid-cols-12 items-start">
            <img class="w-full rounded-lg mx-auto col-span-5" src="{{ asset('assets/safety.png') }}" alt="" />
            <div class="col-span-7 ml-10">
                <h1 class="text-xl">3 Easiest steps to get a service.</h1>
                <p class="">Provide you with the fastest service in less time.</p>
                <div class="space-y-2 mt-6">
                    <div class="py-3">
                        <h1 class="text-xl">Pick your wishes service</h1>
                        <p class="">Select the service you wish to order from the website or app.</p>
                    </div>
                    <div class="py-3">
                        <h1 class="text-xl">Pick your schedule</h1>
                        <p class="">Choose a date and time that is convenient for the service provider and you.</p>
                    </div>
                    <div class="py-3">
                        <h1 class="text-xl">Place your order</h1>
                        <p class="">Place the order. We'll deliver the fastest service provider's schedule for you.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="max-w-screen-xl mx-auto py-12 px-6">
        <h1 class="text-xl">Our clients trust and love us</h1>
        <p class="">We are truly gratful for their love.</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div class="">
                <h3 class="font-medium">Emma Stone</h3>
                <div class="flex text-yellow-400">★★★★★</div>
                <p class="">Lorem ipsum dolor sit amet, Non ratione qua qui sapiente dolor ea facilis molestias laborem esse vel</p>
            </div>
            <div class="">
                <h3 class="font-medium">Emma Stone</h3>
                <div class="flex text-yellow-400">★★★★★</div>
                <p class="">Lorem ipsum dolor sit amet, Non ratione qua qui sapiente dolor ea facilis molestias laborem esse vel</p>
            </div>
            <div class="">
                <h3 class="font-medium">Emma Stone</h3>
                <div class="flex text-yellow-400">★★★★★</div>
                <p class="">Lorem ipsum dolor sit amet, Non ratione qua qui sapiente dolor ea facilis molestias laborem esse vel</p>
            </div>
        </div>
    </section>
    <section class="max-w-screen-xl mx-auto py-12 px-6 relative">
        <div class="max-w-xl pb-32">
            <h2 class="text-xl font-semibold tracking-tight mb-10">Download Our App</h2>
            <p class="">Enjoy our smart solutions to make your life easier. Download our latest app from the Play Store. Confirm your location and place an order by selecting services We are always conscious of delivering fast and quality service to you. We are always conscious of delivering fast and quality service to you.</p>
            <a href="#" class="rounded-md px-3.5 py-2.5 mt-6 inline-block bg-gray-900 text-white">Download</a>
        </div>
        <img class="absolute top-0 right-0 w-auto" src="{{ asset('assets/app.png') }}" alt="App screenshot" width="1824" height="1080">
    </section>
</x-guest-layout>