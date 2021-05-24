@extends('layouts.master')

@section('title') Responsive Table @endsection

@section('css')
    <!-- Responsive Table css -->
    <link href="{{ URL::asset('admin/public/libs/rwd-table/rwd-table.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" /> --}}


@section('content')
    @component('common-components.breadcrumb')
        @slot('title') Ip Address List @endslot
        @slot('li_1') @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-12 col-lg-12 ">
            @if (session()->has('message'))
                <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
                    <h5 class="text-center"> {{ session('message') }} </h5>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger  alert-dismissible fade show ">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="font-size:20px">{{ $error }}</li>
                        @endforeach
                    </ul>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>

                </div>
            @endif
        </div>

        <div class="col-md-12 col-lg-12 ">
            <div class="card">
                <button type="button" class="btn btn-success waves-effect waves-light " style="height:10%;width:10%"
                    data-toggle="modal" data-target="#addnewipaddress">
                    <i class="bx bx-fa-plus font-size-16 align-right"> Add new </i>
                    {{-- <i class='fas fa-plus'>fa-plus</i> --}}
                </button>

                <div class="card-body" style="height:630px;  overflow-y: auto;">
                    <table class="table yajra-dt">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Ip Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>

    <div id="addnewipaddress" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Add New Ip Adress </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('ip-addresslist.store') }}" method="Post"
                                        class="custom-validation">
                                        @csrf
                                        <div class="form-group">
                                            <label class="control-label"> User List</label>
                                            <select class="form-control select2" name="user_id" required>
                                                @foreach ($user as $u)
                                                    <option value="{{ $u->id }}"> {{ $u->username }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ip Address</label>
                                            <div>
                                                <input type="text" name="ip_address" class="form-control"
                                                    placeholder="Give IP address">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Sleect Status</label>
                                            <select class="form-control select2" name="status" required>
                                                <option value=" "> Select Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">In-Active</option>
                                            </select>
                                        </div>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary waves-effect waves-light">Add New</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <div id="updatenewipaddress" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div id="txtHint">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



    {{-- <script src="{{ URL::asset('public/js/pages/table-responsive.init.js')}}"></script> --}}

    <script type="text/javascript">
        $(function() {
            var table = $('.yajra-dt').DataTable({
                processing: true,
                serverSide: true,

                ajax: "{{ route('ip-addresslist.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'ip_address',
                        name: 'ip_address'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            })


        });


        function selectid2(x) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
                }
            });
            $.ajax({
                type: 'get',
                url: "{{ url('ip-addresslist') }}/" + x,
                //  data:{id:btn},
                cache: false,
                success: function(data) {
                    $('#txtHint').html(data);
                }
            });
        }

    </script>

@endsection
