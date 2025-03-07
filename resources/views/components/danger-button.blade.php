<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'whitespace-nowrap rounded-radius bg-danger border border-danger px-4 py-2 text-base text-on-danger dark:text-on-danger-dark font-medium tracking-wide text-onDanger transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-danger active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-danger dark:border-danger dark:text-onDanger dark:focus-visible:outline-danger']) }}>
    {{ $slot }}
</button>

{{-- <button
    {{ $attributes->merge(['type' => 'button', 'class' => 'whitespace-nowrap rounded-radius bg-danger border border-danger px-4 py-2 text-base font-medium tracking-wide text-onDanger transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-danger active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-danger dark:border-danger dark:text-onDanger dark:focus-visible:outline-danger']) }}>
    {{ $slot }}
</button> --}}
