<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('page.title') | {{config('app.name')}}</title>
    <link rel="icon" type="image/ico" href="{{asset('img/favicon.ico')}}" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    @yield('page.main')
</body>
</html>
