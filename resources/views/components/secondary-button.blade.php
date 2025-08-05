<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-block items-center px-3 py-3 rounded-lg font-semibold text-xs text-center border border-neutral-700 text-neutral-700 hover:bg-neutral-700 hover:text-white focus:bg-neutral-700 focus:outline-none focus:ring-1 focus:ring-neutral-700 focus:ring-offset-1 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
