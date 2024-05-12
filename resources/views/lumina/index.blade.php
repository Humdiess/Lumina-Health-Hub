<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:300,300i,400,400,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('build/assets/app-9c5f9671.css') }}" re="stylesheet">
    <script src="{{ asset('build/assets/app-a35cead1.js') }}" defer></script>
    <link href="https://unpkg.com/aos@2.2.0/dist/aos.js" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.9/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-[#121212]">
    <x-app-layout></x-app-layout>
    @include('layouts.navigation')

    @include('layouts.header')

    <main class="mt-[60vw] md:mt-0">
        @include('layouts.achievements')
        @include('layouts.promo')
        @include('layouts.shop')  
        @include('layouts.chatai')  
        @include('layouts.article')
    </main>

    <footer>
        @include('layouts.footer')
    </footer>

    <script>
        function saveScrollPosition() {
            sessionStorage.setItem('scrollPosition', window.pageYOffset);
        }

        function restoreScrollPosition() {
            if(sessionStorage.getItem('scrollPosition') !== null) {
            window.scrollTo(0, sessionStorage.getItem('scrollPosition'));
            sessionStorage.removeItem('scrollPosition');
        }

        window.addEventListener('beforeunload', saveScrollPosition);
        window.addEventListener('load', restoreScrollPosition);
        }
    </script>
    
    <script>
        AOS.init();
    </script>

<script src="{{ mix('js/app.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>
</html>