<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Coupon;
use App\Libraries\WebApiResponse;
class CouponController extends Controller
{

   /**
     * Display   Coupon   list
     * @group Coupon   list
     * @return \Illuminate\Http\Response
     * @response 200
     *{"status":"Success","message":"messages.success_show_all","code":200,"data":[{"id":1,"category_id":1,"heading":"special iteam","image_path":"public\/coupon\/ar_60bc330bcf9040gDqy2sYjI.png","description":"<p>free food<\/p>","offer_brand":"foor","expire_date":"2021-06-22","download_limit":20,"total_download":null,"price":250,"status":1,"term_condition":"<p><br><\/p>","created_at":"2021-06-06T02:29:31.000000Z","updated_at":"2021-06-06T02:29:31.000000Z","coupon_category":null},{"id":2,"category_id":2,"heading":"test coupon heading","image_path":"public\/coupon\/ar_60bc334712cc8cUixhWEnoG.png","description":"<p>free food<\/p>","offer_brand":"rich brand","expire_date":"2021-07-01","download_limit":200,"total_download":null,"price":250,"status":1,"term_condition":"free food","created_at":"2021-06-06T02:30:31.000000Z","updated_at":"2021-06-06T02:30:31.000000Z","coupon_category":null}]}
     */

    public function list()
    {

        try {
            $category = Coupon::with('couponCategory')->where('status', 1)->get()->toArray();
            return WebApiResponse::success(200, $category, trans('messages.success_show_all'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }


}
