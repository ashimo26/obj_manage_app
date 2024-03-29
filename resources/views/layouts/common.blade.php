<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- App Name --}}
    <title>{{ config('app.name', 'Laratto') }}</title>

    {{-- Fonts --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/css/background.css', 'resources/js/app.js'])

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
    <div>
      @yield('header')
    </div>
    <div class="flex">
        <div>
            @yield('sidebar')
        </div>
        <main class="w-full">
            @yield('content')
        </main>
    </div>
    <div>
      @yield('footer')
    </div>
</body>
</html>