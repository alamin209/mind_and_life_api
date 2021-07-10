<style>
body { font-family:  'Simsun'; }

span{
    font-family:  'Simsun';

}
</style>

<div class="card" style="width:280px; margin-left: 60px; border:2px solid rgb(243, 237, 237)">
    <div class="row"  >
        <div class="col-md-12" style="background-color:#8e52a1; height:50px ; padding:0 margin:0; margin-top:-20px; border-radius:5px;  " >
            <h2 class="text-center" style="text-align:center;" width="100%">我的優惠券 </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" >
            <img src="{{ url('admin/'. $coupon->image_path) }}" style=" margin-top:-20px" alt="Coupon image" height="230px" width="100%">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" >
            <h2 style="padding-left:120px;  font-size:12px ;font-weight:900 "> {{ $coupon->start_date }} - {{ $coupon->expire_date }}</h2>
        </div>
        <img style="margin-left:10px; margin-top:-25px;" src="{{ url('public/upload/coupon/scan_Image.jpg') }}"  alt="Coupon image" height="60px" width="80px">
    </div>
    <div class="row" >
        <div class="col-md-12" style="width:100%;" >
            <table style="margin-top:-32px;">
                <tr>
                    <td style="padding-left:15px; margin-top:-10px;   ">  <span style="color:black; font-family: 'Simsun'; font-size:15px " >
                         {{ $coupon->heading }}  </span>
                        </td>
                    <td>  <h2 style="color:red">{{ $coupon->price }} </h2> </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row" >
        <div class="col-md-12"  style=" margin-top:-20px; border-bottom: 2px solid black dashed; "  >
            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($coupon->offer_brand, 'C39',1,33,array(0,0,0))}}" style="margin-left:35px;" alt="barcode" /><br><br>
        </div>
    </div>

    <div class="row" >
        <div class="col-md-12"  >
            <h2 style="padding-left:80px;  margin-top:5px; font-size:12px ;font-weight:bold ">有效日期至 : {{ $coupon->expire_date }}</h2>

        </div>
    </div>

</div>
