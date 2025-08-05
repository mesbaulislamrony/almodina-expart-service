<footer class="bg-green-700 text-white">
    <div class="max-w-5xl mx-auto py-12 px-5">
        <p class="text-white font-semibold">Follow Us</p>
        <div class="flex gap-3 mb-6">
            <span class="">Facebook</span>
            <span class="">Instagram</span>
            <span class="">Twitter</span>
            <span class="">Youtube</span>
        </div>
        <div class="grid grid-cols-4 gap-10 text-left">
            <div class="col-span-2">
                <p class="text-white text-lg font-semibold">Join as a provider</p>
                <p class="text-white">Joining as a provider will boost your range of work. We are always dedicated to maximizing your earnings.</p>
                <x-link-button href="" class="inline-flex mt-4 border border-white hover:bg-white hover:text-green-700">
                    <span class="me-2">{{ __('More Details') }}</span><i class="fa-solid fa-arrow-up-right-from-square">&nbsp;</i>
                </x-link-button>
            </div>
            <div class="flex flex-col space-y-3 text-end">
                <span class="">Support</span>
                <span class="">Faq</span>
                <span class="">About Us</span>
            </div>
            <div class="flex flex-col space-y-3 text-end">
                <span class="">Contact</span>
                <span class="">Our Blog</span>
                <span class="">Careers</span>
            </div>
        </div>
        <div class="flex items-center pt-6">
            <div class="flex flex-grow">
                <span class="">Copyright 2022, {{ config('app.name', 'Laravel') }}. All Rights Reserved.</span>
            </div>
            <div class="flex justify-end items-center space-x-6">
                <span class="cursor-pointer">Privacy Policy</span>
                <span class=" cursor-pointer">Terms of Use</span>
                <span class=" cursor-pointer">Pricing</span>
            </div>
        </div>
    </div>
</footer>