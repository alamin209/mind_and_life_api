@extends('layouts.master')

@section('title') {{ $title }} @endsection

@section('css')
    <link href="{{ URL::asset('admin/public/libs/rwd-table/rwd-table.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('title') {{ $title }} @endslot
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
                        data-toggle="modal" data-target="#addnewad">
                    <i class="bx bx-fa-plus font-size-16 align-right"> Add new </i>
                    {{-- <i class='fas fa-plus'>fa-plus</i> --}}
                </button>

                <div class="card-body" style="height:630px;  overflow-y: auto;">
                    <table class="table advertisemnt-dt">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>name</th>
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

    <div id="addnewad" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('advertisement.store') }}" method="Post" class="custom-validation"
                      enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Add New Occupation </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        @csrf
                                        <div class="custom-control custom-checkbox" style="margin-bottom:15px">
                                            <input type="checkbox" name='is_google' class="custom-control-input"
                                                   value="1" id="invalidCheck">
                                            <label class="custom-control-label" for="invalidCheck">Is Google
                                                Advirtisement</label>
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>

                                        <div class="form-group autoUpdate" id="autoUpdate" style="display:none;">
                                            <label> Google script link </label>
                                            <div>
                                                <input type="text" name="add_sense_link" class="form-control"
                                                       placeholder="Please  Google Advirtisement  script  link">
                                            </div>
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


    <div id="update_advertisement" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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



    <script type="text/javascript">

        $(function () {
            var table = $('.advertisemnt-dt').DataTable({
                processing: true,
                serverSide: true,

                ajax: "{{ route('index.index') }}",
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },

                    {
                        data: 'name',
                        name: 'name'
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
                url: "{{ url('advertisement') }}/" + x,
                //  data:{id:btn},
                cache: false,
                success: function (data) {
                    $('#txtHint').html(data);
                }
            });
        }


        function delete_ad(x) {
            if (confirm("are you sure to delete this Advirtisement?")) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
                    }
                });

                btn = $(x).data('panel-id');

                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('advertisement') }}/" + x,
                    data: {id: btn},
                    cache: false,
                    success: function (data) {
                        alert(' Selected  advertisement  deleted Successfully');
                        location.reload();

                    }
                });
            }


        }

    </script>

@endsection
