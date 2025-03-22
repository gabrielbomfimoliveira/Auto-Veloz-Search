<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Veloz Auto Search - Rapidez na busca de carros">
    <title>{{ config('app.name', 'Veloz Auto Search') }}</title>

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body class="min-h-screen bg-gray-100">
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center gap-2">
                        <svg class="w-8 h-8 text-blue-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 8L5 4H19L21 8M3 8V18C3 18.5523 3.44772 19 4 19H6C6.55228 19 7 18.5523 7 18V16M3 8H21M21 8V18C21 18.5523 20.5523 19 20 19H18C17.4477 19 17 18.5523 17 18V16M7 16H17M7 16H7.01M17 16H17.01M6 12H6.01M18 12H18.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M7 8L8 4M17 8L16 4" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <a href="/" class="text-xl font-bold text-gray-800 hover:text-blue-600 transition-colors duration-200">
                            {{ config('app.name', 'Veloz Auto Search') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main>
        {{ $slot }} 
    </main>

    @livewireScripts
</body>
</html> 