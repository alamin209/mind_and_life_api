@extends('layouts.master')

@section('title') {{  $title }} @endsection

@section('css')
    <!-- Responsive Table css -->
    <link href="{{ URL::asset('admin/public/libs/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('public/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" /> --}}


@section('content')
    @component('common-components.breadcrumb')
        @slot('title') Application  List    @endslot
        @slot('li_1')   @endslot
    @endcomponent

    <div class="row">
        @if(session()->has('message'))

            <div class="alert alert-{{ session('type')  }} alert-dismissible fade show" role="alert">
                {{ session('message')  }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

        @endif

        @if ($errors->any())
            <div class="alert alert-danger  alert-dismissible fade show ">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>

            </div>
        @endif

        <div class="col-md-12 col-lg-12 ">
            <div class="card">
                <div class="card-body" style="overflow-y: auto;">
                    <form method="POST" action="{{ route('applications.store') }}">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Select Project </label>
                            <select name="project_id" class="form-control select2" required>
                                <option value="">Select Project</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Select Vendor </label>
                            <select name="vendor_id" class="form-control select2" required>
                                <option value="">Select Vendor</option>
                                @foreach($vendors as $vendor)
                                    <option value="{{ $vendor->id }}">{{ $vendor->company_name }}
                                        ({{ $vendor->contact_name }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Quotation No </label>
                            <input class="form-control" name="quotation_no" type="text" placeholder="Enter Quotation"
                                   required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Quotation Details </label>
                            <textarea name="project_details" id="project_details" rows="10"
                                      class="form-control">{{ $detailsTemplate }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Total Amount </label>
                            <input class="form-control" name="sub_total" type="text" placeholder="Enter Amount"
                                   required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Remarks </label>
                            <textarea name="remarks" id="remarks" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="form-control btn btn-primary waves-effect waves-light">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection

@section('script')
    <script src="{{ asset('public/libs/select2/select2.min.js')}}"></script>
    <script src="{{ asset('public/libs/tinymce/tinymce.min.js')}}"></script>


    <script>
        $(function () {
            $('.select2').select2();
            tinymce.init({
                selector: '#project_details',
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor colorpicker textpattern imagetools"
                ],
                toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ",
                toolbar2: "print preview media | forecolor backcolor emoticons",
                image_advtab: true
            });
        })
    </script>
@endsection
