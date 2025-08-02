<footer class="max-w-screen-xl mx-auto pt-12 px-6">
    <div class="grid grid-cols-5 gap-10 text-left">
        <div class="flex flex-grow col-span-2">
            <div><img class="w-32" src="/assets/logo.jpg" alt="logo" /></div>
        </div>
        <div class="flex flex-col space-y-3">
            <span class="">About Us</span>
            <span class="">Our Blog</span>
            <span class="">Careers</span>
            <a href=""><span class="">For Business</span></a>
        </div>
        <div class="flex flex-col space-y-3">
            <span class="">Support</span>
            <span class="">Faq</span>
            <span class="">Payment Method</span>
            <span class="">Contact</span>
        </div>
        <div class="flex flex-col space-y-3">
            <span class="">Facebook</span>
            <span class="">Instagram</span>
            <span class="">Twitter</span>
            <span class="">Youtube</span>
        </div>
    </div>
    <div class="flex items-center py-6">
        <div class="flex flex-grow">
            <span class="">Developed by {{ config('app.name', 'Laravel') }}</span>
        </div>
        <div class="flex justify-end items-center space-x-6">
            <span class=" cursor-pointer">Privacy Policy</span><span class=" cursor-pointer">Terms of Use</span><span class=" cursor-pointer">Pricing</span>
        </div>
    </div>
</footer>