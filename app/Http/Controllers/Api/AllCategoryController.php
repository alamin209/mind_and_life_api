<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\WebApiResponse;
use App\Models\CouponCategory;
use App\Models\QuizType;
use App\Models\EventCategory;

class AllCategoryController extends Controller
{
      /**
     * Display List  ALl Category of Coupon,Event,Quiz list
     * @group Category
     * @return \Illuminate\Http\Response
     * @response 200
     * {"status":"Success","message":"messages.success_show_all","code":200,"data":{"coupon_category":[{"id":1,"name":"test Coupon category","image_path":"public\/article-category\/qtype_60bbdeb2bad2bp9sKNdgLEQ.jpg","status":1,"created_at":"2021-06-05T20:29:38.000000Z","updated_at":"2021-06-05T20:29:38.000000Z"},{"id":2,"name":"test Coupon","image_path":"public\/coupon-category\/qtype_60bbdf25604961bnNO5Av4e.jpg","status":1,"created_at":"2021-06-05T20:31:33.000000Z","updated_at":"2021-06-05T20:31:33.000000Z"}],"quiz_category":[{"id":1,"name":"General","image_path":"public\/quiz-type\/qtype_60c340caac4b9XYkGCUkSM4.jpg","status":1,"created_at":"2021-06-11T10:54:02.000000Z","updated_at":"2021-06-11T10:54:02.000000Z"},{"id":2,"name":"Lige Style","image_path":"public\/quiz-type\/qtype_60c378aa9f08ed2xRuzfKTs.jpg","status":1,"created_at":"2021-06-11T14:52:26.000000Z","updated_at":"2021-06-11T14:52:26.000000Z"}],"event_category":[]}}
    */

    public function list()
    {

        $coupon_Category   =  CouponCategory::where('status',1)->get()->toArray();
        $quiz_category     =  QuizType::where('status',1)->get()->toArray();
        $event_category    =  EventCategory::where('status',1)->get()->toArray();
        $data=[
            'coupon_category' => $coupon_Category,
            'quiz_category'   => $quiz_category,
            'event_category'  => $event_category
        ];
        try {
            return WebApiResponse::success(200, $data, trans('messages.success_show_all'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }


}
