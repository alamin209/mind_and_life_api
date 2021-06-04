@extends('layouts.master')

@section('title') Responsive Table @endsection

@section('css')
    <!-- Responsive Table css -->
    <link href="{{ URL::asset('admin/public/libs/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" /> --}}


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
                <button type="button" class="btn btn-success waves-effect waves-light " style="height:10%;width:10%"
                        data-toggle="modal" data-target="#addnewcategory">
                    <i class="bx bx-fa-plus font-size-16 align-right"> Add new </i>
                    {{-- <i class='fas fa-plus'>fa-plus</i> --}}
                </button>

                <div class="card-body" style="height:630px;  overflow-y: auto;">
                    <table class="table yajra-dt">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Quiz Type</th>
                            <th>Heading</th>
                            <th>Image Path</th>
                            <th>Total View</th>
                            <th>Total Share</th>
                            <th>Total Download</th>
                            <th>Total Point</th>
                            {{-- <th>Total Question</th>
                            <th>Total Min</th> --}}
                            <th>Status</th>
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
                                    <form action="{{  route('quiz.store') }}" method="Post" class="custom-validation"
                                          enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label>Quiz Type </label>
                                            <div>
                                                <select name="quiz_type_id" class="form-control">
                                                    @if(count($quizTypes)>0)
                                                        <option value="">--Select Type--</option>
                                                        @foreach($quizTypes as $quizType)
                                                            <option
                                                                value="{{$quizType->id}}">{{$quizType->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Heading </label>
                                            <div>
                                                <input type="text" name="heading" class="form-control"
                                                       placeholder="Heading">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Description </label>
                                            <div>
                                                <textarea name="description" class="form-control"
                                                          placeholder="Description"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Photo </label>
                                            <div>
                                                <input type="file" name="image_path" accept="image/*"
                                                       onchange="preview_quiz_image(event)"
                                                       class="form-control">
                                                <img id="quiz_image_path"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Total View </label>
                                            <div>
                                                <input type="number" name="total_view" class="form-control"
                                                       placeholder="Total View">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Total Share </label>
                                            <div>
                                                <input type="text" name="tota_share" class="form-control"
                                                       placeholder="Total Share">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Total Download </label>
                                            <div>
                                                <input type="number" name="total_download" class="form-control"
                                                       placeholder="Total Download">
                                            </div>
                                            <input type="hidden" name="type" value="video">
                                        </div>
                                        <div class="form-group">
                                            <label>Total Point </label>
                                            <div>
                                                <input type="number" name="total_point" class="form-control"
                                                       placeholder="Total Point">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Total Question </label>
                                            <div>
                                                <input type="number" name="total_question" class="form-control"
                                                       placeholder="Total Question">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Total Min </label>
                                            <div>
                                                <input type="number" name="total_min" class="form-control"
                                                       placeholder="Total Min">
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
                output.style.width = "200px";
                output.style.height = "200px";
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        $(function () {
            var table = $('.yajra-dt').DataTable({
                processing: true,
                serverSide: true,

                ajax: "{{ route('quiz.index') }}",
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                    {
                        data: 'quiz_type_id',
                        name: 'quiz_type_id'
                    },
                    {
                        data: 'heading',
                        name: 'heading'
                    },
                    {
                        data: 'image_path',
                        name: 'image_path',
                        render: function (data, type, full, meta) {
                            return "<img src=\"" + data + "\"  alt=\"Quiz Type Image \"/ height=\"100px\"/ width=\"100px\"/>";
                        }
                    },
                    {
                        data: 'total_view',
                        name: 'total_view'
                    },
                    {
                        data: 'tota_share',
                        name: 'tota_share'
                    },
                    {
                        data: 'total_download',
                        name: 'total_download'
                    },
                    {
                        data: 'total_point',
                        name: 'total_point'
                    },
                    // {
                    //     data: 'total_question',
                    //     name: 'total_question'
                    // },
                    // {
                    //     data: 'total_min',
                    //     name: 'total_min'
                    // },
                    {
                        data: 'status',
                        name: 'status'
                    },
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
                url: "{{ url('quiz') }}/" + x,
                //  data:{id:btn},
                cache: false,
                success: function (data) {
                    $('#txtHint').html(data);
                }
            });
        }

        function delete_quiz_type(x) {
            if (confirm("are you sure to delete this Quiz?")) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
                    }
                });

                btn = $(x).data('panel-id');

                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('quiz') }}/" + x,
                    data: {id: btn},
                    cache: false,
                    success: function (data) {
                        alert(' Selected  Quiz  deleted Successfully');
                        location.reload();

                    }
                });
            }


        }

    </script>

@endsection
