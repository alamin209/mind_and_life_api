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
                <a href="{{route('quiz-question.create')}}" class="btn btn-success waves-effect waves-light "
                   style="height:10%;width:10%">
                    <i class="bx bx-fa-plus font-size-16 align-right"> Add new </i>
                    <!-- <i class='fas fa-plus'>fa-plus</i> -->
                </a>

                <div class="card-body" style="height:630px;  overflow-y: auto;">
                    <table class="table yajra-dt">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Quiz Name</th>
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
                                    <form action="{{  route('quiz-question.store') }}" method="Post"
                                          class="custom-validation" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Quiz </label>
                                            <div>
                                                <select name="quiz_id" class="form-control">
                                                    @if(count($quizzes)>0)
                                                        <option value="">--Select Type--</option>
                                                        @foreach($quizzes as $quiz)
                                                            <option value="{{$quiz->id}}">{{$quiz->heading}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Question </label>
                                            <div>
                                                <input type="text" name="name" class="form-control"
                                                       placeholder="Question">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Question Type</label>
                                            <div class="multiple-single-dropdown">
                                                <select name="type" class="form-control">
                                                    <option value="multiple">Multiple</option>
                                                    <option value="single">Single (True/False)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="dropdown-options multiple-options" style="display: none;">
                                        </div>
                                        <div class="dropdown-options single-options" style="display: none;">
                                        </div>
                                        <div class="form-group">
                                            <label>Correct Answer</label>
                                            <div>
                                                <style type="text/css">
                                                    .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
                                                        padding-left: 15px;
                                                    }
                                                </style>
                                                <select class="select-qcorrect-answer form-control"
                                                        name="correct_answer[]" multiple="multiple" required="">
                                                    <option value=""></option>
                                                </select>
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
        if ($('.multiple-single-dropdown select').val() == 'multiple') {
            $('.select-qcorrect-answer').empty();
            $('.dropdown-options.single-options').empty();
            $('.dropdown-options.multiple-options').append('<div class="row">\
            <div class="col-md-6 form-group">\
                <label>Option 1</label>\
                <div>\
                    <input type="text" name="option_1"    class="form-control"   placeholder="Option 1">\
                </div>\
            </div>\
            <div class="col-md-6 form-group">\
                <label>Option 2</label>\
                <div>\
                    <input type="text" name="option_2"    class="form-control"   placeholder="Option 2">\
                </div>\
            </div>\
            <div class="col-md-6 form-group">\
                <label>Option 3</label>\
                <div>\
                    <input type="text" name="option_3"    class="form-control"   placeholder="Option 3">\
                </div>\
            </div>\
            <div class="col-md-6 form-group">\
                <label>Option 4</label>\
                <div>\
                    <input type="text" name="option_4"    class="form-control"   placeholder="Option 4">\
                </div>\
            </div>\
        </div>');
            $('.dropdown-options.multiple-options').show('500');
        } else {
            $('.select-qcorrect-answer').empty();
            $('.dropdown-options.multiple-options').empty();
            $('.dropdown-options.single-options').append('<div class="row">\
            <div class="col-md-6 form-group">\
                <label>Option 1</label>\
                <div>\
                    <input type="text" name="option_1"    class="form-control"   placeholder="Option 1">\
                </div>\
            </div>\
            <div class="col-md-6 form-group">\
                <label>Option 2</label>\
                <div>\
                    <input type="text" name="option_2"    class="form-control"   placeholder="Option 2">\
                </div>\
            </div>\
        </div>');
            $('.dropdown-options.single-options').show('500');
        }
        $('.multiple-single-dropdown select').on('change', function () {
            if ($(this).val() == 'multiple') {
                $('.select-qcorrect-answer').empty();
                $('.dropdown-options.single-options').empty();
                $('.dropdown-options.multiple-options').append('<div class="row">\
                <div class="col-md-6 form-group">\
                    <label>Option 1</label>\
                    <div>\
                        <input type="text" name="option_1"    class="form-control"   placeholder="Option 1">\
                    </div>\
                </div>\
                <div class="col-md-6 form-group">\
                    <label>Option 2</label>\
                    <div>\
                        <input type="text" name="option_2"    class="form-control"   placeholder="Option 2">\
                    </div>\
                </div>\
                <div class="col-md-6 form-group">\
                    <label>Option 3</label>\
                    <div>\
                        <input type="text" name="option_3"    class="form-control"   placeholder="Option 3">\
                    </div>\
                </div>\
                <div class="col-md-6 form-group">\
                    <label>Option 4</label>\
                    <div>\
                        <input type="text" name="option_4"    class="form-control"   placeholder="Option 4">\
                    </div>\
                </div>\
            </div>');
                $('.dropdown-options.multiple-options').show('500');
            } else {
                $('.select-qcorrect-answer').empty();
                $('.dropdown-options.multiple-options').empty();
                $('.dropdown-options.single-options').append('<div class="row">\
                <div class="col-md-6 form-group">\
                    <label>Option 1</label>\
                    <div>\
                        <input type="text" name="option_1"    class="form-control"   placeholder="Option 1">\
                    </div>\
                </div>\
                <div class="col-md-6 form-group">\
                    <label>Option 2</label>\
                    <div>\
                        <input type="text" name="option_2"    class="form-control"   placeholder="Option 2">\
                    </div>\
                </div>\
            </div>');
                $('.dropdown-options.single-options').show('500');
            }
        })

        // Multi Select
        $(document).ready(function () {
            $(".select-qcorrect-answer").select2({
                placeholder: '--Select Answer--'
                //maximumSelectionLength: 2
            });
        })
        $(document).on('keyup', '.dropdown-options input ', function () {
            $('.select-qcorrect-answer').empty();
            $('.dropdown-options input').each(function () {
                if ($(this).val().length > 0) {
                    $('.select-qcorrect-answer').append('<option value="' + $(this).val() + '">' + $(this).val() + '</option>')
                }
            });
            $(".select-qcorrect-answer").select2({
                placeholder: '--Select Answer--'
                //maximumSelectionLength: 2
            });
        })
    </script>
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

                ajax: "{{ route('quiz-question.index') }}",
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                    {
                        data: 'heading',
                        name: 'heading'
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
                url: "{{ url('quiz-question') }}/" + x,
                //  data:{id:btn},
                cache: false,
                success: function (data) {
                    $('#txtHint').html(data);
                }
            });
        }

        function delete_quiz_type(x) {
            if (confirm("Are you sure to delete this Quiz?")) {

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
                        alert(' Selected  Question  deleted Successfully');
                        location.reload();

                    }
                });
            }


        }

    </script>

@endsection
