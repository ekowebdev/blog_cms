<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }} | Blog App</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-base-200 relative min-h-screen flex flex-col items-center justify-center px-4">

        <div class="absolute top-6 right-4 z-50">
            <livewire:language-switcher />
        </div>

        <a href="/" wire:navigate class="mb-4 mt-6">
            <x-application-logo class="w-16 h-16 fill-current text-gray-500" />
        </a>

        {{ $slot }}

    </body>
</html>
