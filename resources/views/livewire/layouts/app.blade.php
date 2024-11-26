<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

        <x-dark-mode-handler />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @fluxStyles
    </head>
    <body class="bg-white dark:bg-zinc-900 antialiased min-h-screen text-gray-900 dark:text-gray-100">
        <livewire:layouts.navigation />

        <main>
            {{ $slot }}
        </main>

        @persist('toast')
            <flux:toast />
        @endpersist
        @fluxScripts
    </body>
</html>
