@extends('layouts.master')

@section('title') {{  $title }} @endsection

@section('css')
    <!-- Responsive Table css -->
    <link href="{{ URL::asset('admin/public/libs/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('public/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" /> --}}


@section('content')
    @component('common-components.breadcrumb')
        @slot('title')Create New Coupon   @endslot
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

        <div class="col-md-12 col-lg-12 ">

            <div class="card">
                <div class="col-md-12 col-lg-12 ">
                    <button type="button" class="btn btn-success waves-effect waves-light float-right">
                        {{-- <i class="bx bx-fa-plus font-size-16 align-right" > Add new </i> --}}
                        <a href="{{ route('coupon.index') }}"> Back To Coupon </a>
                    </button>
                </div>

                <div class="card-body" style="overflow-y: auto;">
                    <form method="POST" action="{{ route('coupon.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label> Image </label>
                            <div>
                                <input type="file" required name="image_path" accept="image/*"
                                       onchange="preview_coupon_image(event)" class="form-control">
                                <img id="image_path"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Select Category </label>
                            <select name="category_id" class="form-control select2" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Heading</label>
                            <input class="form-control" name="heading" type="text" placeholder="Heading" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Expire Date</label>
                            <input class="form-control" name="expire_date" type="date" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Offer Brand</label>
                            <input class="form-control" name="offer_brand" type="text" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Price</label>
                            <input class="form-control" name="price" type="number" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Download Limit</label>
                            <input class="form-control" name="download_limit" type="number" required>
                        </div>

                        {{-- <div class="form-group">
                            <label class="control-label">Total Download</label>
                            <input class="form-control" name="total_download" type="number" required>
                        </div> --}}

                        <div class="form-group">
                            <label class="control-label">Description </label>
                            <textarea name="description" id="project_details" rows="5" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Terms and Condition </label>
                            <textarea name="term_condition" id="project_details" rows="5"
                                      class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <button class="form-control btn btn-primary waves-effect waves-light"
                                    style="height:10% ;width:10% ">Submit
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection

@section('script')

    <script type='text/javascript'>
        function preview_coupon_image(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('image_path');
                output.style.width = "200px";
                output.style.height = "200px";
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

    </script>

    <script src="{{ asset('public/libs/select2/select2.min.js')}}"></script>
    <script src="{{ asset('public/libs/tinymce/tinymce.min.js')}}"></script>


    <script>
        $(function () {
            $('.select2').select2();
            tinymce.init({
                selector: '#project_details',
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor colorpicker textpattern imagetools"
                ],
                toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ",
                toolbar2: "print preview media | forecolor backcolor emoticons",
                image_advtab: true
            });
        })
    </script>
@endsection
