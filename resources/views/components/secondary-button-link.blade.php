<a {{ $attributes->merge(['class' => 'inline-block items-center px-3 py-3 rounded-lg font-semibold border border-white hover:bg-white hover:text-green-700 text-xs text-center transition ease-in-out duration-150 border']) }}>
    {{ $slot }}
</a>