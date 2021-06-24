@extends('layouts.master')

@section('title') {{  $title }} @endsection

@section('css')
    <!-- Responsive Table css -->
    <link href="{{ URL::asset('admin/public/libs/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('public/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('title')About Us   @endslot
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
                        <a href="{{ url('/about-us') }} ">Back About Us</a>
                    </button>
                </div>

                <div class="card-body" style="overflow-y: auto;">
                    <form method="POST" action="{{ route('store-about-us') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="control-label">title</label>
                            <input class="form-control" name="title" type="text" placeholder="Give Article Title"
                                   required>
                        </div>

                        <div class="form-group">
                            <label class="mb-0"> Images </label><br>
                            <div>
                                <input type="file" required name="image_path" accept="image/*"
                                       onchange="preview_company_signature(event)" class="form-control">
                                <img id="image_path"/>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Description </label>
                            <textarea name="description" id="project_details" rows="10" class="form-control"></textarea>
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
        function preview_company_signature(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('image_path');
                output.style.width = "150px";
                output.style.height = "150px";
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

        $(document).ready(function () {
            var max_fields = 15; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div><input type="text" class="form-control" placeholder="Give the tag name"   name="tag_name[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
                }
            });

            $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });
    </script>
@endsection
