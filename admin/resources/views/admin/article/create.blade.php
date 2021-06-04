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
        @slot('title')Create New Article   @endslot
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
                        <a href="{{ route('article.index') }}"> Back To Article </a>
                    </button>
                </div>

                <div class="card-body" style="overflow-y: auto;">
                    <form method="POST" action="{{ route('article.store') }}" enctype="multipart/form-data">
                        @csrf
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
                            <label class="control-label">Select Author </label>
                            <select name="user_id" class="form-control select2" required>
                                <option value="">Select Author</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}"> {{ $user->username }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">title</label>
                            <input class="form-control" name="title" type="text" placeholder="Give Article Title"
                                   required>
                        </div>

                        <div class="form-group">
                            <label class="mb-0"> Images </label><br>
                            <small>Press Ctrl to upload multiple</small>
                            <div>
                                {{-- <input type="file" required name="image_path" accept="image/*"
                                       onchange="preview_company_signature(event)" class="form-control">
                                <img id="image_path"/> --}}
                                <input type="file" required name="article_image[]" accept="image/*"  class="form-control" multiple="">
                                <img id="image_path"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Description </label>
                            <textarea name="description" id="project_details" rows="10" class="form-control"></textarea>
                        </div>


                        <div class="form-group">
                            <label class="control-label">Posting Date</label>
                            <input class="form-control" name="post_date" type="date" placeholder="Give Article Date"
                                   required>
                        </div>

                        <div class="input_fields_wrap" style="margin-bottom:10px">
                            <button class=" add_field_button btn btn-success" style="margin-bottom:10px">Add More Tag
                            </button>
                            <div style="margin-bottom:10px">
                                <input class="form-control" required placeholder="Give the tag name" type="text"
                                       name="tag_name[]">
                            </div>
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
