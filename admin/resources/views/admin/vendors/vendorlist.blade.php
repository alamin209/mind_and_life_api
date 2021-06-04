@extends('layouts.master')

@section('title') {{  $title }} @endsection

@section('css')
    <!-- Responsive Table css -->
    <link href="{{ URL::asset('admin/public/libs/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" /> --}}


@section('content')
    @component('common-components.breadcrumb')
        @slot('title')  vendor List   @endslot
        @slot('li_1')   @endslot
    @endcomponent

    <div class="row">

        <div class="col-md-12">
            @if(session()->has('message'))

                <div class="alert alert-{{ session('type')  }} alert-dismissible fade show" role="alert">
                    {{ session('message')  }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger  alert-dismissible fade show ">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
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
                        data-toggle="modal" data-target="#addClinet">
                    <i class="bx bx-fa-plus font-size-16 align-right"> Add new </i>
                    {{-- <i class='fas fa-plus'>fa-plus</i> --}}
                </button>

                <div class="card-body" style="height:630px;  overflow-y: auto;">
                    <table class="table vendor-dt">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Company Name</th>
                            <th>Contact Name</th>
                            <th>Company Email</th>
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

    <div id="addClinet" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Add New Client </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{  route('vendors.store') }}" method="Post" class="custom-validation"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">

                                            <label>company name</label>
                                            <div>
                                                <input type="text" name="company_name"
                                                       @if(old('company_name')) value="{{ old('company_name') }}"
                                                       @else value="" @endif   required class="form-control"
                                                       placeholder="Give company name">
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <label>Contact name * </label>
                                            <div>
                                                <input type="text" name="contact_name"
                                                       @if(old('contact_name')) value="{{ old('contact_name') }}"
                                                       @else value="" @endif     class="form-control" required=""
                                                       placeholder="Give contact name">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Post title * </label>
                                            <div>
                                                <input type="post_title" name="post_title"
                                                       @if(old('post_title')) value="{{ old('post_title') }}"
                                                       @else value="" @endif    class="form-control" required=""
                                                       placeholder="Give post titles">
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <label>Company email * </label>
                                            <div>
                                                <input type="text" name="company_email"
                                                       @if(old('company_email')) value="{{ old('company_email') }}"
                                                       @else value="" @endif  required class="form-control"
                                                       placeholder="Give company email ">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Company Phone </label>
                                            <div>
                                                <input type="text" name="company_phone"
                                                       @if(old('company_phone')) value="{{ old('company_phone') }}"
                                                       @endif     class="form-control"
                                                       placeholder="Give  company phone ">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>company address </label>
                                            <div>
                                                <textarea class="form-control" name="company_address" rows="4"
                                                          cols="50"> @if(old('company_address')) {{ old('company_address') }}  @endif </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label> Company signature </label>
                                            <div>
                                                <input type="file" name="company_signature" accept="image/*"
                                                       onchange="preview_company_signature(event)" class="form-control">
                                                <img id="company_signature"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Company seal </label>
                                            <div>
                                                <input type="file" name="company_seal" accept="image/*"
                                                       onchange="preview_company_seal(event)" class="form-control">
                                                <img id="company_seal"/>
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



    <div id="updateClinet" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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


    <script type='text/javascript'>
        function preview_company_signature(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('company_signature');
                output.style.width = "200px";
                output.style.height = "200px";
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }


        function preview_company_seal(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('company_seal');
                output.style.width = "200px";
                output.style.height = "200px";
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

    </script>


    {{-- <script src="{{ URL::asset('public/js/pages/table-responsive.init.js')}}"></script> --}}

    <script type="text/javascript">
        $(function () {
            var table = $('.vendor-dt').DataTable({
                processing: true,
                serverSide: true,

                ajax: "{{ route('vendors.index') }}",
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                    {
                        data: 'company_name',
                        name: 'company_name'
                    },
                    {
                        data: 'contact_name',
                        name: 'contact_name'
                    },

                    {
                        data: 'company_email',
                        name: 'company_email'
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
                headers: {'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')}
            });
            $.ajax({
                type: 'get',
                url: "{{ url('vendors') }}/" + x,
                //  data:{id:btn},
                cache: false,
                success: function (data) {
                    $('#txtHint').html(data);
                }
            });
        }

    </script>

@endsection
