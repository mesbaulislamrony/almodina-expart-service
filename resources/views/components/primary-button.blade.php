<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-block items-center px-3 py-3 rounded-lg font-semibold text-xs text-center border border-green-700 text-green-700 hover:bg-green-700 hover:text-white focus:bg-green-700 focus:outline-none focus:ring-1 focus:ring-green-700 focus:ring-offset-1 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>