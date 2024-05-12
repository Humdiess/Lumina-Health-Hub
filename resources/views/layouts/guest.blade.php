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
    <body class="font-sans text-gray-900 antialiased ">
        <div class="min-h-screen flex justify-between  pt-6 sm:pt-0 bg-[#ffffff] items-center">
            <div class="sm:max-w-md mt-6 px-6 py-3 pt-6 ms-16 bg-white  overflow-hidden sm:rounded-lg w-full">
                <div class="logo flex items-center">
                    <h1 class="text-[#4E9F3D] text-4xl font-black pb-8">Lumina <span class="py-2 px-4 bg-[#4E9F3D] text-white rounded">Health</span></h1>
                </div>
                {{ $slot }}
            </div>
            <div class="detel md:block hidden">
                <img src="assets/img/detel.svg" alt="" srcset="" width="488vw" class="me-[11vw]">
            </div>
        </div>
    </body>
</html>
