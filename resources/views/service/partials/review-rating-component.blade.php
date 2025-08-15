<div class="bg-white p-4 rounded-lg max-w-xl">
    <h1 id="reviews" class="text-lg font-semibold mb-4">Customer reviews & rating</h1>
    @if($service->reviews->count() > 0)
    @foreach($service->reviews as $review)
    <article class="flex flex-col items-start justify-between my-6">
        <div class="flex items-center gap-x-4">
            <time datetime="{{ $review->created_at }}" class="text-gray-400">{{ $review->created_at }}</time>
            <div x-data="{ rating: {{ $review->rating }} }" class="flex items-center mb-1 space-x-1 text-lg">
                <template x-for="star in 5" :key="star">
                    <span :class="{'text-yellow-500': star <= Math.floor(rating), 'text-gray-300': star > rating, 'text-yellow-300': star > Math.floor(rating) && star <= rating }">★</span>
                </template>
            </div>
        </div>
        <p class="line-clamp-3 text-sm/6 text-gray-900">{{ $review->comment }}</p>
        <div class="flex items-center mt-1">
            <img class="w-10 h-10 me-4 rounded-full" src="{{ $review->customer->thumbnail }}" alt="">
            <div class="">
                <p class="font-semibold">{{ $review->customer->name }}</p>
                <p class="text-sm text-gray-400">Joined on {{ $review->customer->created_at }}</p>
            </div>
        </div>
    </article>
    @endforeach
    @endif
    <form action="{{ route('reviews.store', $service->slug) }}" method="post" class="py-4 px-4 bg-white rounded-lg relative text-center">
        @csrf
        <h1 class="text-lg font-semibold mb-3">Your opinion metters to us!</h1>
        <p class="mb-1">How was quality of this service?</p>
        <div x-data="{rating: 0,hoverRating: 0,setRating(value) { this.rating = value },setHover(value) { this.hoverRating = value }}" class="flex justify-center gap-1 text-xl text-gray-300 mb-3">
            <template x-for="star in 5" :key="star">
                <button type="button" @click="setRating(star)" @mouseover="setHover(star)" @mouseleave="setHover(0)" :class="{'text-yellow-500': star <= hoverRating || (hoverRating === 0 && star <= rating),'text-gray-300': star > hoverRating && star > rating}">★</button>
            </template>
            <!-- Hidden input for form submission -->
            <input type="hidden" name="rating" x-model="rating">
        </div>
        <div class="mb-3">
            <textarea id="comment" name="comment" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm" placeholder="{{ __('Write your review here') }}">{{ old('comment') }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('comment')" />
        </div>
        <x-primary-button class="w-full">
            {{ __('Submit') }}
        </x-primary-button>
    </form>
</div>