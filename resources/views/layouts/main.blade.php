<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">  
    {!! SEO::generate() !!}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
  href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
  rel="stylesheet">

  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-4HYKRDWSM3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-4HYKRDWSM3');
</script>


  
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/logom.webp') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/logom.webp') }}">
</head>

<body class="font-sans    m-0 p-0 flex flex-col min-h-screen ">

    <!-- Preloader-->
    {{-- @if (!request()->routeIs(['login', 'register']))
    @include('layouts.preloader')
    @endif --}}





    @yield('content')


    @include('components.alerts')


    @vite('resources/js/app.js')
    <script src="{{ asset('assets/js/main.js') }}"></script>





    @stack('scripts')
</body>

</html>