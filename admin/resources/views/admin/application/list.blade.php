@extends('layouts.master')

@section('title') {{  $title }} @endsection

@section('css')
<!-- Responsive Table css -->
<link href="{{ URL::asset('admin/public/libs/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" /> --}}


@section('content')
@component('common-components.breadcrumb')
         @slot('title') Application  List    @endslot
         @slot('li_1')   @endslot
     @endcomponent

<div class="row" >
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

        <div class="col-md-12 col-lg-12 ">
            <div class="card">
                <button type="button" class="btn btn-success waves-effect waves-light "style="height:10%;width:10%" data-toggle="modal" data-target="#addClinet">
                    <a style="text-decoration: none; color: #FFF" href="{{ route('applications.create') }}"><i class="bx bx-fa-plus font-size-16 align-right" > Add new </i></a>
                    {{-- <i class='fas fa-plus'>fa-plus</i> --}}
                </button>

                <div class="card-body"   style="height:630px;  overflow-y: auto;"  >
                        <table class="table client-dt" >
                            <thead>
                                <tr>
                                    <th>Id</th>
                                     <th>Project</th>
                                    <th>Vendor</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($applications as $application)
                                        <tr>
                                            <td>{{ $loop->index +1  }}</td>
                                            <td>{{ $application->project->name }}</td>
                                            <td>{{ $application->vendor->company_name }}</td>
                                            <td>{{ $application->sub_total }}</td>
                                            <td>
                                                <button class="btn btn-success"><a style="color: #FFF; text-decoration: none" href="{{ route('applications.show', $application->id) }}">View</a></button>
                                                <button class="btn btn-warning"><a style="color: #FFF; text-decoration: none" href="{{ route('applications.edit', $application->id) }}">Edit</a></button>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    <!-- end col -->
</div>



{{-- <script src="{{ URL::asset('public/js/pages/table-responsive.init.js')}}"></script> --}}

<script type="text/javascript">


</script>

@endsection
