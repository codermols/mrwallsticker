<!DOCTYPE html>
<html lang="en">
    <head>                        
        <meta charset="utf-8">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>          
        
        <!-- META SECTION -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- END META SECTION -->
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/libs.css">
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>        
        @yield('content')

        <!-- Scripts -->
        <script src="/js/app.js"></script>
        <script src="/js/libs.js"></script>

        @yield('scripts.footer')
        
        @include('flash')
    
    </body>
</html>