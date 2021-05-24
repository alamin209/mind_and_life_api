@extends('layouts.master')

@section('title') {{  $title }} @endsection

@section('css')
<!-- Responsive Table css -->
<link href="{{ URL::asset('admin/public/libs/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" /> --}}


@section('content')
@component('common-components.breadcrumb')
         @slot('title') Application  List    @endslot
         @slot('li_1')   @endslot
     @endcomponent

<div class="row" >
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
                <div class="card-body"   style=" overflow-y: auto;">
                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn btn-success" onclick="getprint('printarea')">PDF</a></button>
                            <button class="btn btn-success" ><a href="{{ route('application-invoices.index',$application->id) }}">Invoice</a></button>
                            <button class="btn btn-success" onclick="getprint('printarea')">invoice</a></button>
                            <button class="btn btn-success" onclick="getprint('printarea')">Payment</a></button>
                            <button class="btn btn-success" onclick="getprint('printarea')">Testing Report</a></button>
                            <button class="btn btn-success" onclick="getprint('printarea')">Completion Letter</a></button>
                            {{-- <button class="btn btn-success"><a href="{{ route('applications.pdf', $application->id) }}">PDF</a></button> --}}
                        </div>

                        <div id="printarea">

                            <div class="col-sm-12">
                                <table width="100%">
                                    <tr>
                                        <td  style="text-align: right"  width="50%"> <img  style="padding-left: 0px !important; margin-left: -30px" src="{{ url('public/system/logo/logo.png')}}"></td>

                                        <td style="text-align: right">
                                        <strong> <a href="mailto:{{ $application->vendor->company_email }}">{{ $application->vendor->company_email }}</a> | <a href="http://www.thenextbigthinghk.com/">www.thenextbigthinghk.com</a></strong>
                                            <br/>
                                            {{ $application->vendor->company_phone }}
                                            <span style="text-align: right">{{ $application->vendor->company_phone }}</span><br/>
                                            <span style="text-align: right">{{ $application->vendor->company_address }}</span>
                                        </td>
                                    </tr>
                                </table>

                                <h2 style="text-align: center">{{ $application->project->name }}</h2>
                                <table width="100%" class="table-bordered" style="border:2px solid black !important">
                                    <tr style="border:2px solid black !important">
                                        <td  width="65%"  style="border:2px solid black !important" class="textpadding">
                                        <h4 style="font-weight:bold;padding: 4px;" class="textpadding"  >Company Name: {{ $application->project->client->name_en }}</h4>
                                        </td >
                                        <td style="border:2px solid black !important"   width="35%">
                                            <h4 style="font-weight:bold;padding: 4px;" > Date : {{ date('d-m-Y', strtotime( $application->created_at )) }} </h4>

                                        </td>
                                    </tr>

                                    <tr style="border:2px solid black !important">
                                        <td  width="65%"  style="border:2px solid black !important;padding: 4px;" >
                                        <h4 style="font-weight:bold;padding: 4px;"> Contact Person: {{ $application->project->client->contact_person }} </h4>
                                        </td >
                                        <td style="border:2px solid black !important ; padding: 4px;"   width="35%">
                                            <h4 style="font-weight:bold" >  </h4>

                                        </td>
                                    </tr>
                                    <tr style="border:2px solid black !important">
                                        <td  width="65%"  style="border:2px solid black !important" >
                                        <h4 style="font-weight:bold;padding: 4px;">Contact no :  {{ $application->project->client->contact_number }} </h4>
                                        </td >
                                        <td style="border:2px solid black !important"   width="35%">
                                            <h4 style="font-weight:bold ;padding: 4px; " > Quotation No. {{ $application->quotation_no }}</h4>

                                        </td>
                                    </tr>
                                    <tr style="border:2px solid black !important ;padding: 4px; ">
                                        <td  width="65%"  style="border:2px solid black !important ; padding: 4px;" >
                                        <h4 style="font-weight:bold ;padding: 4px; ">Company Address: {{ $application->project->client->address }} </h4>
                                        </td >
                                        <td style="border:2px solid black !important"   width="35%">
                                            <h4 style="font-weight:bold ;padding: 4px;">  </h4>
                                        </td>
                                    </tr>
                                </table>

                                <h2 style="text-align: center;padding: 4px; border:2px solid black !important "> ==詳細內容==</h2>
                                <h2 style="text-align: center;padding: 4px; border:2px solid black !important"> {{ $application->project->name }}</h2>
                                {{-- <table width="100%" class="table-bordered" style="border:2px solid black !important">

                                    <tr class="boderoftd">
                                        <th style="border:1px solid black !important">項目</th>
                                        <th class="boderoftd"  style="border:1px solid black !important;padding: 4px;"> 月費</th>
                                        <th class="boderoftd" style="border:1px solid black !important;padding: 4px;"> 數量</th>
                                        <th class="boderoftd" style="border:1px solid black !important;padding: 4px;"> 總價</th>
                                    </tr>
                                </table> --}}
                                {!! $application->project_details !!}
                                <h2 style="text-align: left;"> 條款及細則：</h2>
                                <h4 style="font-size:20px"> 1．款項將從客戶簽訂本報價後收取，分兩次收取，首次為項目總額30%。最後尾期（即項目給予客戶測試後）付款為總額70％，於項目完成後3個月內支付 。</h4>
                                <h4 style="font-size:20px"> 2． 付款應通過支票（抬頭為“The Next Big Thing Limited” ）或銀行轉賬到富邦銀行帳號： 8530-7049-779。</h4>
                                <h4 style="font-size:20px"> 3.所有的收費以港幣結算</h4>
                                <h4 style="font-size:20px"> 4.如照片、影片和文字信息應由客戶提供，並由客戶擁有版權。</h4>
                                <h4 style="font-size:20px"> 5.一旦確認設計，生產週期應在收到所有由客戶提供的網頁資料後 20-60 個工作日內完成（不包括 UAT）。 關於設    計和制作， 客戶均需予以意見及協助，我們會給客戶最多 10 天，每個部分完成 UAT，任何額外的天數將有機會
                                作額外收費。如果客戶延遲回應或無法繼續提供意見，以助測試或審查，我們將在評估完成品時要求付款。因此，
                                    該項目將進行 60 天＋ 10 天 UAT = 70 個工作日。一旦協議日數結束，我們將假設該項目已經完成。 如果我們已經
                                    完成合約所列明之職責，卻因客戶問題而延遲，我們會保留權利追收客戶額外費用。</h4>
                                    <h4 style="font-size:20px">6. 客戶應 UAT 提及所有必要的更改。 UAT 的時間為 10 天，不包括於開發時間內。如果客戶未能提及 UAT 所有  必要的更改， The Next Big Thing Limited 有權暫停或終止該項目開發。此外，額外收費將以 HK1,000/日作基
                                    </h4>
                                    <h4 style="font-size:20px"> 7． 任何其他附加服務或項目包括圖像、 照片拍攝、 插圖、 文案和翻譯， 如有需要， 將另行報價。</h4>
                                    <h4 style="font-size:20px"> 8． 網站支持 Safari、 Chrome 和 Firefox。</h4>
                                    <h4 style="font-size:20px"> 9． 如果客戶在開發過程中或 UAT 期間終止項目， The Next Big Thing Limited 有權不退還任何已付之費用，並保 留採取追究法律責任的權利。</h4>
                                    <h4 style="font-size:20px"> 10. 此報價的所有信息均需保密，嚴禁洩露給第三者。</h4>
                                    <h4 style="font-size:20px">11． 任何第三方功能若使費用增加，客戶須自行承擔。 </h4>
                                    <h4 style="font-size:20px"> 12． 本協議受管轄並應根據香港特別行政區的法律執行。</h4>
                                    <h4 style="font-size:20px"> 13． 維護不包括黑客 DDOS 或任何惡意攻擊。維護將僅包括編程問題，或因我方出錯、 瀏覽器升級等引起的問題。</h4>
                                    <table width="100%">
                                        <tr>
                                            <td  style="text-align: right"  width="50%"> <img  style="padding-left: 0px !important; margin-left: -30px" src="{{ url('public/system/logo/logo.png')}}"></td>

                                            <td style="text-align: right">
                                            <strong> <a href="mailto:info@thenextbigthinghk.com">info@thenextbigthinghk.com</a> | <a href="http://www.thenextbigthinghk.com/">www.thenextbigthinghk.com</a></strong>
                                                <br/>+852 2156 9906
                                                <span style="text-align: right">+852 2156 9906</span><br/>
                                                <span style="text-align: right">香港九龍長沙灣青山道333號華懋333廣場4樓A及B室</span>
                                            </td>
                                        </tr>
                                    </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- end col -->
</div>

<script type="text/javascript">


function getprint(divid) {

   window.print();

}
</script>

@endsection
