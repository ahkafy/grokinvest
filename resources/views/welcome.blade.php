<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans">
        <div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-black">
            <div class="text-center p-8 bg-white dark:bg-zinc-900 rounded-lg shadow-lg">
                <h1 class="text-2xl md:text-3xl font-bold mb-4 text-gray-800 dark:text-white">We are updating our finest system with new features and security.</h1>
                <p class="text-lg text-gray-600 dark:text-gray-300">Stay with us, we are coming back soon.</p>
            </div>
        </div>
    </body>
</html>
