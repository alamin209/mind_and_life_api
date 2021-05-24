<form action="{{ url('userlist/'.$user->id ) }}"  method="Post" class="custom-validation">
    <div class="modal-header">
        <h5 class="modal-title mt-0" id="myModalLabel">Update User  </h5>
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
                                <label>Name</label>
                                <div>
                                    <input type="text" name="name" required  value="{{ $user->name }} " class="form-control" required=""  placeholder="Give name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <div>
                                    <input type="text" name="email" required  value="{{ $user->email }} " class="form-control" required=""  placeholder="Give Email">
                                </div>
                            </div>

                             <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Role:</strong>
                                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Sleect Status</label>
                                <select class="form-control select2" name="status" required>
                                    <option value=" "> Select Status</option>
                                    <option @if($user->status ==1) selected="selected" @endif  value="1">Active</option>
                                    <option @if($user->status ==0) selected="selected" @endif  value="0">In-Active</option>
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
