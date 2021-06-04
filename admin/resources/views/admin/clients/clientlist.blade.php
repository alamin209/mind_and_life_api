@extends('layouts.master')

@section('title') {{ $title }} @endsection

@section('css')
    <!-- Responsive Table css -->
    <link href="{{ URL::asset('admin/public/libs/rwd-table/rwd-table.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" /> --}}


@section('content')
    @component('common-components.breadcrumb')
        @slot('title') Client List @endslot
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
                        data-toggle="modal" data-target="#addClinet">
                    <i class="bx bx-fa-plus font-size-16 align-right"> Add new </i>
                </button>

                <div class="card-body" style="height:630px;  overflow-y: auto;">
                    <table class="table client-dt">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact number</th>
                            <th>Contact number</th>
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
                                    <form action="{{ route('clients.store') }}" method="Post" class="custom-validation">
                                        @csrf
                                        <div class="form-group">

                                            <label>Name(English)</label>
                                            <div>
                                                <input type="text" name="name_en"
                                                       @if (old('email')) value="{{ old('email') }}" @else value=""
                                                       @endif required class="form-control"
                                                       placeholder="Give Client name English" in English>
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <label>Name (China) * </label>
                                            <div>
                                                <input type="text" name="name_ch"
                                                       @if (old('name_ch')) value="{{ old('name_ch') }}" @else value=""
                                                       @endif class="form-control" required=""
                                                       placeholder="Give Client name in China">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Email * </label>
                                            <div>
                                                <input type="email" name="email"
                                                       @if (old('email')) value="{{ old('email') }}" @else value=""
                                                       @endif class="form-control" required=""
                                                       placeholder="Give Client Email Address">
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <label>Company name * </label>
                                            <div>
                                                <input type="text" name="company_name"
                                                       @if (old('company_name')) value="{{ old('company_name') }}"
                                                       @else value="" @endif required class="form-control"
                                                       placeholder="Give Company name ">
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <label>Contract Person * </label>
                                            <div>
                                                <input type="text" name="contract_person"
                                                       @if (old('contract_person')) value="{{ old('contract_person') }}"
                                                       @else value="" @endif required class="form-control"
                                                       placeholder="Give Contrect person ">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label>Contact Number * </label>
                                            <div>
                                                <input type="text" name="contact_number"
                                                       @if (old('contact_number')) value="{{ old('contact_number') }}"
                                                       @else value="" @endif required class="form-control"
                                                       placeholder="Give Contact Number ">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Select Country</label>
                                            <select class="form-control select2" name="country_id"
                                                    @if (old('country_id')) value="{{ old('country_id') }}"
                                                    @else value="" @endif required>
                                                <option value=" "> Select Country</option>
                                                @foreach ($country as $c)
                                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>city </label>
                                            <div>
                                                <input type="text" name="city"
                                                       @if (old('city')) value="{{ old('city') }}" @endif
                                                       class="form-control" placeholder="Give City Name ">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Address </label>
                                            <div>
                                                <textarea class="form-control" name="address" rows="4"
                                                          cols="50"> @if (old('address')) {{ old('address') }}  @endif </textarea>
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



    {{-- <script src="{{ URL::asset('public/js/pages/table-responsive.init.js')}}"></script> --}}

    <script type="text/javascript">
        $(function () {
            var table = $('.client-dt').DataTable({
                processing: true,
                serverSide: true,

                ajax: "{{ route('clients.index') }}",
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'contact_number',
                        name: 'contact_number'
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
                url: "{{ url('clients') }}/" + x,
                //  data:{id:btn},
                cache: false,
                success: function (data) {
                    $('#txtHint').html(data);
                }
            });
        }

    </script>

@endsection
