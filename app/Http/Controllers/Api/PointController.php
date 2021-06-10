<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Point;
use App\Libraries\WebApiResponse;
class PointController extends Controller
{

  /**
     * Display  Point   list
     * @group Point
     * @return \Illuminate\Http\Response
     * @response 200
     *{"status":"Success","message":"messages.success_show_all","code":200,"data":[{"id":2,"referral_point":10,"article_share__point":10,"article_like_point":5,"article_bookmark_point":10,"article_read_point":10,"share_video_point":5,"video_like_point":10,"video_bookmark_point":10,"video_watch_point":10,"share_coupon_point":10,"download__coupon_point":10,"redeem_coupon_point":10,"share_quiz_point":5,"doing_quiz_point":5,"quiz_point":5,"daily_login_point":5,"created_at":"2021-06-07T16:23:39.000000Z","updated_at":"2021-06-07T16:24:38.000000Z"}]}
     */

    public function list()
    {

        try {
            $point = Point::get()->toArray();
            return WebApiResponse::success(200, $point, trans('messages.success_show_all'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }



}
