<form action="{{ url('quiz-question/'.$question->id ) }}"  method="Post" class="custom-validation" enctype="multipart/form-data">
    <div class="modal-header">
        <h5 class="modal-title mt-0" id="myModalLabel">Update Categroty </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
      <div class="modal-body">
     <div class="row">
         <div class="col-md-12 col-lg-12">

         <div class="card">
             <div class="card-body">
                      @csrf
                      @method("PUT")
                            <div class="form-group">
                              <label>Quiz </label>
                              <div>
                                  <select name="quiz_id"    class="form-control" >
                                      @if(count($quizzes)>0)
                                      <option value="">--Select Type--</option>
                                      @foreach($quizzes as $quiz)
                                          <option value="{{$quiz->id}}" {{($question->quiz_id==$quiz->id)?'selected':''}}>{{$quiz->heading}}</option>
                                      @endforeach
                                      @endif
                                  </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label>Question </label>
                              <div>
                                  <input type="text" name="name"    class="form-control"  value="{{$question->name}}" placeholder="Question">
                              </div>
                          </div>
                          <div class="form-group">
                              <label>Question Type</label>
                              <div class="u-multiple-single-dropdown">
                                  <select name="type" class="form-control">
                                      <option value="multiple" {{($question->type=='multiple')?'selected':''}}>Multiple</option>
                                      <option value="single" {{($question->type=='single')?'selected':''}}>Single (True/False)</option>
                                  </select>
                              </div>
                          </div>
                          <div class="u-dropdown-options multiple-options" style="{{($question->type=='multiple')?'':'display: none'}}">
                            @if($question->type=='multiple')
                              <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Option 1</label>
                                    <div>
                                        <input type="text" value="{{$option->option_1}}" name="option_1"    class="form-control"   placeholder="Option 1">
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Option 2</label>
                                    <div>
                                        <input type="text" value="{{$option->option_2}}" name="option_2"    class="form-control"   placeholder="Option 2">
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Option 3</label>
                                    <div>
                                        <input type="text" value="{{$option->option_3}}" name="option_3"    class="form-control"   placeholder="Option 3">
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Option 4</label>
                                    <div>
                                        <input type="text" value="{{$option->option_4}}" name="option_4"    class="form-control"   placeholder="Option 4">
                                    </div>
                                </div>
                              </div>
                            @endif
                          </div>
                          <div class="u-dropdown-options single-options" style="{{($question->type=='single')?'':'display: none'}}">
                            @if($question->type=='single')
                              <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Option 1</label>
                                    <div>
                                        <input type="text" value="{{$option->option_1}}" name="option_1"    class="form-control"   placeholder="Option 1">
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Option 2</label>
                                    <div>
                                        <input type="text" value="{{$option->option_2}}" name="option_2"    class="form-control"   placeholder="Option 2">
                                    </div>
                                </div>
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
                                  <select class="u-select-qcorrect-answer form-control" name="correct_answer[]" multiple="multiple" required="">
                                    @if(count($option->correct_answer) > 0)
                                      @foreach($option->correct_answer as $correctAnswer)
                                        <option value="{{$correctAnswer}}" selected>{{$correctAnswer}}</option>
                                      @endforeach
                                    @endif
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
        <button type="Submit" class="btn btn-primary waves-effect waves-light"> Update</button>
    </div>
  </form>

  <script type="text/javascript">
      $('.u-multiple-single-dropdown select').on('change',function(){
          if($(this).val() == 'multiple'){
              $('.u-select-qcorrect-answer').empty();
              $('.u-dropdown-options.single-options').empty();
              $('.u-dropdown-options.multiple-options').append('<div class="row">\
                  <div class="col-md-6 form-group">\
                      <label>Option 1</label>\
                      <div>\
                          <input type="text" value="{{$option->option_1}}" name="option_1"    class="form-control"   placeholder="Option 1">\
                      </div>\
                  </div>\
                  <div class="col-md-6 form-group">\
                      <label>Option 2</label>\
                      <div>\
                          <input type="text" value="{{$option->option_2}}" name="option_2"    class="form-control"   placeholder="Option 2">\
                      </div>\
                  </div>\
                  <div class="col-md-6 form-group">\
                      <label>Option 3</label>\
                      <div>\
                          <input type="text" value="{{$option->option_3}}" name="option_3"    class="form-control"   placeholder="Option 3">\
                      </div>\
                  </div>\
                  <div class="col-md-6 form-group">\
                      <label>Option 4</label>\
                      <div>\
                          <input type="text" value="{{$option->option_4}}" name="option_4"    class="form-control"   placeholder="Option 4">\
                      </div>\
                  </div>\
              </div>');
              $('.u-dropdown-options.multiple-options').show('500');
          }else{
              $('.u-select-qcorrect-answer').empty();
              $('.u-dropdown-options.multiple-options').empty();
              $('.u-dropdown-options.single-options').append('<div class="row">\
                  <div class="col-md-6 form-group">\
                      <label>Option 1</label>\
                      <div>\
                          <input type="text" name="option_1"    class="form-control" value="{{$option->option_1}}"  placeholder="Option 1">\
                      </div>\
                  </div>\
                  <div class="col-md-6 form-group">\
                      <label>Option 2</label>\
                      <div>\
                          <input type="text" name="option_2"    class="form-control" value="{{$option->option_2}}"  placeholder="Option 2">\
                      </div>\
                  </div>\
              </div>');
              $('.u-dropdown-options.single-options').show('500');
          }
          $('.u-dropdown-options input').each(function(){
              if($(this).val().length > 0){
                  $('.u-select-qcorrect-answer').append('<option value="'+$(this).val()+'">'+$(this).val()+'</option>')
              }
          });
          $(".u-select-qcorrect-answer").select2({
              placeholder: '--Select Answer--'
            //maximumSelectionLength: 2
          });
          setTimeout(function(){
            var seen = {};
            $('.u-select-qcorrect-answer option').each(function() {
                var txt = $(this).val();
                if (seen[txt]){
                    $(this).remove();
                }else{
                    seen[txt] = true;
                }
            });
          },1000)
      })

      // Multi Select
      $(document).ready(function(){
          $('.u-dropdown-options input').each(function(){
              if($(this).val().length > 0){
                  $('.u-select-qcorrect-answer').append('<option value="'+$(this).val()+'">'+$(this).val()+'</option>')
              }
          });
          $(".u-select-qcorrect-answer").select2({
              placeholder: '--Select Answer--'
            //maximumSelectionLength: 2
          });
          setTimeout(function(){
            var seen = {};
            $('.u-select-qcorrect-answer option').each(function() {
                var txt = $(this).val();
                if (seen[txt]){
                    $(this).remove();
                }else{
                    seen[txt] = true;
                }
            });
          },1000)
      })
      $(document).on('keyup','.u-dropdown-options input ',function(){
          $('.u-select-qcorrect-answer').empty();
          $('.u-dropdown-options input').each(function(){
              if($(this).val().length > 0){
                  $('.u-select-qcorrect-answer').append('<option value="'+$(this).val()+'">'+$(this).val()+'</option>')
              }
          });
          $(".u-select-qcorrect-answer").select2({
              placeholder: '--Select Answer--'
            //maximumSelectionLength: 2
          });
      })
  </script>

  <script type="text/javascript">
     function preview_update_quiz_image(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('update_quiz_image_path');
            output.style.width = "200px";
            output.style.height = "200px";
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
  </script>
