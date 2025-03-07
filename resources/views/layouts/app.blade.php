<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="arctic">

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

    <!-- Styles -->
    @livewireStyles
</head>

<body class="antialiased bg-surface dark:bg-surface-dark">
    <div x-data="{ sidebarIsOpen: false }" class="relative flex w-full flex-col md:flex-row">
        <!-- This allows screen readers to skip the sidebar and go directly to the main content. -->
        <a class="sr-only" href="#main-content">skip to the main content</a>

        <!-- dark overlay for when the sidebar is open on smaller screens  -->
        <div x-cloak x-show="sidebarIsOpen" class="fixed inset-0 z-20 bg-surface-dark/10 backdrop-blur-xs lg:hidden"
            aria-hidden="true" x-on:click="sidebarIsOpen = false" x-transition.opacity></div>

        @livewire('navigation-menu')

        <!-- top navbar & main content  -->
        <div class="flex flex-col justify-between h-svh w-full overflow-y-auto bg-surface dark:bg-surface-dark">
            <!-- top navbar  -->
            <nav class="sticky top-0 z-10 flex items-center justify-between border-b border-outline bg-surface-alt px-4 py-2 dark:border-outline-dark dark:bg-surface-dark-alt"
                aria-label="top navibation bar">

                <!-- sidebar toggle button for small screens  -->
                <button type="button" class="lg:hidden inline-block text-on-surface dark:text-on-surface-dark"
                    x-on:click="sidebarIsOpen = true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-5"
                        aria-hidden="true">
                        <path
                            d="M0 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5-1v12h9a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zM4 2H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h2z" />
                    </svg>
                    <span class="sr-only">sidebar toggle</span>
                </button>

                <!-- Page Heading -->
                @if (isset($header))
                    <header
                        class="hidden lg:inline-block md:hidden text-sm font-medium text-on-surface dark:text-on-surface-dark">
                        {{ $header }}
                    </header>
                @endif

                <div class="flex gap-2 flex-row items-center justify-center">
                    <div>
                        <button
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400
                        dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400
                        hover:bg-gray-100 dark:hover:bg-surface-dark focus:outline-none
                        focus:bg-gray-100 dark:focus:bg-surface-dark focus:text-gray-500
                        dark:focus:text-gray-400"
                            onclick="toggleTheme()">
                            <span class="block dark:hidden" title="cambiar a modo oscuro">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M12 3a9 9 0 1 0 9 9c0-.46-.04-.92-.1-1.36a5.39 5.39 0 0 1-4.4 2.26a5.403 5.403 0 0 1-3.14-9.8c-.44-.06-.9-.1-1.36-.1" />
                                </svg>
                            </span>

                            <span class="hidden dark:block" title="cambiar a modo claro">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M12 7c-2.76 0-5 2.24-5 5s2.24 5 5 5s5-2.24 5-5s-2.24-5-5-5M2 13h2c.55 0 1-.45 1-1s-.45-1-1-1H2c-.55 0-1 .45-1 1s.45 1 1 1m18 0h2c.55 0 1-.45 1-1s-.45-1-1-1h-2c-.55 0-1 .45-1 1s.45 1 1 1M11 2v2c0 .55.45 1 1 1s1-.45 1-1V2c0-.55-.45-1-1-1s-1 .45-1 1m0 18v2c0 .55.45 1 1 1s1-.45 1-1v-2c0-.55-.45-1-1-1s-1 .45-1 1M5.99 4.58a.996.996 0 0 0-1.41 0a.996.996 0 0 0 0 1.41l1.06 1.06c.39.39 1.03.39 1.41 0s.39-1.03 0-1.41zm12.37 12.37a.996.996 0 0 0-1.41 0a.996.996 0 0 0 0 1.41l1.06 1.06c.39.39 1.03.39 1.41 0a.996.996 0 0 0 0-1.41zm1.06-10.96a.996.996 0 0 0 0-1.41a.996.996 0 0 0-1.41 0l-1.06 1.06c-.39.39-.39 1.03 0 1.41s1.03.39 1.41 0zM7.05 18.36a.996.996 0 0 0 0-1.41a.996.996 0 0 0-1.41 0l-1.06 1.06c-.39.39-.39 1.03 0 1.41s1.03.39 1.41 0z" />
                                </svg>
                            </span>
                        </button>
                    </div>


                    <!-- Profile Menu  -->
                    <div x-data="{ userDropdownIsOpen: false }" class="relative" x-on:keydown.esc.window="userDropdownIsOpen = false">
                        <button type="button"
                            class="flex w-full items-center rounded-radius gap-2 p-2 text-left text-on-surface hover:bg-primary/5 hover:text-on-surface-strong focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary dark:text-on-surface-dark dark:hover:bg-primary-dark/5 dark:hover:text-on-surface-dark-strong dark:focus-visible:outline-primary-dark"
                            x-bind:class="userDropdownIsOpen ? 'bg-primary/10 dark:bg-primary-dark/10' : ''"
                            aria-haspopup="true" x-on:click="userDropdownIsOpen = ! userDropdownIsOpen"
                            x-bind:aria-expanded="userDropdownIsOpen">
                            <img src="https://penguinui.s3.amazonaws.com/component-assets/avatar-7.webp"
                                class="size-8 object-cover rounded-radius" alt="avatar" aria-hidden="true" />
                            <div class="hidden md:flex flex-col">
                                <span
                                    class="text-sm font-bold text-on-surface-strong dark:text-on-surface-dark-strong">Alex
                                    Martinez</span>
                                <span class="text-xs" aria-hidden="true">@alexmartinez</span>
                                <span class="sr-only">profile settings</span>
                            </div>
                        </button>

                        <!-- menu -->
                        <div x-cloak x-show="userDropdownIsOpen"
                            class="absolute top-14 right-0 z-20 h-fit w-48 border divide-y divide-outline border-outline bg-surface dark:divide-outline-dark dark:border-outline-dark dark:bg-surface-dark rounded-radius"
                            role="menu" x-on:click.outside="userDropdownIsOpen = false"
                            x-on:keydown.down.prevent="$focus.wrap().next()"
                            x-on:keydown.up.prevent="$focus.wrap().previous()" x-transition=""
                            x-trap="userDropdownIsOpen">

                            <div class="flex flex-col py-1.5">
                                <a href="#"
                                    class="flex items-center gap-2 px-2 py-1.5 text-sm font-medium text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus-visible:underline focus:outline-hidden dark:text-on-surface-dark dark:hover:bg-primary-dark/5 dark:hover:text-on-surface-dark-strong"
                                    role="menuitem">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-5 shrink-0" aria-hidden="true">
                                        <path
                                            d="M10 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM3.465 14.493a1.23 1.23 0 0 0 .41 1.412A9.957 9.957 0 0 0 10 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 0 0-13.074.003Z" />
                                    </svg>
                                    <span>Profile</span>
                                </a>
                            </div>

                            <div class="flex flex-col py-1.5">
                                <a href="#"
                                    class="flex items-center gap-2 px-2 py-1.5 text-sm font-medium text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus-visible:underline focus:outline-hidden dark:text-on-surface-dark dark:hover:bg-primary-dark/5 dark:hover:text-on-surface-dark-strong"
                                    role="menuitem">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-5 shrink-0" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M7.84 1.804A1 1 0 0 1 8.82 1h2.36a1 1 0 0 1 .98.804l.331 1.652a6.993 6.993 0 0 1 1.929 1.115l1.598-.54a1 1 0 0 1 1.186.447l1.18 2.044a1 1 0 0 1-.205 1.251l-1.267 1.113a7.047 7.047 0 0 1 0 2.228l1.267 1.113a1 1 0 0 1 .206 1.25l-1.18 2.045a1 1 0 0 1-1.187.447l-1.598-.54a6.993 6.993 0 0 1-1.929 1.115l-.33 1.652a1 1 0 0 1-.98.804H8.82a1 1 0 0 1-.98-.804l-.331-1.652a6.993 6.993 0 0 1-1.929-1.115l-1.598.54a1 1 0 0 1-1.186-.447l-1.18-2.044a1 1 0 0 1 .205-1.251l1.267-1.114a7.05 7.05 0 0 1 0-2.227L1.821 7.773a1 1 0 0 1-.206-1.25l1.18-2.045a1 1 0 0 1 1.187-.447l1.598.54A6.992 6.992 0 0 1 7.51 3.456l.33-1.652ZM10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Settings</span>
                                </a>
                                <a href="#"
                                    class="flex items-center gap-2 px-2 py-1.5 text-sm font-medium text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus-visible:underline focus:outline-hidden dark:text-on-surface-dark dark:hover:bg-primary-dark/5 dark:hover:text-on-surface-dark-strong"
                                    role="menuitem">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-5 shrink-0" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M2.5 4A1.5 1.5 0 0 0 1 5.5V6h18v-.5A1.5 1.5 0 0 0 17.5 4h-15ZM19 8.5H1v6A1.5 1.5 0 0 0 2.5 16h15a1.5 1.5 0 0 0 1.5-1.5v-6ZM3 13.25a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1-.75-.75Zm4.75-.75a.75.75 0 0 0 0 1.5h3.5a.75.75 0 0 0 0-1.5h-3.5Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Payments</span>
                                </a>
                            </div>

                            <div class="flex flex-col py-1.5">
                                <a href="#"
                                    class="flex items-center gap-2 px-2 py-1.5 text-sm font-medium text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus-visible:underline focus:outline-hidden dark:text-on-surface-dark dark:hover:bg-primary-dark/5 dark:hover:text-on-surface-dark-strong"
                                    role="menuitem">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-5 shrink-0" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M3 4.25A2.25 2.25 0 0 1 5.25 2h5.5A2.25 2.25 0 0 1 13 4.25v2a.75.75 0 0 1-1.5 0v-2a.75.75 0 0 0-.75-.75h-5.5a.75.75 0 0 0-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 0 0 .75-.75v-2a.75.75 0 0 1 1.5 0v2A2.25 2.25 0 0 1 10.75 18h-5.5A2.25 2.25 0 0 1 3 15.75V4.25Z"
                                            clip-rule="evenodd" />
                                        <path fill-rule="evenodd"
                                            d="M6 10a.75.75 0 0 1 .75-.75h9.546l-1.048-.943a.75.75 0 1 1 1.004-1.114l2.5 2.25a.75.75 0 0 1 0 1.114l-2.5 2.25a.75.75 0 1 1-1.004-1.114l1.048-.943H6.75A.75.75 0 0 1 6 10Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Sign Out</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- main content  -->
            <div id="main-content" class="p-4 flex-1">
                <div class="overflow-y-auto">
                    {{ $slot }}
                </div>
            </div>

            <footer
                class="py-5 bg-surface-alt dark:bg-surface-dark-alt text-on-surface dark:text-white text-center text-sm border-t border-outline dark:border-outline-dark">
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
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>

{{-- <!DOCTYPE html>
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

</html> --}}
