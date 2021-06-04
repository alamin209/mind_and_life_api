<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>@yield('title') | Mind & Life</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('public/images/favicon.ico')}}">
    @include('layouts.head')
</head>

@section('body')
@show
<body data-layout="detached" data-topbar="colored">
<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner-chase">
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
        </div>
    </div>
</div>
<!-- Begin page -->
<div class="container-fluid">
    <div id="layout-wrapper">
    @include('layouts.topbar')
    @include('layouts.sidebar')
    <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                @yield('content')
            </div>
            <!-- End Page-content -->
            @include('layouts.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->
</div>
<!-- END container-fluid -->


<!-- Right Sidebar -->
@include('layouts.right-sidebar')
<!-- /Right-bar -->

<!-- JAVASCRIPT -->
@include('layouts.footer-script')
</body>

</html>
