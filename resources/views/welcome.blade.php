<x-guest-layout>
    <section class="max-w-5xl mx-auto pt-2 mb-6 px-5 relative text-center">
        <img class="w-full mx-auto rounded-lg brightness-50" src="{{ asset('assets/images/banner.png') }}" alt="" />
        <div class="flex flex-col items-center justify-center absolute inset-0 text-white ">
            <h1 class="text-2xl font-semibold">Your Personal Service Solution</h1>
            <p class="text-white">One-stop solution for your services. Order any service, anytime, anywhere.</p>
        </div>
    </section>
    <section class="max-w-5xl mx-auto px-5">
        @if($categories->count() > 0)
        <div class="max-w-3xl mx-auto -mt-12">
            <div class="grid grid-cols-6 gap-3">
                @foreach($categories as $category)
                <a href="{{ route('categories', $category->slug) }}" class="bg-white border border-neutral-100 transition transform duration-700 hover:shadow-xl rounded-xl overflow-hipen relative p-1">
                    <img class="w-full mx-auto rounded-lg" src="{{ $category->thumbnail }}" alt="" />
                    <div class="px-3 py-3 text-center">
                        <span class="line-clamp-2 text-xs">{{ $category->name }}</span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </section>
    @if($services->count() > 0)
    <section class="max-w-5xl mx-auto px-5 py-6">
        <h1 class="text-lg font-semibold mb-3">Trending Services</h1>
        <div class="grid grid-cols-4 gap-3">
            @foreach($services as $service)
                <x-service-card-component :service="$service" />
            @endforeach
        </div>
    </section>
    @endif
    @if($popular->count() > 0)
    <section class="max-w-5xl mx-auto px-5 py-6">
        <h1 class="text-lg font-semibold mb-3">Popular Services</h1>
        <div class="grid grid-cols-4 gap-3">
            @foreach($popular as $service)
                <x-service-card-component :service="$service" />
            @endforeach
        </div>
    </section>
    @endif
    <section class="max-w-5xl mx-auto px-5 py-6">
        <img class="h-72 rounded-lg -mb-52" src="{{ asset('assets/images/safety-first.png') }}" alt="" />
    </section>
    <section class="bg-green-700 pt-48 text-white">
        <div class="max-w-5xl pt-6 pb-12 px-20 mx-auto relative">
            <div class="grid grid-cols-2 gap-12">
                <h1 class="text-2xl font-semibold mb-6">We care about the quality and safety...</h1>
                <div class=""></div>
            </div>
            <div class="grid grid-cols-2 gap-12">
                <div class="">
                    <p class="text-white">We believe that priority of caution is mandatory. We provide our services with a priority of quality. Which considers the clients happiness.</p>
                    <x-secondary-button-link href="" class="mt-4">
                        <span class="me-2">{{ __('More Details') }}</span><i class="fa-solid fa-arrow-up-right-from-square">&nbsp;</i>
                    </x-secondary-button-link>
                </div>
                <div class="item-center">
                    <ul class="flex flex-wrap gap-y-3 text-sm font-medium text-center text-gray-500">
                        <li class="me-2">
                            <div class="flex gap-2 items-center bg-white px-5 rounded-full h-10">
                                <img class="h-5 inline-block" src="{{ asset('assets/images/masks.svg') }}"/>
                                <span class="text-sm">Ensuring Mask</span>
                            </div>
                        </li>
                        <li class="me-2">
                            <div class="flex gap-2 items-center bg-white px-5 rounded-full h-10">
                                <img class="h-5 inline-block" src="{{ asset('assets/images/support.svg') }}"/>
                                <span class="text-sm">24/7 Support</span>
                            </div>
                        </li>
                        <li class="me-2">
                            <div class="flex gap-2 items-center bg-white px-5 rounded-full h-10">
                                <img class="h-5 inline-block" src="{{ asset('assets/images/sanitizing.svg') }}"/>
                                <span class="text-sm">Sanitizing Hands & Equipment</span>
                            </div>
                        </li>
                        <li class="me-2">
                            <div class="flex gap-2 items-center bg-white px-5 rounded-full h-10">
                                <img class="h-5 inline-block" src="{{ asset('assets/images/safety.svg') }}"/>
                                <span class="text-sm">Safety Kit</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="max-w-5xl mx-auto px-5 py-12">
        <div class="grid grid-cols-2">
            <dl class="mt-6 grid grid-cols-2 gap-6 text-center">
                <div class="flex flex-col-reverse gap-1">
                    <p class="">Order Served</p>
                    <p class="text-2xl font-bold text-green-700">2547+</p>
                </div>
                <div class="flex flex-col-reverse gap-1">
                    <p class="">Service Providers</p>
                    <p class="text-2xl font-bold text-green-700">1532+</p>
                </div>
                <div class="flex flex-col-reverse gap-1">
                    <p class="">Clients Reviews</p>
                    <p class="text-2xl font-bold text-green-700">4.9</p>
                </div>
                <div class="flex flex-col-reverse gap-1">
                    <p class="">Years of Experience</p>
                    <p class="text-2xl font-bold text-green-700">10+</p>
                </div>
            </dl>
            <div class="ps-12">
                <h1 class="text-2xl font-bold mb-6">Our values drive us to the highest</h1>
                <h2 class="font-semibold mb-6">We provide our services with a priority of quality. which considers the client's happiness.</h2>
                <p class="">Ah, got it! You're looking for group button titles for a user profile section — something like tabs or categories that organize different parts of a user's profile.</p>
                <x-primary-button-link href="" class="mt-4">
                    <span class="me-2">{{ __('More Details') }}</span><i class="fa-solid fa-arrow-up-right-from-square">&nbsp;</i>
                </x-primary-button-link>
            </div>
        </div>
    </section>
    <section class="max-w-5xl mx-auto px-5 py-12">
        <div class="grid grid-cols-2 gap-6">
            <img class="w-full" src="{{ asset('assets/images/easiest-steps.png') }}" alt="App screenshot">
            <div class="">
                <h1 class="text-2xl font-bold">3 easiest steps to get a service</h1>
                <p class="mb-3">Provide you with the fastest service in less time.</p>
                <div class="bg-white px-3 py-3 rounded-xl mb-3">
                    <div class="flex items-center">
                        <div class="flex shrink-0 items-center justify-center rounded-full bg-green-700 text-white mx-0 size-10">
                            <span class="text-lg font-bold">1</span>
                        </div>
                        <div class="ml-6 text-left">
                            <h3 class="text-sm font-semibold">Select a service</h3>
                            <p class="">Select the service you wish to order from the website or app. from the website or app.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white px-3 py-3 rounded-xl mb-3">
                    <div class="flex items-center">
                        <div class="flex shrink-0 items-center justify-center rounded-full bg-green-700 text-white mx-0 size-10">
                            <span class="text-lg font-bold">2</span>
                        </div>
                        <div class="ml-6 text-left">
                            <h3 class="text-sm font-semibold">Pick your schedule</h3>
                            <p class="">Choose a date and time that is convenient for the service provider and you.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white px-3 py-3 rounded-xl mb-3">
                    <div class="flex items-center">
                        <div class="flex shrink-0 items-center justify-center rounded-full bg-green-700 text-white mx-0 size-10">
                            <span class="text-lg font-bold">3</span>
                        </div>
                        <div class="ml-6 text-left">
                            <h3 class="text-sm font-semibold">Place your order</h3>
                            <p class="">Place the order. We’ll deliver the fastest service provider’s schedule for you.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white py-12">
        <div class="max-w-5xl mx-auto px-5 text-center">
            <h1 class="text-2xl font-bold">Our clients trust and love us</h1>
            <p class="">We are truly gratful for their love.</p>
            <div class="grid grid-cols-3 gap-6 mt-12">
                <div class="bg-gray-100 px-6 py-6 rounded-lg">
                    <img class="w-12 h-12 rounded-full mx-auto -mt-12 bg-gray-100 border" src="{{ asset('assets/thumbnail.png') }}" alt="User Image" />
                    <p class="my-4">Lorem ipsum dolor sit amet, Non ratione qua qui sapiente dolor ea facilis molestias laborem esse vel</p>
                    <h3 class="font-semibold">Emma Stone</h3>
                    <p class="">AVP Finance Triangle East</p>
                </div>
                <div class="bg-gray-100 px-6 py-6 rounded-lg">
                    <img class="w-12 h-12 rounded-full mx-auto -mt-12 bg-gray-100 border" src="{{ asset('assets/thumbnail.png') }}" alt="User Image" />
                    <p class="my-4">Lorem ipsum dolor sit amet, Non ratione qua qui sapiente dolor ea facilis molestias laborem esse vel</p>
                    <h3 class="font-semibold">Emma Stone</h3>
                    <p class="">AVP Finance Triangle East</p>
                </div>
                <div class="bg-gray-100 px-6 py-6 rounded-lg">
                    <img class="w-12 h-12 rounded-full mx-auto -mt-12 bg-gray-100 border" src="{{ asset('assets/thumbnail.png') }}" alt="User Image" />
                    <p class="my-4">Lorem ipsum dolor sit amet, Non ratione qua qui sapiente dolor ea facilis molestias laborem esse vel</p>
                    <h3 class="font-semibold">Emma Stone</h3>
                    <p class="">AVP Finance Triangle East</p>
                </div>
            </div>
        </div>
    </section>
    <section class="max-w-3xl mx-auto px-5 py-12 text-center">
        <h1 class="text-2xl font-bold">Our Key Clients</h1>
        <p class="">We have provided quality services to 1,700+ clients.</p>
        <div class="flex flex-wrap justify-center gap-3 mt-6">
            <img class="h-6 inline-block" src="{{ asset('assets/images/gonsin.png') }}" alt="Client Logo">
            <img class="h-6 inline-block" src="{{ asset('assets/images/i2s.png') }}" alt="Client Logo">
            <img class="h-6 inline-block" src="{{ asset('assets/images/kodak-alaris.png') }}" alt="Client Logo">
            <img class="h-6 inline-block" src="{{ asset('assets/images/piql.png') }}" alt="Client Logo">
            <img class="h-6 inline-block" src="{{ asset('assets/images/kodak-alaris.png') }}" alt="Client Logo">
            <img class="h-6 inline-block" src="{{ asset('assets/images/i2s.png') }}" alt="Client Logo">
            <img class="h-6 inline-block" src="{{ asset('assets/images/gonsin.png') }}" alt="Client Logo">
            <img class="h-6 inline-block" src="{{ asset('assets/images/kodak-alaris.png') }}" alt="Client Logo">
            <img class="h-6 inline-block" src="{{ asset('assets/images/piql.png') }}" alt="Client Logo">
            <img class="h-6 inline-block" src="{{ asset('assets/images/kodak-alaris.png') }}" alt="Client Logo">
            <img class="h-6 inline-block" src="{{ asset('assets/images/i2s.png') }}" alt="Client Logo">
        </div>
    </section>
    <section class="max-w-4xl mx-auto pt-12">
        <div class="grid grid-cols-3 gap-6">
            <img class="w-80" src="{{ asset('assets/images/app.png') }}" alt="App screenshot">
            <div class="col-span-2 py-12 px-6">
                <h2 class="text-2xl font-semibold mb-3">Download Our App</h2>
                <p class="font-semibold mb-3">Enjoy our smart solutions to make your life easier.</p>
                <p class="">Download our latest app from the Play Store. Confirm your location and place an order by selecting services We are always conscious of delivering fast and quality service to you.</p>
                <a href="#" class="mt-6 inline-block">
                    <img class="inline-block w-32 me-2" src="{{ asset('assets/images/google-play-store.png') }}" alt="Google Play Store">
                </a>
            </div>
        </div>
    </section>
</x-guest-layout>