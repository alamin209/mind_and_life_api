<!-- JAVASCRIPT -->
{{-- <script src="{{ URL::asset('public/libs/jquery/jquery.min.js')}}"></script> --}}
<script src="{{ URL::asset('public/libs/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('public/libs/metismenu/metismenu.min.js')}}"></script>
<script src="{{ URL::asset('public/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ URL::asset('public/libs/node-waves/node-waves.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@yield('script')

<!-- App js -->
<script src="{{ URL::asset('public/js/app.min.js')}}"></script>

@yield('script-bottom')
