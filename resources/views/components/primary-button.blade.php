<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-block items-center px-3 py-3 rounded-lg font-semibold border border-green-700 text-green-700 hover:bg-green-700 hover:text-white text-center transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>