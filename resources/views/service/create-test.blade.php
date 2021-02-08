<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @laravelPWA

    
</head>
<body>

    <style>
        .v-application .primary--text {
            color: #ffa726 !important;  
            caret-color: #ffa726 !important;  
        }
        .v-list .v-list-item--active .v-list-item__title {
        color: #ffa726 !important;  
        }
    </style>

    <div id="app"> 
        <create_service></create_service>
    </div>

    
</body>
</html>
