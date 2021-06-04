@extends('layouts.master')

@section('title') Responsive Table @endsection

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

        <div class="col-md-12 col-lg-12 ">


                <div class="card">

                    @if(count($data))

                     @else
                        <button type="button" class="btn btn-success waves-effect waves-light " style="height:10%;width:10%">
                            {{-- <i class="bx bx-fa-plus font-size-16 align-right" > Add new </i> --}}
                            <a href="{{ route('point.create') }}"> Add New </a>
                        </button>
                   @endif

                <div class="card-body" style="height:630px;  overflow-y: auto;">
                    <table class="table yajra-dt">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>referral point</th>
                            <th>article share  point</th>
                            <th>article like point</th>
                            <th>article bookmark point</th>
                            {{-- <th>article read point</th>
                            <th>share video point</th>
                            <th>video like point</th>
                            <th>video bookmark point</th>
                            <th>video watch point</th>
                            <th>share coupon point</th>
                            <th>download  coupon point</th>
                            <th>redeem coupon point</th>
                            <th>share quiz point</th>
                            <th>doing quiz point</th>
                            <th>quiz point</th>
                            <th>daily login point</th> --}}
                            {{-- <th>Image Path</th> --}}
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>

    <div id="addnewcategory" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Add New Category </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{  route('quiz-type.store') }}" method="Post"
                                          class="custom-validation" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Name </label>
                                            <div>
                                                <input type="text" name="name" class="form-control"
                                                       placeholder="Quiz Type">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Photo </label>
                                            <div>
                                                <input type="file" name="image_path" accept="image/*"
                                                       onchange="preview_quiz_image(event)"
                                                       class="form-control">
                                                <img id="quiz_image_path" style="margin-top:10px ;margin -left:20px"/>
                                            </div>
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


    <div id="updatecategory" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div id="txtHint">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



    {{-- <script src="{{ URL::asset('public/js/pages/table-responsive.init.js')}}"></script> --}}

    <script type="text/javascript">
        function preview_quiz_image(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('quiz_image_path');
                output.style.width = "180px";
                output.style.height = "auto";
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        $(function () {
            var table = $('.yajra-dt').DataTable({
                processing: true,
                serverSide: true,

                ajax: "{{ route('point.index') }}",
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                    {
                        data: 'referral_point',
                        name: 'referral_point'
                    },
                    {
                        data: 'article_share__point',
                        name: 'article_share__point'
                    },
                    {
                        data: 'article_like_point',
                        name: 'article_like_point'
                    },
                    {
                        data: 'article_bookmark_point',
                        name: 'article_bookmark_point'
                    },
                    // {
                    //     data: 'article_read_point',
                    //     name: 'article_read_point'
                    // },
                    // {
                    //     data: 'share_video_point',
                    //     name: 'share_video_point'
                    // },
                    // {
                    //     data: 'video_like_point',
                    //     name: 'video_like_point'
                    // },
                    // {
                    //     data: 'video_bookmark_point',
                    //     name: 'video_bookmark_point'
                    // },
                    // {
                    //     data: 'video_watch_point',
                    //     name: 'video_watch_point'
                    // },
                    // {
                    //     data: 'share_coupon_point',
                    //     name: 'share_coupon_point'
                    // },
                    // {
                    //     data: 'download__coupon_point',
                    //     name: 'download__coupon_point'
                    // },
                    // {
                    //     data: 'redeem_coupon_point',
                    //     name: 'redeem_coupon_point'
                    // },
                    // {
                    //     data: 'share_quiz_point',
                    //     name: 'share_quiz_point'
                    // },
                    // {
                    //     data: 'doing_quiz_point',
                    //     name: 'doing_quiz_point'
                    // },
                    // {
                    //     data: 'quiz_point',
                    //     name: 'quiz_point'
                    // },
                    // {
                    //     data: 'daily_login_point',
                    //     name: 'daily_login_point'
                    // },
                    // {
                    //     data: 'image_path',
                    //     name: 'image_path',
                    //     render: function (data, type, full, meta) {
                    //         return "<img src=\"" + data + "\"  alt=\"Quiz Type Image \"/ height=\"100px\"/ width=\"100px\"/>";
                    //     }
                    // },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            })


        });


        function selectid2(x) {
            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')}
            });
            $.ajax({
                type: 'get',
                url: "{{ url('quiz-type') }}/" + x,
                //  data:{id:btn},
                cache: false,
                success: function (data) {
                    $('#txtHint').html(data);
                }
            });
        }

        function delete_quiz_type(x) {
            if (confirm("are you sure to delete this Quiz Type?")) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
                    }
                });

                btn = $(x).data('panel-id');

                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('quiz-type') }}/" + x,
                    data: {id: btn},
                    cache: false,
                    success: function (data) {
                        alert(' Selected  Quiz Type  deleted Successfully');
                        location.reload();

                    }
                });
            }


        }

    </script>

@endsection
