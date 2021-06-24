@extends('layouts.master')

@section('title') {{ $title }} @endsection

@section('css')
    <!-- Responsive Table css -->
    <link href="{{ URL::asset('admin/public/libs/rwd-table/rwd-table.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('public/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" /> --}}


@section('content')
    @component('common-components.breadcrumb')
        @slot('title') {{ $title }} @endslot
        @slot('li_1') @endslot

    @endcomponent

    <div class="row">


        <div class="col-md-12 col-lg-12 ">

            <div class="card">
                <div class="col-md-12 col-lg-12 ">

                        @if(session()->has('message'))
                            <div class="alert alert-{{ session('type')  }} alert-dismissible fade show" role="alert">
                                <h5 class="text-center"> {{ session('message')  }} </h5>
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

                <div class="card-body">

                    <div class="container">

                        <div class="row">
                            <div class="col-md-12">
                                <h2 style="color:red" class="text-center" >User List for Noticition</h2>
                                <form method="post" action="{{ route('push-notifications.store') }}">
                                    @csrf

                                    <button type="button" class="btn btn-success waves-effect waves-light "  value="selectAll" class="main" onclick="checkAll()">Select
                                        All</button>
                                    <button type="button" class="btn btn-warning waves-effect waves-light" value="deselectAll" class="main"
                                        onclick="uncheckAll()">Clear</button>
                                    <table  class="table table-bordered table-condensed table-hover table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th> Name </th>
                                                <th> Devic Token </th>

                                            </tr>
                                        </thead>
                                        <tbody class="text-left">

                                            @foreach ( $data as $user )

                                             <tr>
                                                <td><input type="checkbox" name="user[]" value="{{ $user->id }}" style="padding-right:10px"> {{  $user->username}} </td>

                                                <td> @if($user->devices()->exists())

                                                     this user will recive the notification

                                                    @else

                                                    The User is not login yet

                                                @endif
                                            </td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>


                                    <div class="form-group">
                                        <label class="control-label">title</label>
                                        <input class="form-control" name="title"  type="text" placeholder="title" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Body</label>
                                        <input class="form-control" name="body"   placeholder="Give the Body"  type="text"  required>
                                    </div>



                                    <input type="submit"  class="btn btn-primary waves-effect waves-light " value="Submit" name="submit">
                                </form>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        // Select all check boxes : Setting the checked property to true in checkAll() function
                        function checkAll() {
                            var items = document.getElementsByName('user[]');
                            for (var i = 0; i < items.length; i++) {
                                if (items[i].type == 'checkbox')
                                    items[i].checked = true;
                            }
                        }
                        // Clear all check boxes : Setting the checked property to false in uncheckAll() function
                        function uncheckAll() {
                            var items = document.getElementsByName('user[]');
                            for (var i = 0; i < items.length; i++) {
                                if (items[i].type == 'checkbox')
                                    items[i].checked = false;
                            }
                        }

                    </script>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
