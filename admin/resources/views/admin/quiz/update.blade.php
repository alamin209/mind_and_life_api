<form action="{{ url('quiz/'.$quiz->id ) }}" method="Post" class="custom-validation" enctype="multipart/form-data">
    <div class="modal-header">
        <h5 class="modal-title mt-0" id="myModalLabel">Update Quiz </h5>
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
                            <label>Quiz Type </label>
                            <div>
                                <select name="quiz_type_id" class="form-control">
                                    @if(count($quizTypes)>0)
                                        <option value="">--Select Type--</option>
                                        @foreach($quizTypes as $quizType)
                                            <option
                                                value="{{$quizType->id}}" {{($quizType->id==$quiz->quiz_type_id)?'selected':''}}>{{$quizType->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Heading </label>
                            <div>
                                <input type="text" name="heading" value="{{$quiz->heading}}" class="form-control"
                                       placeholder="Heading">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description </label>
                            <div>
                                <textarea name="description" class="form-control"
                                          placeholder="Description">{{$quiz->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Photo </label>
                            <div>
                                <input type="file" name="image_path" accept="image/*"
                                       onchange="preview_update_quiz_image(event)"
                                       class="form-control">
                                <img height="200" width="200" id="update_quiz_image_path"
                                     src="{{asset($quiz->image_path)}}"/>
                            </div>
                        </div>


                        <div class="form-group">
                            <label> Quiz Point </label>
                            <div>
                                <input type="number" name="total_point" class="form-control"
                                       value="{{$quiz->total_point}}" placeholder="Quiz Point">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Total Question </label>
                            <div>
                                <input type="number" name="total_question" class="form-control"
                                       value="{{$quiz->total_question}}" placeholder="Total Question">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Select Status</label>
                            <select class="form-control select2" name="status" required>
                                <option value=" "> Select Status</option>
                                <option @if($quiz->status ==1) selected="selected" @endif  value="1">Active</option>
                                <option @if($quiz->status ==0) selected="selected" @endif  value="0">In-Active</option>
                            </select>
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
    function preview_update_quiz_image(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('update_quiz_image_path');
            output.style.width = "200px";
            output.style.height = "200px";
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
