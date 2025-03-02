<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'rounded-md bg-white dark:bg-white/10 px-3.5 py-2.5 shadow-xs text-sm font-semibold text-gray-900 border border-gray-300 dark:border-black dark:text-white hover:bg-white/20 dark:hover:bg-white/20 active:bg-white dark:active:bg-white/10 focus:outline-hidden focus:ring-2 focus:ring-indigo-500 dark:focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-black disabled:opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

{{-- <button
    {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-xs hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-hidden focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button> --}}
