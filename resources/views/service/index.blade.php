<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>iMake</title>

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

    <div id="app"> 
        <header-component></header-component>
        <home :services='@json($services)'></home>
        {{ $services->links('pagination::bootstrap-4') }}
    </div>

    
</body>
</html>

<style>
/* .pagination {
    display:flex;
    justify-content:center;
}

.page-link{
    color:black;
}

.page-item, .active{
    color:black;
} */

</style>
