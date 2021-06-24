<style>
body { font-family:  'Simsun'; }

</style>

<div class="card" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);transition: 0.3s;  width:50%" >
    <div class="row" >
        <div class="col-md-12" style="background-color:#8e52a1; height:70px ;border-radius:10px; margin-left:100px; ">
            <h2 class="text-center" style="text-align:center; padding-top:20px ">My discumt Coupon </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <img src="{{ url('admin/'. $coupon->image_path) }}" style="margin-left:100px; margin-top:7px"
                alt="Coupon image" height="200px" width="200px">
        </div>
    </div>

    <span style="margin-left:120px"> {{ $coupon->start_date }} - {{ $coupon->expire_date }}</span>

    <div class="row">
        <h2></h2>
    </div>
    <div class="row"  style="border-bottom: 3px solid black dashed;">
        <div class="col-md-12"  style="margin-left:100px;" >
            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($coupon->offer_brand, 'C39',1,33,array(0,0,0))}}" alt="barcode" /><br><br>
        </div>
    </div>
</div>
