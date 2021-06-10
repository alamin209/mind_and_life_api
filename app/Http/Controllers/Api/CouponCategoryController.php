<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CouponCategory;
use App\Libraries\WebApiResponse;
class CouponCategoryController extends Controller
{

    /**
     * Display List  Coupon  Category list
     * @group Coupon  Category list
     * @return \Illuminate\Http\Response
     * @response 200
     *{"status":"Success","message":"messages.success_show_all","code":200,"data":[{"id":1,"name":"test Coupon category","image_path":"public\/article-category\/qtype_60bbdeb2bad2bp9sKNdgLEQ.jpg","status":1,"created_at":"2021-06-05T20:29:38.000000Z","updated_at":"2021-06-05T20:29:38.000000Z"},{"id":2,"name":"test Coupon","image_path":"public\/coupon-category\/qtype_60bbdf25604961bnNO5Av4e.jpg","status":1,"created_at":"2021-06-05T20:31:33.000000Z","updated_at":"2021-06-05T20:31:33.000000Z"}]}
     */

    public function list()
    {
        try {
            $category = CouponCategory::where('status', 1)->get()->toArray();
            return WebApiResponse::success(200, $category, trans('messages.success_show_all'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }

}
