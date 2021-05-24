@extends('layouts.master')

@section('title') Responsive Table @endsection

@section('css')
    <!-- Responsive Table css -->
    <link href="{{ URL::asset('admin/public/libs/rwd-table/rwd-table.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

        <div class="col-12">
            <div class="card">


                <div class="card-body">

                    <div class="table-rep-plugin mt-2">

                        <div class="table-responsive mb-0" data-pattern="priority-columns">

                            <button type="button" class="btn btn-success waves-effect waves-light "
                                style=" margin-top:10px !important" data-toggle="modal" data-target="#addnewipaddress">
                                <i class="bx bx-fa-plus font-size-16 align-right"> Add new </i>
                                <i class='fas fa-plus'>fa-plus</i>
                            </button>


                            <table id="tech-companies-1" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th data-priority="1">Client name </th>
                                        <th data-priority="2">Client Email Address</th>
                                        <th data-priority="3">address</th>
                                        <th data-priority="4">status</th>
                                        <th data-priority="5">action </th>
                                    </tr>
                                </thead>
                                <tbody>


                                    @php $i=1 ; @endphp
                                    @foreach ($allipaddress as $ipadd)
                                        <tr>
                                            <td> <span class="co-name">{{ $i }}</span></td>
                                            <td>{{ $ipadd->user->name ?? '' }}</td>
                                            <td>{{ $ipadd->ip_address }}</td>
                                            <td>{{ $ipadd->status == 1 ? 'active' : 'disable' }}</td>
                                            <td>
                                                @if ($ipadd->status == 0)

                                                    <button type="button" onclick="selectid2({{ $ipadd->id }} )"
                                                        class="btn btn-danger waves-effect waves-light"
                                                        style="margin-right:20px" onclick="selectid2({{ $ipadd->id }} )"
                                                        data-toggle="modal" data-target="#updatenewipaddress">
                                                        <i class="bx bx-pencil  font-size-16 align-right "></i> Disable
                                                    </button>
                                                @elseif( $ipadd->status==1)

                                                    <button type="button" onclick="selectid2({{ $ipadd->id }} )"
                                                        class="btn btn-success waves-effect waves-light"
                                                        style="margin-right:20px" onclick="selectid2({{ $ipadd->id }} )"
                                                        data-toggle="modal" data-target="#updatenewipaddress">
                                                        <i class="bx bx-pencil  font-size-16 align-right "></i> Enable
                                                    </button>
                                                @endif

                                            </td>
                                        </tr>

                                        @php $i++ @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div id="addnewipaddress" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                                    <form action="{{ route('ip-addresslist.store') }}" method="Post"
                                        class="custom-validation">
                                        @csrf
                                        <div class="form-group">
                                            <label class="control-label"> User List</label>
                                            <select class="form-control select2" name="user_id" required>
                                                @foreach ($user as $u)
                                                    <option value="{{ $u->id }}"> {{ $u->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ip Address</label>
                                            <div>
                                                <input type="text" name="ip_address" required class="form-control"
                                                    required="" placeholder="Give IP address">
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


    <script>
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





{{-- <scrip>
function getipaddress(ipaddress_id) {
alert(ipaddress_id);


    $.ajax({
        type: "post",
        url: "{{url('/')}}/getSubject",
        data: {'degree_id': degree_id},
        success: function (data) {
            $("#semesterid").html(data);
        }
    });

}
</scrip> --}}

@section('script')



    <!-- Responsive Table js -->
    <script src="{{ URL::asset('public/libs/jquery-vectormap/jquery-vectormap.min.js') }}"></script>
    <script src="{{ URL::asset('public/libs/rwd-table/rwd-table.min.js') }}"></script>

    <!-- Init js -->
    <script src="{{ URL::asset('public/js/pages/table-responsive.init.js') }}"></script>

@endsection
