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
        @slot('title')Create New Article @endslot
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

        <div class="col-md-12 col-lg-12 ">

            <div class="card">
                <div class="col-md-12 col-lg-12 ">
                    <button type="button" class="btn btn-success waves-effect waves-light float-right">
                        {{-- <i class="bx bx-fa-plus font-size-16 align-right" > Add new </i> --}}
                        <a href="{{ route('point.index') }}"> Back To Point </a>
                    </button>
                </div>

                <div class="card-body" style="overflow-y: auto;">
                    <form method="POST" action="{{ route('point.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 col-lg-4 ">
                                <div class="form-group">
                                    <label class="control-label">referral point</label>
                                    <input class="form-control" name="referral_point" type="text"
                                        placeholder="Give referral point">
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-4 ">
                                <div class="form-group">
                                    <label class="control-label">article share point</label>
                                    <input class="form-control" name="article_share__point" type="text"
                                        placeholder="Give article share  point">
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 ">
                                <div class="form-group">
                                    <label class="control-label">article like point</label>
                                    <input class="form-control" name="article_like_point" type="text"
                                        placeholder="Give article like point">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-lg-4 ">
                                <div class="form-group">
                                    <label class="control-label">article bookmark point</label>
                                    <input class="form-control" name="article_bookmark_point" type="text"
                                        placeholder="Give article bookmark point">
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 ">
                                <div class="form-group">
                                    <label class="control-label">article read point</label>
                                    <input class="form-control" name="article_read_point" type="text"
                                        placeholder="Give article read point">
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 ">
                                <div class="form-group">
                                    <label class="control-label">share video point</label>
                                    <input class="form-control" name="share_video_point" type="text"
                                        placeholder="Give share video point">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-lg-4 ">
                                <div class="form-group">
                                    <label class="control-label">video like point</label>
                                    <input class="form-control" name="video_like_point" type="text"
                                        placeholder="Give video like point">
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 ">
                                <div class="form-group">
                                    <label class="control-label">video bookmark point</label>
                                    <input class="form-control" name="video_bookmark_point" type="text"
                                        placeholder="Give video bookmark point">
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 ">
                                <div class="form-group">
                                    <label class="control-label">video watch point</label>
                                    <input class="form-control" name="video_watch_point" type="text"
                                        placeholder="Give video watch point">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-lg-4 ">
                                <div class="form-group">
                                    <label class="control-label">share coupon point</label>
                                    <input class="form-control" name="share_coupon_point" type="text"
                                        placeholder="Give share coupon point">
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-4 ">
                                <div class="form-group">
                                    <label class="control-label">download coupon point</label>
                                    <input class="form-control" name="download__coupon_point" type="text"
                                        placeholder="Give download  coupon point">
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-4 ">
                                <div class="form-group">
                                    <label class="control-label">redeem coupon point</label>
                                    <input class="form-control" name="redeem_coupon_point" type="text"
                                        placeholder="Give redeem coupon point">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-lg-4 ">
                                <div class="form-group">
                                    <label class="control-label">share quiz point</label>
                                    <input class="form-control" name="share_quiz_point" type="text"
                                        placeholder="Give share quiz point">
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-4 ">
                                <div class="form-group">
                                    <label class="control-label">doing quiz point</label>
                                    <input class="form-control" name="doing_quiz_point" type="text"
                                        placeholder="Give doing quiz point">
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 ">
                                <div class="form-group">
                                    <label class="control-label">quiz point</label>
                                    <input class="form-control" name="quiz_point" type="text" placeholder="Give quiz point">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 col-lg-7 ">
                                <div class="form-group">
                                    <label class="control-label">daily login point</label>
                                    <input class="form-control" name="daily_login_point" type="text"
                                        placeholder="Give daily login point">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-lg-12 ">

                                <div class="form-group">
                                    <button class="form-control btn btn-primary waves-effect waves-light"
                                        style="height:10% ;width:10% ">Submit
                                    </button>
                                </div>
                            </div>
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
            reader.onload = function() {
                var output = document.getElementById('image_path');
                output.style.width = "200px";
                output.style.height = "200px";
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

    </script>

    <script src="{{ asset('public/libs/select2/select2.min.js') }}"></script>
    <script src="{{ asset('public/libs/tinymce/tinymce.min.js') }}"></script>


    <script>
        $(function() {
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

        $(document).ready(function() {
            var max_fields = 15; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append(
                        '<div><input type="text" class="form-control" placeholder="Give the tag name"   name="tag_name[]"/><a href="#" class="remove_field">Remove</a></div>'
                    ); //add input box
                }
            });

            $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });

    </script>
@endsection
