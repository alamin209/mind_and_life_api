@extends('layouts.master')

@section('title') Responsive Table @endsection

@section('css')
    <!-- Responsive Table css -->
    <link href="{{ URL::asset('admin/public/libs/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" /> --}}


@section('content')
    @component('common-components.breadcrumb')
        @slot('title') Coupon List    @endslot
        @slot('li_1')   @endslot
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
                <button type="button" class="btn btn-success waves-effect waves-light " style="height:10%;width:10%">
                    <a href="{{ route('coupon.create') }}"> Add New </a>
                </button>


                <div class="card-body" style="height:630px;  overflow-y: auto;">
                    <table class="table coupon-dt">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Heading</th>
                            <th>Description</th>
                            <th>Expire Date</th>
                            <th>Offer Brank</th>
                            <th>Price</th>
                            <th>Total Download</th>
                            <th>Download Limit</th>
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


    <div id="updatecoupon" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">

        {{-- <div id="updatecoupon"   class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> --}}
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div id="txtHint">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



    {{-- <script src="{{ URL::asset('public/js/pages/table-responsive.init.js')}}"></script> --}}

    <script type="text/javascript">
        $(function () {
            var table = $('.coupon-dt').DataTable({
                processing: true,
                serverSide: true,

                ajax: "{{ route('coupon.index') }}",
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'image',
                        name: 'image',
                        render: function (data, type, full, meta) {
                            return "<img src=\"" + data + "\"  alt=\"Article add \"/ height=\"100px\"/ width=\"100px\"/>";
                        }
                    },
                    {
                        data: 'category_name',
                        name: 'category_name'
                    },
                    {
                        data: 'heading',
                        name: 'heading'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'expiry_date',
                        name: 'expiry_date'
                    },
                    {
                        data: 'offer_brand',
                        name: 'offer_brand'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'total_download',
                        name: 'total_download'
                    },
                    {
                        data: 'download_limit',
                        name: 'download_limit'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            })


        });


        function show_coupon(x) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
                }
            });
            $.ajax({
                type: 'get',
                url: "{{ url('coupon') }}/" + x,
                //  data:{id:btn},
                cache: false,
                success: function (data) {
                    $('#txtHint').html(data);
                }
            });
        }


        function delete_coupon(x) {
            if (confirm("are you sure to delete this coupon?")) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
                    }
                });

                btn = $(x).data('panel-id');

                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('coupon') }}/" + x,
                    data: {id: btn},
                    cache: false,
                    success: function (data) {
                        alert(' Selected  coupon  deleted successfully');
                        location.reload();
                    }
                });
            }
        }

    </script>

@endsection
