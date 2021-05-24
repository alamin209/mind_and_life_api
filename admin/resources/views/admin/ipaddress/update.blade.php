<form action="{{ url('ip-addresslist/'.$ipaddress->id ) }}"  method="Post" class="custom-validation">
    <div class="modal-header">
        <h5 class="modal-title mt-0" id="myModalLabel">Update IpAdress </h5>
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
                         <label class="control-label"> User List</label>
                        <select class="form-control select2" name="user_id">
                            @foreach($user as $u )
                              <option @if( $ipaddress->user_id == $u->id  ) required  selected="selected" @endif  value="{{ $u->id }}"> {{ $u->name }}</option>
                          @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ip Address</label>
                                <div>
                                    <input type="text" name="ip_address" required  value="{{ $ipaddress->ip_address }}" class="form-control" required=""  placeholder="Give IP address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Sleect Status</label>
                                <select class="form-control select2" name="status" required>
                                    <option value=" "> Select Status</option>
                                    <option @if($ipaddress->status ==1) selected="selected" @endif  value="1">Active</option>
                                    <option @if($ipaddress->status ==0) selected="selected" @endif  value="0">In-Active</option>
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
