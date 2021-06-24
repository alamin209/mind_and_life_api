@extends('layouts.master')

@section('title') Responsive Table @endsection

@section('css')
    <!-- Responsive Table css -->
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

                <div class="card-body" style="height:630px;  overflow-y: auto;">
                    <table class="table advertisemnt-dt">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>username</th>
                            <th>Photo</th>
                            <th>email</th>
                            <th>status</th>
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
                        <h5 class="modal-title mt-0" id="myModalLabel">Add New Advirtisement</h5>
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

                ajax: "{{ route('userlist.appuser') }}",
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },

                   {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'profile_pic',
                        name: 'profile_pic',
                        render: function (data, type, full, meta) {
                            return "<img src=\"" + data + "\"  alt=\"Profile photo not found \"/ height=\"100px\"/ width=\"100px\"/>";
                        }
                    },

                    {
                        data: 'email',
                        name: 'email'
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

      function preview_user_photo(event) {
                var reader = new FileReader();
                reader.onload = function () {
                    var output = document.getElementById('ad_image_path');
                    output.style.width  = "194px";
                    output.style.height = "194px";
                    //output.style.border-radius = "49%";
                    output.src = reader.result;
                }
                reader.readAsDataURL(event.target.files[0]);
            }

        function selectid2(x) {

            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')}
            });
            $.ajax({
                type: 'get',

                url: "{{ url('userlist') }}/" + x,
                //  data:{id:btn},
                cache: false,
                success: function (data) {

                    $('#txtHint').html(data);

                }
            });

        }
        function delete_ad(x) {
            if (confirm("are you sure to delete this User?")) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
                    }
                });

                btn = $(x).data('panel-id');

                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('userlist') }}/" + x,
                    data: {id: btn},
                    cache: false,
                    success: function (data) {
                        alert(' Selected  User  deleted Successfully');
                        location.reload();

                    }
                });
            }


        }

    </script>

@endsection
