@extends('layouts.master')

@section('title') {{  $title }} @endsection

@section('css')
    <!-- Responsive Table css -->
    <link href="{{ URL::asset('admin/public/libs/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" /> --}}



@section('content')
    @component('common-components.breadcrumb')
        @slot('title') {{ $application->project->name ?? '' }} Invoices     @endslot
        @slot('li_1')   @endslot
    @endcomponent

    <div class="row">


        <div class="col-md-12 col-lg-12 ">
            @if(session()->has('message'))
                <div class="alert alert-{{ session('type')  }} alert-dismissible fade show" role="alert">
                    <h5 class="text-center"> {{ session('message')  }} </h5>
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

        <div class="col-md-12 col-lg-12 ">
            <div class="card">
                <button type="button" class="btn btn-success waves-effect waves-light " style="height:10%;width:10%"
                        data-toggle="modal" data-target="#addInvoice">
                    <i class="bx bx-fa-plus font-size-16 align-right"> Add new </i>
                </button>

                <div class="card-body" style="height:630px;  overflow-y: auto;">
                    <table class="table client-dt">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Invoice</th>
                            <th>Project</th>
                            <th>Quotation</th>
                            <th>Amount</th>
                            <th>Pay date</th>
                            <th>Due date</th>
                            <th>Payment status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($invoces as $invoce)
                            <tr>
                                <td>{{ $loop->index +1  }}</td>
                                <td>{{ $invoce->invoice_no  }}</td>
                                <td>{{ $invoce->application->project->name }}</td>
                                <td>{{ $invoce->amount }}</td>
                                {{-- <td>{{ $invoce->application->vendor->company_name }}</td> --}}
                                <td>{{ $invoce->application->quotation_no }}</td>
                                <td>{{ $invoce->issue_date  }}</td>
                                <td>{{ $invoce->due_date  }}</td>
                                <td>
                                    @if($invoce->payment_status == 1)
                                        <span style="color: red"> Unpaid</span>
                                    @elseif ($invoce->payment_status == 2)
                                        <span style="color:yellow"> Partial  Paid</span>
                                    @elseif ($invoce->payment_status == 3)
                                        <span style="color:green"> Paid</span>
                                    @endif
                                </td>
                                <td>

                                    <div class="btn-group mr-1 mt-2">
                                        <button type="button" class="btn btn-success dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                               href="{{ route('application-invoices.showInvoice', $invoce->id) }}">PDF</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item"
                                               href="{{ route('application-invoices.edit', $invoce->id) }}">Edit</a>
                                            <div class="dropdown-divider"></div>

                                            <a class="dropdown-item"
                                               href="{{ route('application-invoices.edit', $invoce->id) }}">Payment</a>
                                            <div class="dropdown-divider"></div>

                                            <a class="dropdown-item"
                                               href="{{ route('application-invoices.edit', $invoce->id) }}">View
                                                Invoice</a>
                                            <div class="dropdown-divider"></div>
                                        </div>
                                    </div>

                                    {{-- <button class="btn btn-success"><a style="color: #FFF; text-decoration: none" href="{{ route('application-invoices.showInvoice', $invoce->id) }}">PDF</a></button> --}}
                                    {{-- <button class="btn btn-warning"><a style="color: #FFF; text-decoration: none" href="{{ route('application-invoces.edit', $invoce   ->id) }}">Edit</a></button> --}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>

    <div id="addInvoice" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">{{ $application->project->name ?? '' }} </h5>
                    <h5 class="modal-title mt-0" id="myModalLabel">Add New Invoice </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{  route('application-invoices.store') }}" method="Post"
                                          class="custom-validation">
                                        @csrf
                                        <div class="form-group">

                                            <label>Issue date</label>
                                            <div>
                                                <input type="date" name="issue_date"
                                                       @if(old('issue_date')) value="{{ old('issue_date') }}"
                                                       @else value="" @endif   required class="form-control">
                                                <input type="hidden" name="application_id"
                                                       value="{{ $application->id }}" required class="form-control">
                                            </div>

                                        </div>
                                        <div class="form-group">

                                            <label>Due date</label>
                                            <div>
                                                <input type="date" name="due_date"
                                                       @if(old('due_date')) value="{{ old('due_date') }}" @else value=""
                                                       @endif   required class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <label>percetnage(%)</label>
                                            <div>
                                                <input type="text" name="percentage" id="percetnage"
                                                       @if(old('percentage')) value="{{ old('percentage') }}"
                                                       @else value="" @endif   required class="form-control">
                                            </div>
                                        </div>

                                        <span
                                            style=" font-size:20px; color:red"> Total Amount:  {{$application->sub_total }}</span>
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <div>
                                                <input type="number" step="any" disabled id="amount2" readonly
                                                       value="{{ $application->sub_total }}" required
                                                       class="form-control">
                                            </div>
                                        </div>

                                        <input type="hidden" id="amount" name="amount">


                                        <div class="form-group">
                                            <label style="font-size:20px">Attention(Self) </label>
                                            <div>
                                                <input type="checkbox" id="switch3" switch="default">
                                                <label for="switch3" id="switchText" style="background-color: #45cb85;"
                                                       data-on-label="Yes" data-off-label="No"></label>
                                            </div>

                                            <div style="display:none" id="client_other">
                                                <input type="text" name="attention_name" value=""
                                                       placeholder="Give attention  name" class="form-control">
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label>Description </label>
                                            <div>
                                                <textarea class="form-control" name="description" id="description"
                                                          rows="150"
                                                          cols="150"> @if(old('description')) {{ old('description') }} @else {!! $detailsTemplate !!}  @endif </textarea>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary waves-effect waves-light">Add New</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div id="Addpayment" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Add New Invoice </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{  route('application-invoices.store') }}" method="Post"
                                          class="custom-validation">
                                        @csrf
                                        <div class="form-group">

                                            <label>Issue date</label>
                                            <div>
                                                <input type="date" name="issue_date"
                                                       @if(old('issue_date')) value="{{ old('issue_date') }}"
                                                       @else value="" @endif   required class="form-control">
                                                <input type="hidden" name="application_id"
                                                       value="{{ $application->id }}" required class="form-control">
                                            </div>

                                        </div>
                                        <div class="form-group">

                                            <label>Due date</label>
                                            <div>
                                                <input type="date" name="due_date"
                                                       @if(old('due_date')) value="{{ old('due_date') }}" @else value=""
                                                       @endif   required class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <label>percetnage(%)</label>
                                            <div>
                                                <input type="text" name="percentage" id="percetnage"
                                                       @if(old('percentage')) value="{{ old('percentage') }}"
                                                       @else value="" @endif   required class="form-control">
                                            </div>
                                        </div>

                                        <span
                                            style=" font-size:20px; color:red"> Total Amount:  {{$application->sub_total }}</span>
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <div>
                                                <input type="number" step="any" disabled id="amount2" readonly
                                                       value="{{ $application->sub_total }}" required
                                                       class="form-control">
                                            </div>
                                        </div>

                                        <input type="hidden" id="amount" name="amount">


                                        <div class="form-group">
                                            <label style="font-size:20px">Attention(Self) </label>
                                            <div>
                                                <input type="checkbox" id="switch3" switch="default">
                                                <label for="switch3" id="switchText" style="background-color: #45cb85;"
                                                       data-on-label="Yes" data-off-label="No"></label>
                                            </div>

                                            <div style="display:none" id="client_other">
                                                <input type="text" name="attention_name" value=""
                                                       placeholder="Give attention  name" class="form-control">
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label>Description </label>
                                            <div>
                                                <textarea class="form-control" name="description" id="description"
                                                          rows="150"
                                                          cols="150"> @if(old('description')) {{ old('description') }} @else {!! $detailsTemplate !!}  @endif </textarea>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary waves-effect waves-light">Add New</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@endsection

@section('script')
    <script src="{{ asset('public/libs/tinymce/tinymce.min.js')}}"></script>


    <script>

        $('[type="checkbox"]').click(function (e) {
            var isChecked = $(this).is(":checked");
            console.log('isChecked: ' + isChecked);

            if (isChecked) {
                $("#client_other").show();

            } else {
                $("#client_other").hide();
            }

        });

        var total = "<?php echo $application->sub_total ?> ";
        $("#percetnage").on("change", function () {
            var ret = (total * parseInt($("#percetnage").val())) / 100;
            $("#amount").val(ret);
            $("#amount2").val(ret);
        })

        $(function () {
            tinymce.init({
                selector: '#description',
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
