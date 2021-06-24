<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title> @yield('title') | Mind & Life</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="mind and life" name="author"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('public/images/favicon.ico')}}">
    @include('layouts.head')
</head>
@yield('body')

@yield('content')

@include('layouts.footer-script')
</body>
</html>
