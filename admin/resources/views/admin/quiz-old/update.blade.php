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
        @slot('title')Update  Article   @endslot
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
                        <a href="{{ route('videos.index') }}"> Back To Video </a>
                    </button>
                </div>

                <div class="card-body" style="overflow-y: auto;">
                    <form method="POST" action="{{ url('videos/'.$video->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label class="control-label">Select Category </label>
                            <select name="category_id" class="form-control select2" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option @if($video->category_id == $category->id) selected="selected"
                                            @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Select Author </label>
                            <select name="user_id" class="form-control select2" required>
                                <option value="">Select Author</option>
                                @foreach($users as $user)
                                    <option @if($video->user_id == $user->id) selected="selected"
                                            @endif  value="{{ $user->id }}">{{ $user->username }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Title</label>
                            <input class="form-control" name="title" type="text" placeholder="Give Video Title"
                                   required value="{{$video->title}}">
                        </div>

                        @if ($video->type == 'link')
                            Previous Video
                            <iframe width="100%" height="150"
                                    src="{{str_replace('youtu.be', 'youtube.com/embed',str_replace('watch?v=','embed/',$video->youtube_link))}}"
                                    title="{{$video->category_name}}" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        @else
                            @if (file_exists($video->video_path))
                                Previous Video
                                <video width="100%" height="150" controls>
                                    <source src="{{$video->video_path}}" type="video/mp4">
                                </video>
                            @else
                            @endif
                        @endif

                        <div class="custom-control custom-checkbox" style="margin-bottom:15px">
                            <input type="checkbox" name='check_type' class="custom-control-input"
                                   value="1" id="invalidCheck" @if (old('link', $video->link)) checked @endif >
                            <label class="custom-control-label" for="invalidCheck">is Youtube ?</label>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group autoUpdate" id="autoUpdate" style="display:none;">
                            <label> Give Youtube Link</label>
                            <div>
                                <input type="text" name="youtube_link" class="form-control"
                                       placeholder="Please  Youtube Link" value="{{$video->youtube_link}}">
                            </div>
                        </div>

                        <div class="show_website_add" id="show_website_add">
                            <input type="file" name="video_path" accept="video/*" id="input-tag"/>
                            <hr>
                            <video controls id="video-tag" width="25%" height="25%">
                                <source id="video-source" src="splashVideo">
                                Your browser does not support the video tag.
                            </video>

                        </div>


                        <div class="form-group">
                            <label class="control-label">Quotation Details </label>
                            <textarea name="project_details" id="project_details" rows="10"
                                      class="form-control" value="{{$video->project_details}}"></textarea>
                        </div>


                        <div class="form-group">
                            <label class="control-label">Posting Date</label>
                            <input class="form-control" name="post_date" type="date" placeholder="Give Article Date"
                                   required value="{{$video->post_date}}">
                        </div>

                        <div class="input_fields_wrap" style="margin-bottom:10px">
                            <button class=" add_field_button btn btn-success" style="margin-bottom:10px">Add More Tag
                            </button>

                            @isset($video->article_tags)
                                @foreach ( $video->article_tags  as $video->article_tag )
                                    <div style="margin-bottom:10px">
                                        <input class="form-control {{ $video->index+1 }}" required
                                               placeholder="Give the tag name"
                                               value="{{$video->article_tag['tag_name']}}" type="text"
                                               name="tag_name[]"><a href="#" class="remove_field {{ $video->index+1 }}">Remove</a>
                                    </div>
                        </div>
                    @endforeach
                    @endisset
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
    </div>
    <!-- end col -->
    </div>
@endsection



@section('script')

    <script type='text/javascript'>

        const videoSrc = document.querySelector("#video-source");
        const videoTag = document.querySelector("#video-tag");
        const inputTag = document.querySelector("#input-tag");

        inputTag.addEventListener('change', readVideo)

        function readVideo(event) {
            console.log(event.target.files)
            if (event.target.files && event.target.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    console.log('loaded')
                    videoSrc.src = e.target.result
                    videoTag.load()
                }.bind(this)

                reader.readAsDataURL(event.target.files[0]);
            }
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

        $('#invalidCheck').click(function () {
            if ($(this).is(':checked')) {
                $("#autoUpdate").show();
                $("#show_website_add").hide();

            } else {
                $("#autoUpdate").hide();
                $("#show_website_add").show();
            }
        });

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
