<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="{{ asset('theme.config.js') }}"></script>

    <script>
        // Script inline para aplicar el tema inmediatamente (evita parpadeos)
        (function() {
            function getCookie(name) {
                return document.cookie.split('; ').reduce((r, v) => {
                    const parts = v.split('=');
                    return parts[0] === name ? decodeURIComponent(parts[1]) : r;
                }, '');
            }

            const theme = getCookie('theme') || 'light';

            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>

    <!-- Styles -->
    @livewireStyles
</head>

<body class="antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow-sm">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <footer class="py-5 text-center text-sm text-black dark:text-white/70">
            @php
                $packageJsonPath = base_path('package.json');
                $tailwindVersion = 'Versión no encontrada';

                if (file_exists($packageJsonPath)) {
                    $packageJson = json_decode(file_get_contents($packageJsonPath), true);
                    $tailwindVersion = $packageJson['devDependencies']['tailwindcss'] ?? 'Versión no encontrada';
                }
            @endphp
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) - TailwindCSS
            v{{ $tailwindVersion }}
        </footer>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
