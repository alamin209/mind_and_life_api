@extends('layouts.master')

@section('title') Setting @endsection

@section('css')
    <!-- Responsive Table css -->
    <link href="{{ URL::asset('admin/public/libs/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('title') {{$title}}    @endslot
        @slot('li_1')   @endslot
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
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">


                <div class="px-5 py-5 quiz-q-items-container card-body">
                    @if(count($data))


                    @else
                        <button type="button" class="btn btn-success waves-effect waves-light " style="margin-bottom: 10px;">
                            <a href="{{ url('/create-about-us') }}"> Add About Us </a>
                        </button>
                    @endif

                    <h2 class="quiz_heading"></h2>
                    <div class="quiz-q-items-wrapper">

                        @php  $about_us_id= 0; @endphp
                        @foreach ($data as $aboutus )
                        <div class="text-center">
                         <img  src="{{ $aboutus->image_path }}" alt="Responsive image" style="margin-bottom: 10px" >
                          <h2>{{ $aboutus->title }}</h2>

                           <span>{!! $aboutus->description !!}</span>
                        </div>

                        @php $about_us_id =   $aboutus->id  @endphp

                        @endforeach


                        @if(count($data))
                        <button type="button" class="btn btn-success waves-effect float-right waves-light " style="margin-bottom: 10px;">
                            <a href="{{ url('/show-about-us/'.$about_us_id) }}"> update </a>
                        </button>
                       @endif

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
