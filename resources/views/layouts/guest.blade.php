<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased" style="margin-top: 78px">
    @include('layouts.partials.header')
    {{ $slot }}
    <form action="{{ route('subscribe.store') }}" method="post" class="max-w-screen-xl mx-auto py-12 px-6">
        @csrf
        <div class="grid grid-cols-2 gap-x-8 gap-y-10">
            <div class="max-w-lg">
                <h2 class="text-xl">Subscribe to our newsletter</h2>
                <p class="">Nostrud amet eu ullamco nisi aute in ad minim nostrud adipisicing velit quis. Duis tempor incididunt dolore.</p>
                <div class="mt-6 flex max-w-md gap-x-4">
                    <label for="email-address" class="sr-only">Email address</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required class="min-w-0 flex-auto rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" placeholder="Enter your email">
                    <button type="submit" class="flex-none rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Subscribe</button>
                </div>
            </div>
            <dl class="grid grid-cols-2 gap-x-8 gap-y-10">
                <div class="flex flex-col items-start">
                    <dt class="font-semibold">Weekly articles</dt>
                    <dd class="">Non laboris consequat cupidatat laborum magna. Eiusmod non irure cupidatat duis commodo amet.</dd>
                </div>
                <div class="flex flex-col items-start">
                    <dt class="font-semibold">No spam</dt>
                    <dd class="">Officia excepteur ullamco ut sint duis proident non adipisicing. Voluptate incididunt anim.</dd>
                </div>
            </dl>
        </div>
    </form>
    @include('layouts.partials.footer')
</body>

</html>