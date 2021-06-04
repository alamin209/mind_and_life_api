@yield('css')

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>

<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<script src="{{ URL::asset('public/vendor/datatables/buttons.server-side.js') }}"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

<!-- App css -->
<link href="{{ URL::asset('public/css/bootstrap-dark.min.css')}}" id="bootstrap-dark" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('public/css/bootstrap.min.css')}}" id="bootstrap-light" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('public/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('public/css/app-rtl.min.css')}}" id="app-rtl" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('public/css/app-dark.min.css')}}" id="app-dark" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('public/css/app.min.css')}}" id="app-light" rel="stylesheet" type="text/css"/>
<script src="{{ URL::asset('public/libs/jquery/jquery.min.js')}}"></script>
