<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="arctic">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <script src="{{ asset('theme.conf.js') }}"></script>

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
</head>

<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">

        <nav class="flex items-center justify-end gap-4">
            <button onclick="toggleTheme()"
                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-xs text-sm leading-normal">
                cambiar tema
            </button>

            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-xs text-sm leading-normal">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-xs text-sm leading-normal">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-xs text-sm leading-normal">
                            Register
                        </a>
                    @endif
                @endauth
        </nav>
        @endif
    </header>
    <div
        class="flex items-center justify-center w-full dark:text-white/70 transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main>hola mundo</main>
    </div>

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif

    <footer class="py-16 text-center text-sm dark:text-white/70">
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
</body>

</html>
