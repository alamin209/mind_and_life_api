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
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="px-5 py-5 quiz-q-items-container card-body">
                    <h2 class="quiz_heading">{{$quiz['heading']}}</h2>
                    <div class="quiz-q-items-wrapper">
                        @if(count($questions))
                            @foreach($questions as $key => $qquestion)
                                <div class="quiz-q-item">
                                    <h3 class="quiz-q-question"><b>Question {{$key+1}}: </b>{{$qquestion->name}}</h3>
                                    <h3 class="quiz-q-type"><b>Type: </b>{{$qquestion->type}}</h3>
                                    <h4 class="quiz-option-title"><b>Options: </b></h4>
                                    @if($qquestion->type=='multiple')
                                        <h4 class="quiz-q-option
                                @if(count($qquestion->quizOption['correct_answer']) > 0)
                                        @foreach($qquestion->quizOption['correct_answer'] as $correctAnswer)
                                        @if($correctAnswer == $qquestion->quizOption['option_1'])
                                        {{'correct-ans'}}
                                        @endif
                                        @endforeach
                                        @endif "
                                        >1. {{$qquestion->quizOption['option_1']}}</h4>
                                        <h4 class="quiz-q-option
                                @if(count($qquestion->quizOption['correct_answer']) > 0)
                                        @foreach($qquestion->quizOption['correct_answer'] as $correctAnswer)
                                        @if($correctAnswer == $qquestion->quizOption['option_2'])
                                        {{'correct-ans'}}
                                        @endif
                                        @endforeach
                                        @endif "
                                        >2. {{$qquestion->quizOption['option_2']}}</h4>
                                        <h4 class="quiz-q-option
                                @if(count($qquestion->quizOption['correct_answer']) > 0)
                                        @foreach($qquestion->quizOption['correct_answer'] as $correctAnswer)
                                        @if($correctAnswer == $qquestion->quizOption['option_3'])
                                        {{'correct-ans'}}
                                        @endif
                                        @endforeach
                                        @endif "
                                        >3. {{$qquestion->quizOption['option_3']}}</h4>
                                        <h4 class="quiz-q-option
                                @if(count($qquestion->quizOption['correct_answer']) > 0)
                                        @foreach($qquestion->quizOption['correct_answer'] as $correctAnswer)
                                        @if($correctAnswer == $qquestion->quizOption['option_4'])
                                        {{'correct-ans'}}
                                        @endif
                                        @endforeach
                                        @endif "
                                        >4. {{$qquestion->quizOption['option_4']}}</h4>
                                    @else
                                        <h4 class="quiz-q-option
                                @if(count($qquestion->quizOption['correct_answer']) > 0)
                                        @foreach($qquestion->quizOption['correct_answer'] as $correctAnswer)
                                        @if($correctAnswer == $qquestion->quizOption['option_1'])
                                        {{'correct-ans'}}
                                        @endif
                                        @endforeach
                                        @endif "
                                        >1. {{$qquestion->quizOption['option_1']}}</h4>
                                        <h4 class="quiz-q-option
                                @if(count($qquestion->quizOption['correct_answer']) > 0)
                                        @foreach($qquestion->quizOption['correct_answer'] as $correctAnswer)
                                        @if($correctAnswer == $qquestion->quizOption['option_2'])
                                        {{'correct-ans'}}
                                        @endif
                                        @endforeach
                                        @endif "
                                        >2. {{$qquestion->quizOption['option_2']}}</h4>
                                    @endif
                                </div>
                            @endforeach
                        @endif
                    </div>
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
