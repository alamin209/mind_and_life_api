<form action="{{ url('roles/'.$role->id ) }}"  method="Post" class="custom-validation">
    <div class="modal-header">
        <h5 class="modal-title mt-0" id="myModalLabel">Update Role  </h5>
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
                            <input type="text" name="name" required  value="{{ $role->name }} " class="form-control" required=""  placeholder="Give name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permission:</strong>
                            <br/>
                            @foreach($permission as $value)
                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                            <br/>
                            @endforeach
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
