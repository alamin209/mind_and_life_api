@extends('layouts.master')

@section('title') {{ $title }} @endsection

@section('css')
    <!-- Responsive Table css -->
    <link href="{{ URL::asset('admin/public/libs/rwd-table/rwd-table.min.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ URL::asset('public/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" /> --}}
    <style type="text/css">
        .select2-container {

            width: 520px !important;
            /* display: inline !important; */
        }

    </style>

@endsection


@section('content')
    @component('common-components.breadcrumb')
        @slot('title') Payment List @endslot
        @slot('li_1') @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-12 col-lg-12 ">
            @if (session()->has('message'))
                <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
                    <h5 class="text-center"> {{ session('message') }} </h5>
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
                        data-toggle="modal" data-target="#addPayment">
                    <i class="bx bx-fa-plus font-size-16 align-right"> Add new </i>
                </button>

                <div class="card-body" style="height:630px;  overflow-y: auto;">
                    <table class="table payment-dt">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Invoice NO</th>
                            <th>Project</th>
                            <th>Payment NO</th>
                            <th>CLient</th>
                            <th>Amount</th>
                            {{-- <th>Payment Status</th> --}}
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>

    <div id="addPayment" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">{{ $application->project->name ?? '' }} Add
                        Payment </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('application-invoices.store') }}" method="Post"
                                          class="custom-validation">
                                        @csrf
                                        <div class="form-group">
                                            <label class="control-label">Select Invoice </label>
                                            <select name="invoice_id" class="form-control select2" required
                                                    onchange="selected_invoice( this.value )">
                                                <option value="">Select Invoice</option>
                                                @foreach ($invoices as $invoice)
                                                    <option value="{{ $invoice->id }}">{{ $invoice->invoice_no }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div id="invoice_details">
                                            <div class="form-group">
                                                <label>Issue date</label>
                                                <div>
                                                    <input type="date" name="issue_date"
                                                           @if (old('issue_date')) value="{{ old('issue_date') }}"
                                                           @else value="" @endif required class="form-control">
                                                    <input type="hidden" name="application_id"
                                                           value="{{ $application->id }}" required class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">

                                                <label>Due date</label>
                                                <div>
                                                    <input type="date" name="due_date"
                                                           @if (old('due_date')) value="{{ old('due_date') }}"
                                                           @else value="" @endif required class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">

                                                <label>percetnage(%)</label>
                                                <div>
                                                    <input type="text" name="percentage" id="percetnage"
                                                           @if (old('percentage')) value="{{ old('percentage') }}"
                                                           @else value="" @endif required class="form-control">
                                                </div>
                                            </div>

                                            <span style=" font-size:20px; color:red"> Total Amount:
                                                {{ $application->sub_total }}</span>
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
                                                <label style="font-size:20px">Recived Form (Self) </label>
                                                <div>
                                                    <input type="checkbox" id="switch3" switch="default">
                                                    <label for="switch3" id="switchText"
                                                           style="background-color: #45cb85;"
                                                           data-on-label="Yes" data-off-label="No"></label>
                                                </div>

                                                <div style="display:none" id="client_other">
                                                    <input type="text" name="attention_name" value=""
                                                           placeholder="Give attention  name" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Description </label>
                                            <div>
                                                <textarea class="form-control" name="description" id="description"
                                                          rows="3"
                                                          cols="3"> @if (old('description')) {{ old('description') }} @endif
                                                 </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Note </label>
                                            <div>
                                                <textarea class="form-control" name="payment_note"
                                                          id="payment_note"> @if (old('payment_note')) {{ old('payment_note') }}  @endif </textarea>
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




    <div id="updateClinet" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div id="txtHint">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    {{-- Select2 --}}
    <script src="{{ URL::asset('public/libs/select2/select2.min.js') }}"></script>
    <script src="{{ asset('public/libs/tinymce/tinymce.min.js')}}"></script>

    <script type="text/javascript">

        $(function () {

            var table = $('.payment-dt').DataTable({
                processing: true,
                serverSide: true,

                ajax: "{{ route('application-payments.index', ".$application->id.") }}",
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                    {
                        data: 'Invoice_no',
                        name: 'Invoice_no'
                    },
                    {
                        data: 'project',
                        name: 'project'
                    },
                    {
                        data: 'client',
                        name: 'client'
                    },
                    {
                        data: 'payment_status',
                        name: 'payment_status'
                    },
                    {
                        data: 'payment_status',
                        name: 'payment_status'
                    },
                    {
                        data: 'action',
                        name: 'action',

                        orderable: true,
                        searchable: true
                    },
                ]
            })


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


        });


        function selectid2(x) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
                }
            });
            $.ajax({
                type: 'get',
                url: "{{ url('clients') }}/" + x,
                //  data:{id:btn},
                cache: false,
                success: function (data) {
                    $('#txtHint').html(data);
                }
            });
        }

        function selected_invoice(x) {


            if (x) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
                    }
                });
                $.ajax({
                    type: 'get',
                    url: "{{ url('get_invoice_details') }}/" + x,
                    //  data:{id:btn},
                    cache: false,
                    success: function (data) {
                        $('#invoice_details').html(data);
                    }
                });
            }
        }

        $('.select2').select2();

    </script>


@endsection
