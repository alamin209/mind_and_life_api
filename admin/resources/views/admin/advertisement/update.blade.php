<form action="{{ url('advertisement/' . $advertisement->id) }}" method="Post" class="custom-validation"
    enctype="multipart/form-data">
    <div class="modal-header">
        <h5 class="modal-title mt-0" id="myModalLabel">Add New Advirtisement</h5>
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

                        <div class="custom-control custom-checkbox" style="margin-bottom:15px">
                            <input type="checkbox" name="is_google" class="custom-control-input" value="1" @if (old('is_google', $advertisement->is_google)) checked @endif style="height:10px;width:10px"
                                id="invalidCheck_update">
                            <label class="custom-control-label" for="invalidCheck_update">Is Google
                                Advirtisement</label>
                            <div class="invalid-feedback">
                            </div>
                        </div>


                        <div class="form-group autoUpdate_update" id="autoUpdate_update" style="display:none;">
                            <label> Google script link </label>
                            <div>
                                <input type="text" name="add_sense_link" class="form-control"
                                    value="{{ $advertisement->add_sense_link ?? '' }}"
                                    placeholder="Please  Google Advirtisement  script  link">
                            </div>
                        </div>


                        <div class="show_website_add_update" id="show_website_add_update">

                            <div class="form-group">
                                <label> Advertisement Photo </label>
                                <div>
                                    <input type="file" name="ad_image_path" accept="image/*"
                                        onchange="preview_company_advertisement_update(event)" class="form-control">
                                    <img id="ad_image_path_update" />
                                </div>
                            </div>


                            @if (file_exists($advertisement->ad_image_path))
                                Prevous Photo
                                <img src="{{ asset($advertisement->ad_image_path) }}" height="70px" width=70px
                                    style="margin-bottom: 10px">
                            @else

                            @endif



                            <div class="form-group ">
                                <label>website link </label>
                                <div>
                                    <input type="text" name="website_link"
                                        value="{{ $advertisement->website_link ?? '' }}" class="form-control"
                                        placeholder="Give Website link">
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary waves-effect waves-light">Update</button>
    </div>
</form>
<script type="text/javascript">
    function preview_company_advertisement_update(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('ad_image_path_update');
            output.style.width = "200px";
            output.style.height = "200px";
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }


    var check_google_value = "{{ $advertisement->is_google }}";

    if (check_google_value == 1) {

        $("#autoUpdate_update").show();
        $("#show_website_add_update").hide();
    }

    $('#invalidCheck_update').click(function() {
        if ($(this).is(':checked')) {
            $("#autoUpdate_update").show();
            $("#show_website_add_update").hide();

        } else {
            $("#autoUpdate_update").hide();
            $("#show_website_add_update").show();
        }
    });

</script>
