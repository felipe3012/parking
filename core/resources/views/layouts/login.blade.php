<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Page Title -->
    <title>@yield('title') | {{env('APP_NAME')}}</title>
    @include('layouts.css')
</head>
<body>
    @yield('content')
    @include('layouts.js')
</body>
</html>
 