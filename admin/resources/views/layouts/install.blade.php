<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Installation - {{ setting('app_name') }}</title>

    {!! HTML::style('public/assets/css/vendor.css') !!}
    {!! HTML::style('public/assets/css/app.css') !!}
    {!! HTML::style('public/assets/css/install.css') !!}

    @yield('styles')
</head>
<body style="background-color: #fff;">

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-3 logo-wrapper">
            <img src="{{ url('assets/img/vanguard-logo.png') }}" alt="Vanguard" class="logo">
        </div>
    </div>
    <div class="wizard col-md-6 offset-3">
        @yield('content')
    </div>
</div>

<script type="text/javascript" src="{{ mix("public/assets/js/vendor.js") }}"></script>
<script type="text/javascript" src="{{ url('public/assets/js/as/app.js') }}"></script>
<script type="text/javascript" src="{{ url('public/assets/js/as/btn.js') }}"></script>
<script>
    $("a[data-toggle=loader], button[data-toggle=loader]").click(function () {
        if ($(this).parents('form').valid()) {
            as.btn.loading($(this), $(this).data('loading-text'));
            $(this).parents('form').submit();
        }
    });
</script>
@yield('scripts')
</body>
</html>
