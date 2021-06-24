@extends('layouts.master')

@section('title') Quiz Question Table @endsection

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
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">



                <div class="card-body">
                    <button type="button" class="btn btn-success waves-effect waves-light float-right" style="margin-bottom: 10px; !important">
                        <a href="{{ url('/quiz-question') }}"> Back To Question </a>
                    </button>

                    <form id="save-all-question" action="{{ url('quiz-question/'.$questions[0]['quiz_id'] ) }}"
                          method="Post" class="custom-validation" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label>Quiz </label>
                            <div class="quiz-question-type">
                                <select name="quiz_id" class="form-control" required>
                                    @if(count($quizzes)>0)
                                        <option value="">--Select Type--</option>
                                        @foreach($quizzes as $quiz)
                                            <option value="{{$quiz->id}}"
                                                    data-question="{{$quiz->total_question}}" {{($quiz->id==$questions[0]['quiz_id'])?'selected':''}}>{{$quiz->heading}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="quiz-question-items-wrapper">
                            @if(count($questions) > 0)
                                @foreach($questions as $key => $qquestion)
                                    <div class="quiz-question-item">
                                        <input type="hidden" name="question_id[]" autocomplete="off"  value="{{$qquestion->id}}">
                                        {{-- <div class="btn btn-secondary remove-more-question-btn float-right"><i class="fas fa-trash"></i></div> --}}
                                        <div class="form-group mt-5">
                                            <label>Question </label>
                                            <div>
                                                <input type="text" required name="name[]"  autocomplete="off" autocomplete="off" class="form-control"
                                                       placeholder="Question" value="{{$qquestion->name}}">
                                            </div>
                                        </div>

                                        <div class="form-group mt-5">
                                            <label>Question Point </label>
                                            <div>
                                                <input type="text" required name="quiz_point[]" autocomplete="off"  autocomplete="off" class="form-control"
                                                       placeholder="Quiz point" value="{{ $qquestion->quiz_point }}">
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label>Question Type</label>
                                            <div class="multiple-single-dropdown">
                                                <select required name="type[]" autocomplete="off"   autocomplete="off" class="form-control">
                                                    <option
                                                        value="multiple" {{($qquestion->type=='multiple')?'selected':''}}>
                                                        Multiple
                                                    </option>
                                                    <option
                                                        value="single" {{($qquestion->type=='single')?'selected':''}}>
                                                        Single (True/False)
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="dropdown-options multiple-options">
                                            @if($qquestion->type=='multiple')
                                                <input type="hidden" name="option_id[]" autocomplete="off"
                                                       value="{{$qquestion->quizOption['id']}}">
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label>Option 1</label>
                                                        <div>
                                                            <input type="text" required name="option_1[]" autocomplete="off"
                                                                   class="form-control" placeholder="Option 1" autocomplete="off"
                                                                   value="{{$qquestion->quizOption['option_1']}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label>Option 2</label>
                                                        <div>
                                                            <input type="text" required name="option_2[]" autocomplete="off"
                                                                   class="form-control" placeholder="Option 2" autocomplete="off"
                                                                   value="{{$qquestion->quizOption['option_2']}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label>Option 3</label>
                                                        <div>
                                                            <input type="text" required name="option_3[]" autocomplete="off"
                                                                   class="form-control" placeholder="Option 3" autocomplete="off"
                                                                   value="{{$qquestion->quizOption['option_3']}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label>Option 4</label>
                                                        <div>
                                                            <input type="text" required name="option_4[]" autocomplete="off" autocomplete="off"
                                                                   class="form-control" placeholder="Option 4"
                                                                   value="{{$qquestion->quizOption['option_4']}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="dropdown-options single-options">
                                            @if($qquestion->type=='single')
                                                <input type="hidden" name="option_id[]"
                                                       value="{{$qquestion->quizOption['id']}}">
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label>Option 1</label>
                                                        <div>
                                                            <input type="text" required name="option_1[]"  autocomplete="off" autocomplete="off"
                                                                   class="form-control" placeholder="Option 1"
                                                                   value="{{$qquestion->quizOption['option_1']}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label>Option 2</label>
                                                        <div>
                                                            <input type="text" required name="option_2[]" autocomplete="off"  autocomplete="off"
                                                                   class="form-control" placeholder="Option 2"
                                                                   value="{{$qquestion->quizOption['option_2']}}">
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="option_3[]" value="null">
                                                    <input type="hidden" name="option_4[]" value="null">
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Correct Answer</label>
                                            <div>
                                                <style type="text/css">
                                                    .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
                                                        padding-left: 15px;
                                                    }
                                                </style>
                                                <select class="select-qcorrect-answer form-control" autocomplete="off"
                                                        name="correct_answer_{{$key+1}}[]" multiple="multiple" autocomplete="off"
                                                        required="">
                                                    {{-- @if($qquestion->type=='single')
                                                    @endif --}}
                                                    <option value="{{$qquestion->quizOption['option_1']}}"
                                                    @if(count($qquestion->quizOption['correct_answer']) > 0)
                                                        @foreach($qquestion->quizOption['correct_answer'] as $correctAnswer)
                                                            @if($correctAnswer == $qquestion->quizOption['option_1'])
                                                                {{'selected'}}
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    >{{$qquestion->quizOption['option_1']}}</option>
                                                    <option value="{{$qquestion->quizOption['option_2']}}"
                                                    @if(count($qquestion->quizOption['correct_answer']) > 0)
                                                        @foreach($qquestion->quizOption['correct_answer'] as $correctAnswer)
                                                            @if($correctAnswer == $qquestion->quizOption['option_2'])
                                                                {{'selected'}}
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    >{{$qquestion->quizOption['option_2']}}</option>
                                                    <option value="{{$qquestion->quizOption['option_3']}}"
                                                    @if(count($qquestion->quizOption['correct_answer']) > 0)
                                                        @foreach($qquestion->quizOption['correct_answer'] as $correctAnswer)
                                                            @if($correctAnswer == $qquestion->quizOption['option_3'])
                                                                {{'selected'}}
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    >{{$qquestion->quizOption['option_3']}}</option>
                                                    <option value="{{$qquestion->quizOption['option_4']}}"
                                                    @if(count($qquestion->quizOption['correct_answer']) > 0)
                                                        @foreach($qquestion->quizOption['correct_answer'] as $correctAnswer)
                                                            @if($correctAnswer == $qquestion->quizOption['option_4'])
                                                                {{'selected'}}
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    >{{$qquestion->quizOption['option_4']}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="btn btn-info add-more-question-btn">Add More</div>
                        <input id="qReady" type="hidden" value="0" name="">
                        <div class="d-flex justify-content-center mt-5">
                            <button type="submit" class="btn btn-primary">Save Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    {{-- <script src="{{ URL::asset('public/js/pages/table-responsive.init.js')}}"></script> --}}
    <script type="text/javascript">

        $('#save-all-question').on('submit', function (e) {
            if ($('#qReady').val() <= 0) {
                e.preventDefault();
                $('#qReady').val(1);
                var totalAns = 0;
                $('.quiz-question-item').each(function () {
                    $(this).find('.select-qcorrect-answer').attr("name", "correct_answer_" + totalAns + "[]");
                    totalAns++;
                });
                setTimeout(function () {
                    $('#save-all-question').trigger('submit');
                }, 500);
            }
        });


        $('.add-more-question-btn').click(function () {
            var lastCorrectAns = $('.quiz-question-item').length;

            $('.quiz-question-items-wrapper').append('<div class="quiz-question-item">\
            <div class="btn btn-secondary remove-more-question-btn float-right"><i class="fas fa-trash"></i></div>\
            <div class="form-group mt-5">\
                <label>Question </label>\
                <div>\
                    <input type="text" required name="name[]"    class="form-control"   placeholder="Question">\
                </div>\
            </div>\
            <div class="form-group mt-5">\
                <label>Question point </label>\
                <div>\
                    <input type="text" required name="quiz_point[]"    class="form-control"   placeholder="Question point">\
                </div>\
            </div>\
            <div class="form-group">\
                <label>Question Type</label>\
                <div class="multiple-single-dropdown">\
                    <select required name="type[]" class="form-control">\
                        <option value="multiple">Multiple</option>\
                        <option value="single">Single (True/False)</option>\
                    </select>\
                </div>\
            </div>\
            <div class="dropdown-options multiple-options" style="display: none;">\
            </div>\
            <div class="dropdown-options single-options" style="display: none;">\
            </div>\
            <div class="form-group">\
                <label>Correct Answer</label>\
                <div>\
                    <style type="text/css">\
                        .select2-container--default .select2-selection--multiple .select2-selection__choice__display {\
                            padding-left: 15px;\
                        }\
                    </style>\
                    <select class="select-qcorrect-answer form-control" name="correct_answer_' + (lastCorrectAns + 1) + '[]" multiple="multiple" required="">\
                        <option value=""></option>\
                </select>\
                </div>\
            </div>\
        </div>');
            var lastSelect = $('quiz-question-item').last().find('.multiple-single-dropdown select');
            $('.quiz-question-item').last().find('.select-qcorrect-answer').empty();
            $('.quiz-question-item').last().find('.dropdown-options.single-options').empty();
            $('.quiz-question-item').last().find('.dropdown-options.multiple-options').append('<div class="row">\
            <div class="col-md-6 form-group">\
                <label>Option 1</label>\
                <div>\
                    <input type="text" required name="option_1[]"    class="form-control"   placeholder="Option 1">\
                </div>\
            </div>\
            <div class="col-md-6 form-group">\
                <label>Option 2</label>\
                <div>\
                    <input type="text" required name="option_2[]"    class="form-control"   placeholder="Option 2">\
                </div>\
            </div>\
            <div class="col-md-6 form-group">\
                <label>Option 3</label>\
                <div>\
                    <input type="text" required name="option_3[]"    class="form-control"   placeholder="Option 3">\
                </div>\
            </div>\
            <div class="col-md-6 form-group">\
                <label>Option 4</label>\
                <div>\
                    <input type="text" required name="option_4[]"    class="form-control"   placeholder="Option 4">\
                </div>\
            </div>\
        </div>');
            $('.quiz-question-item').last().find('.dropdown-options.multiple-options').show('500');

            var lastQuestionItem = $('quiz-question-item').last();
            $('.quiz-question-item').last().find('.select-qcorrect-answer').empty();
            $('.quiz-question-item').last().find('.dropdown-options input').each(function () {
                if ($(this).val().length > 0 && $(this).val() != 'null') {
                    $('.quiz-question-item').last().find('.select-qcorrect-answer').append('<option value="' + $(this).val() + '">' + $(this).val() + '</option>')
                }
            });
            $('.quiz-question-item').last().find(".select-qcorrect-answer").select2({
                placeholder: '--Select Answer--'
                //maximumSelectionLength: 2
            });

        });

        $(document).on('click', '.remove-more-question-btn', function () {
            $(this).closest('.quiz-question-item').remove();
        })


        // $('.multiple-single-dropdown select').each(function(){
        //     if($(this).val() == 'multiple'){
        //         $(this).closest('.quiz-question-item').find('.select-qcorrect-answer').empty();
        //         $(this).closest('.quiz-question-item').find('.dropdown-options.single-options').empty();
        //         $(this).closest('.quiz-question-item').find('.dropdown-options.multiple-options').append('<div class="row">\
        //             <div class="col-md-6 form-group">\
        //                 <label>Option 1</label>\
        //                 <div>\
        //                     <input type="text" required name="option_1[]"    class="form-control"   placeholder="Option 1">\
        //                 </div>\
        //             </div>\
        //             <div class="col-md-6 form-group">\
        //                 <label>Option 2</label>\
        //                 <div>\
        //                     <input type="text" required name="option_2[]"    class="form-control"   placeholder="Option 2">\
        //                 </div>\
        //             </div>\
        //             <div class="col-md-6 form-group">\
        //                 <label>Option 3</label>\
        //                 <div>\
        //                     <input type="text" required name="option_3[]"    class="form-control"   placeholder="Option 3">\
        //                 </div>\
        //             </div>\
        //             <div class="col-md-6 form-group">\
        //                 <label>Option 4</label>\
        //                 <div>\
        //                     <input type="text" required name="option_4[]"    class="form-control"   placeholder="Option 4">\
        //                 </div>\
        //             </div>\
        //         </div>');
        //         $(this).closest('.quiz-question-item').find('.dropdown-options.multiple-options').show('500');
        //     }else{
        //         $(this).closest('.quiz-question-item').find('.select-qcorrect-answer').empty();
        //         $(this).closest('.quiz-question-item').find('.dropdown-options.multiple-options').empty();
        //         $(this).closest('.quiz-question-item').find('.dropdown-options.single-options').append('<div class="row">\
        //             <div class="col-md-6 form-group">\
        //                 <label>Option 1</label>\
        //                 <div>\
        //                     <input type="text" required name="option_1[]"    class="form-control"   placeholder="Option 1">\
        //                 </div>\
        //             </div>\
        //             <div class="col-md-6 form-group">\
        //                 <label>Option 2</label>\
        //                 <div>\
        //                     <input type="text" required name="option_2[]"    class="form-control"   placeholder="Option 2">\
        //                 </div>\
        //                 <input type="hidden" value="null" name="option_3[]">\
        //                 <input type="hidden" value="null" name="option_4[]">\
        //             </div>\
        //         </div>');
        //         $(this).closest('.quiz-question-item').find('.dropdown-options.single-options').show('500');
        //     }
        // })

        $(document).on('change', '.multiple-single-dropdown select', function () {
            if ($(this).val() == 'multiple') {
                $(this).closest('.quiz-question-item').find('.select-qcorrect-answer').empty();
                $(this).closest('.quiz-question-item').find('.dropdown-options.single-options').empty();
                $(this).closest('.quiz-question-item').find('.dropdown-options.multiple-options').append('<div class="row">\
                <div class="col-md-6 form-group">\
                    <label>Option 1</label>\
                    <div>\
                        <input type="text" required name="option_1[]"    class="form-control"   placeholder="Option 1">\
                    </div>\
                </div>\
                <div class="col-md-6 form-group">\
                    <label>Option 2</label>\
                    <div>\
                        <input type="text" required name="option_2[]"    class="form-control"   placeholder="Option 2">\
                    </div>\
                    <input type="hidden" value="null" name="option_3[]">\
                    <input type="hidden" value="null" name="option_4[]">\
                </div>\
                <div class="col-md-6 form-group">\
                    <label>Option 3</label>\
                    <div>\
                        <input type="text" required name="option_3[]"    class="form-control"   placeholder="Option 3">\
                    </div>\
                </div>\
                <div class="col-md-6 form-group">\
                    <label>Option 4</label>\
                    <div>\
                        <input type="text" required name="option_4[]"    class="form-control"   placeholder="Option 4">\
                    </div>\
                </div>\
            </div>');
                $(this).closest('.quiz-question-item').find('.dropdown-options.multiple-options').show('500');
            } else {
                $(this).closest('.quiz-question-item').find('.select-qcorrect-answer').empty();
                $(this).closest('.quiz-question-item').find('.dropdown-options.multiple-options').empty();
                $(this).closest('.quiz-question-item').find('.dropdown-options.single-options').append('<div class="row">\
                <div class="col-md-6 form-group">\
                    <label>Option 1</label>\
                    <div>\
                        <input type="text" required name="option_1[]"    class="form-control"   placeholder="Option 1">\
                    </div>\
                </div>\
                <div class="col-md-6 form-group">\
                    <label>Option 2</label>\
                    <div>\
                        <input type="text" required name="option_2[]"    class="form-control"   placeholder="Option 2">\
                    </div>\
                    <input type="hidden" value="null" name="option_3[]">\
                    <input type="hidden" value="null" name="option_4[]">\
                </div>\
            </div>');
                $(this).closest('.quiz-question-item').find('.dropdown-options.single-options').show('500');
            }
        })

        // Multi Select
        $(document).ready(function () {
            $(".select-qcorrect-answer").each(function () {
                $(".select-qcorrect-answer").select2({
                    placeholder: '--Select Answer--'
                    //maximumSelectionLength: 2
                });
            });
        })
        $(document).on('keyup', '.dropdown-options input ', function () {
            $(this).closest('.quiz-question-item').find('.select-qcorrect-answer').empty();
            $(this).closest('.quiz-question-item').find('.dropdown-options input').each(function () {
                if ($(this).val().length > 0 && $(this).val() != 'null') {
                    $(this).closest('.quiz-question-item').find('.select-qcorrect-answer').append('<option value="' + $(this).val() + '">' + $(this).val() + '</option>')
                }
            });
            $(this).closest('.quiz-question-item').find(".select-qcorrect-answer").select2({
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

    </script>

@endsection
