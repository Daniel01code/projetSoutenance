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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased relative min-h-screen">
    <!-- Background avec opacité -->
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://source.unsplash.com/random/1920x1080');"></div>
    <div class="absolute inset-0 bg-black opacity-40"></div>

    <!-- Contenu principal -->
    <div class="relative z-10">
        <!-- Header -->
        <header class="bg-gradient-to-r from-slate-600 to-slate-800 py-4 shadow-lg">
            <div class="container mx-auto px-4 flex justify-between items-center">
                <!-- Logo -->
                <div>
                    <a href="/" class="transition-transform duration-300 hover:scale-105">
                        <x-application-logo class="w-16 h-16 sm:w-20 sm:h-20 fill-current text-gray-200" />
                    </a>
                </div>

                <!-- Navigation -->
                <nav class="flex items-center space-x-6 text-white">
                    <ul class="flex space-x-6">
                        <li>
                            <a href="#" class="text-sm sm:text-base font-medium hover:text-gray-300 transition-colors duration-200">À propos</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm sm:text-base font-medium hover:text-gray-300 transition-colors duration-200">Contact</a>
                        </li>
                    </ul>
                    
                </nav>
            </div>
        </header>

        <!-- Contenu principal (slot) -->
        <main class="container mx-auto px-4 py-8 text-white">
            {{ $slot }}
        </main>
    </div>
</body>
</html>