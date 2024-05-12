<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/app.css">
    @vite('resources/css/app.css')
    <title>Document</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-white">
    <x-app-layout></x-app-layout>
    @include('layouts.navigation')

    <div class="result">
        <div class="result-bmi">
            <p>Your BMI is: {{ isset($bmi) ? $bmi : '' }}</p>
        </div>
        <div class="result-category">
            <p>BMI Category: {{ isset($category) ? $category : '' }}</p>
        </div>           
    </div>

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

<script src="{{ mix('js/app.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>
</html>