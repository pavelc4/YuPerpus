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
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <!-- Debug Info -->
        @if(config('app.debug'))
            <div class="fixed bottom-0 right-0 m-4 p-4 bg-white rounded shadow" style="max-width: 400px; max-height: 300px; overflow: auto;">
                <h3 class="font-bold mb-2">Debug Info:</h3>
                <pre class="text-xs">
                    Route: {{ Route::currentRouteName() }}
                    User: {{ auth()->user()->nama ?? 'Not logged in' }}
                    NPM: {{ auth()->user()->npm ?? 'No NPM' }}
                </pre>
            </div>
        @endif

        <!-- Additional Scripts -->
        @stack('scripts')
    </body>
</html>
