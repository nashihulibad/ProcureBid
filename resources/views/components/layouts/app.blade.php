<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? config('app.name', 'ProcureBid') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <header class="site-header">
        <a class="brand" href="{{ route('home') }}" wire:navigate>ProcureBid</a>
        <nav>
            @auth
                <a href="{{ route('dashboard') }}" wire:navigate>Dashboard</a>
            @else
                <a href="{{ route('login') }}" wire:navigate>Login</a>
                <a href="{{ route('register') }}" wire:navigate>Register</a>
            @endauth
        </nav>
    </header>

    <main class="page-shell">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>
