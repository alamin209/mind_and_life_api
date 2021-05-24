@extends('layouts.master')

@section('title') User List @endsection

@section('css')
<!-- Responsive Table css -->
<link href="{{ URL::asset('/libs/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('content')

    @component('common-components.breadcrumb')
         @slot('title') User List    @endslot
         @slot('li_1')   @endslot
     @endcomponent

<div class="row">


    <div class="col-12">
        <div class="card">


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

         <div class="card-body">

                <div class="table-rep-plugin mt-2">

                    <div class="table-responsive mb-0" data-pattern="priority-columns">

                        <button type="button" class="btn btn-success waves-effect waves-light "style=" margin-top:10px !important" data-toggle="modal" data-target="#addnewuser">
                            <i class="bx bx-fa-plus font-size-16 align-right" > Add new User </i>

                        </button>

                        <table id="tech-companies-1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th data-priority="1">name </th>
                                    <th data-priority="2">email</th>
                                    <th data-priority="3"> Roles </th>
                                    <th data-priority="4">status</th>
                                    <th data-priority="5">action </th>

                                </tr>
                            </thead>
                            <tbody>



                                @foreach ($data as $key => $user)
                                <tr>
                                    <td> <span class="co-name">{{ ++$i }}</span></td>
                                    <td>{{ $user->name }}</td>
                                  <td>{{ $user->email }}</td>
                                    <td>
                                        @if(!empty($user->getRoleNames()))
                                          @foreach($user->getRoleNames() as $v)
                                             <label class="badge badge-success">{{ $v }}</label>
                                          @endforeach
                                        @endif
                                      </td>

                                     <td>{{  $user->status==1 ? 'active' : 'disable'   }}</td>
                                    <td>
                                        @if( $user->status==0)

                                        <button type="button"   onclick="selectid2({{ $user->id }} )"
                                           class="btn btn-danger waves-effect waves-light"style="margin-right:20px" onclick="selectid2({{ $user->id }} )"   data-toggle="modal" data-target="#updatenewipaddress">
                                           <i class="bx bx-pencil  font-size-16 align-right "   ></i> Disable
                                        </button>
                                       @elseif( $user->status==1)

                                       <button type="button"   onclick="selectid2({{ $user->id }} )"
                                           class="btn btn-success waves-effect waves-light"style="margin-right:20px" onclick="selectid2({{ $user->id }} )"   data-toggle="modal" data-target="#updatenewipaddress">
                                           <i class="bx bx-pencil  font-size-16 align-right "   ></i> Enable
                                       </button>
                                   @endif
{{--
                                   <button type="button"   onclick="selectid2({{ $user->id }} )"
                                    class="btn btn-success waves-effect waves-light"style="margin-right:20px" onclick="selectid2({{ $user->id }} )"   data-toggle="modal" data-target="#updatenewipaddress">
                                    <i class="bx eye  font-size-16 align-right "   ></i> View
                                </button> --}}


                                </td>
                                </tr>

                                @endforeach
                            </tbody>


                        </table>

                        {!! $data->render() !!}
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->

<div id="addnewuser"   class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Create New User </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
              <div class="modal-body">

              <div class="row">
                  <div class="col-md-12 col-lg-12">

                    <div class="card">
                            <div class="card-body">
                                <form action="{{  route('userlist.store') }}"  method="Post" class="custom-validation">
                                    @csrf

                                    <div class="form-group">
                                        <label>Name</label>
                                        <div>
                                            <input type="text" name="name"    class="form-control" required=""  placeholder="user name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>User Email</label>
                                        <div>
                                            <input type="email" name="email"    required=""   class="form-control"   placeholder="Email">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label>User Password </label>
                                        <div>
                                            <input type="text" name="password"  required  class="form-control" value="admin12345" required=""  placeholder="by default it will admin 12345 but you can chanage it  ">
                                        </div>
                                    </div>


                                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Role:</strong>
                                            {!! Form::checkbox('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                                        </div>
                                    </div> --}}

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Role:</strong>
                                            <br/>
                                            @foreach($roles as $value)
                                                <label>{{ Form::checkbox('roles[]', $value->id, false, array('class' => 'name')) }}
                                                {{ $value->name }}</label>
                                            <br/>
                                            @endforeach
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




<div id="updatenewipaddress"   class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
    function selectid2(x)
 {

     $.ajaxSetup({
         headers: {'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')}
     });
     $.ajax({
         type:'get',

         url: "{{ url('userlist') }}/"+x ,
        //  data:{id:btn},
         cache: false,
         success:function(data) {

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
<script src="{{ URL::asset('public/libs/jquery-vectormap/jquery-vectormap.min.js')}}"></script>
<script src="{{ URL::asset('public/libs/rwd-table/rwd-table.min.js')}}"></script>

<!-- Init js -->
<script src="{{ URL::asset('public/js/pages/table-responsive.init.js')}}"></script>

@endsection
