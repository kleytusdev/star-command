<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <script defer src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script> --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>{{ config('app.name', 'K UI') }}</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <!-- Styles -->
    <style>
        [x-cloak] {
            display: none;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-nunito antialiased">
    <div
        x-data="mainState"
        :class="{ dark: isDarkMode }"
        x-on:resize.window="handleWindowResize"
        x-cloak
    >
        <div class="min-h-screen text-gray-900 duration-500 bg-gray-100 dark:bg-dark-eval-0 dark:text-gray-200 flex flex-row">
            <!-- Sidebar -->
            <div class="flex flex-2">
                <x-sidebar.sidebar />
            </div>

            <!-- Page Wrapper -->
            <div
                class="flex flex-1 flex-col min-h-screen"
            >
                <!-- Page Heading -->
                {{-- <header>
                    <div class="p-4 sm:p-6">
                        {{ $header }}
                    </div>
                </header> --}}

                <!-- Page Content -->
                <main class="py-4 px-4 sm:px-6 flex-1">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
</body>
</html>
