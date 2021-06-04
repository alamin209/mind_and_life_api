<form action="{{ url('clients/'.$client->id ) }}" method="Post" class="custom-validation">
    <div class="modal-header">
        <h5 class="modal-title mt-0" id="myModalLabel">Update Client </h5>
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

                            <label>Name(English)</label>
                            <div>
                                <input type="text" name="name_en" value="{{ $client->name_en ?? ''}}"
                                       class="form-control" placeholder="Give Client name English" in English>
                            </div>
                        </div>

                        <div class="form-group">

                            <label>Name (China) * </label>
                            <div>
                                <input type="text" name="name_ch" value="{{ $client->name_ch ?? $client->name_ch   }}"
                                       class="form-control" required="" placeholder="Give Client name in China">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Email * </label>
                            <div>
                                <input type="email" name="email" value="{{ $client->email  ?? '' }}"
                                       class="form-control" required="" placeholder="Give Client Email Address">
                            </div>
                        </div>

                        <div class="form-group">

                            <label>Contract Person * </label>
                            <div>
                                <input type="text" name="contract_person" value="{{ $client->contract_person ?? ''  }}"
                                       required class="form-control" placeholder="Give Contrect person ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Contact Number * </label>
                            <div>
                                <input type="text" name="contact_number" value="{{ $client->contact_number ?? '' }}"
                                       required class="form-control" placeholder="Give Contact Number ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Select Country</label>
                            <select class="form-control select2" name="country_id" required>
                                <option value=" "> Select Country</option>
                                @foreach ( $country as $c )
                                    <option
                                        @if ($c->id === $client->country_id )  {{ 'selected' }} @endif  value="{{ $c->id  }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>city </label>
                            <div>
                                <input type="text" name="city" value="{{ $client->city ?? '' }}" class="form-control"
                                       placeholder="Give City Name ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Address </label>
                            <div>
                                <textarea class="form-control" name="address" rows="4"
                                          cols="50"> {{ $client->address ?? ''}} </textarea>
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
