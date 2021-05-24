<form action="{{ url('vendors/' . $vendor->id) }}" method="Post" class="custom-validation" enctype="multipart/form-data" >
    <div class="modal-header">
        <h5 class="modal-title mt-0" id="myModalLabel">Update vendor </h5>
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

                            <label>company name</label>
                            <div>
                                <input type="text" name="company_name"  value="{{ $vendor->company_name }}"  required class="form-control" placeholder="Give company name">
                            </div>
                        </div>

                        <div class="form-group">

                            <label>Contact name * </label>
                            <div>
                                <input type="text" name="contact_name"  value="{{  $vendor->contact_name }}" class="form-control" required="" placeholder="Give contact name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Post title * </label>
                            <div>
                                <input type="post_title" name="post_title"  class="form-control" value="{{  $vendor->post_title }}"  required="" placeholder="Give post titles">
                            </div>
                        </div>
                        <div class="form-group">

                            <label>Company email * </label>
                            <div>
                                <input type="text" name="company_email"  value="{{  $vendor->company_email }}"  required class="form-control" placeholder="Give company email ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Company Phone </label>
                            <div>
                                <input type="text" name="company_phone" value="{{  $vendor->company_phone }}"    class="form-control" placeholder="Give  company phone ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>company address </label>
                            <div>
                                <textarea class="form-control" name="company_address" rows="4"
                                    cols="50"> {{  $vendor->company_address }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label> Company signature </label>
                            <div>
                                <input type="file" name="company_signature" accept="image/*"
                                    onchange="preview_company_signature_update(event)" class="form-control">
                                  <img id="company_signature_update"  src="{{ url('public/company_signature/'. $vendor->company_signature)}}"  alt="No Image Found" height="200px" width="200px" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Company seal </label>
                            <div>
                                <input type="file" name="company_seal" accept="image/*"
                                    onchange="preview_company_seal_update(event)" class="form-control">
                                <img id="company_seal_update"  src="{{ url('public/company_seal/'. $vendor->company_seal) }}"  alt="No image fund"  height="200px" width="200px"  />
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label">Sleect Status</label>
                            <select class="form-control select2" name="status" required>
                                <option value=" "> Select Status</option>
                                <option @if($vendor->status ==1) selected="selected" @endif  value="1">Active</option>
                                <option @if($vendor->status ==0) selected="selected" @endif  value="0">In-Active</option>
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


<script type='text/javascript'>
    function preview_company_signature_update(event)
    {
     var reader = new FileReader();
     reader.onload = function()
     {
       var output = document.getElementById('company_signature_update');
       output.style.width = "200px";
       output.style.height = "200px";
       output.src = reader.result;
     }
     reader.readAsDataURL(event.target.files[0]);
    }


    function preview_company_seal_update(event)
    {
     var reader = new FileReader();
     reader.onload = function()
     {
      var output = document.getElementById('company_seal_update');
      output.style.width = "200px";
       output.style.height = "200px";
      output.src = reader.result;
     }
     reader.readAsDataURL(event.target.files[0]);
    }

    </script>
