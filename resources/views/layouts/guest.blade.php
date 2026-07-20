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

<body class="font-sans text-gray-800 antialiased bg-yellow-50">

    <div class="min-h-screen flex flex-col justify-center items-center px-4">

        <!-- Logo -->
        <div class="mb-5">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-yellow-500" />
            </a>
        </div>

        <!-- Card -->
        <div class="w-full sm:max-w-md bg-white border border-yellow-200 shadow-xl rounded-2xl px-8 py-6">

            <!-- Judul -->
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-yellow-700">
                    Blog Pribadi
                </h1>
                <p class="text-sm text-gray-500 mt-2">
                    Silakan login atau daftar untuk melanjutkan.
                </p>
            </div>

            {{ $slot }}

        </div>

    </div>

</body>
</html>