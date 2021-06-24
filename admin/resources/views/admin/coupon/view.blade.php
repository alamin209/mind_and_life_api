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
        @slot('title')Create New Coupon @endslot
        @slot('li_1') @endslot

    @endcomponent

    <div class="row">


        <div class="col-md-12 col-lg-12 ">

            <div class="card">
                <div class="col-md-12 col-lg-12 ">
                    <button type="button" class="btn btn-success waves-effect waves-light float-right">
                        {{-- <i class="bx bx-fa-plus font-size-16 align-right" > Add new </i> --}}
                        <a href="{{ route('coupon.index') }}"> Back To Coupon </a>
                    </button>
                </div>

                <div class="card-body">
                    <div class="row ">

                        <div class="col-md-3" style="border:1px solid #8f52a0 ;text-align:center" >
                            <i class="fa fa-download"    style="font-size:30px;color:#31bdf2"  data-toggle="tooltip" title="Downlad Limit" aria-hidden="true"> </i>
                           <span  class="text-center" style="font-size:30px;" > {{ $coupon->download_limit }}</span>
                        </div>
                        <div class="col-md-2" style="border:1px solid #8f52a0 ;text-align:center">
                            <i class="far fa-arrow-alt-circle-down" style="font-size:30px; color:#2dcb70"  data-toggle="tooltip" title="Total User  Downlaod!" > </i>
                            <span  class="text-center" style="font-size:30px;" >{{ $coupon->total_download }}</span>
                        </div>
                        <div class="col-md-2" style="border:1px solid #8f52a0 ;text-align:center">
                            <i class="fas fa-gifts" style="font-size:30px; color:#238ae6"  data-toggle="tooltip" title="Total Redeemed!" ></i>
                            <span  class="text-center" style="font-size:30px;" >{{ $coupon->total_redeemed }}</span>
                        </div>
                        <div class="col-md-2" style="border:1px solid #8f52a0 ;text-align:center">
                            <i class="fas fa-share-alt" style="font-size:30px; color:#238ae6"  data-toggle="tooltip" title="Total shared!"></i>
                            <span  class="text-center" style="font-size:30px;" >{{ $coupon->total_redeemed }}</span>
                        </div>
                        <div class="col-md-3" style="border:1px solid #8f52a0 ;text-align:center">

                            <i class="fas fa-eye" style="font-size:30px; color:#238ae6"  data-toggle="tooltip" title="Total View!"></i>
                            <span  class="text-center" style="font-size:30px;" >{{ $coupon->total_view }}</span>
                        </div>
                    </div>
                    <hr>
                     <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <h1 class="text-center">  Title: {{ $coupon->heading }} </h1>

                            <h2 class="text-center"> Category: {{ $coupon->category->name ?? '' }} </h2>
                            <h3 class="text-center">Offer Brand: {{ $coupon->offer_brand }}</h3>
                            <h3 class="text-center">Brand Barcode : <img
                                    src="data:image/png;base64,{{ DNS1D::getBarcodePNG(strtolower($coupon->offer_brand), 'C39') }}"
                                    alt="barcode" /><br><br></h3>
                            <h3 class="text-center">Description: </h3>
                            <span class="text-center">{!! $coupon->description !!} </span>
                            <h2 style="color:red" class="text-center">Terms and Condition </h2>
                            <span class="text-center">{!! $coupon->term_condition !!} </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
