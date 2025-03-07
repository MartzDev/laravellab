<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="p-5 bg-surface-alt dark:bg-surface-dark-alt border-outline dark:border-outline-dark rounded-lg">
        {{-- <x-welcome /> --}}
        <h1 class="dark:text-on-surface-dark-strong">prueba de contenido</h1>
        <p class="dark:text-on-surface-dark">estado de prueba: <span class="text-success dark:text-success">prueba</span>
        </p>
    </div>
</x-app-layout>
