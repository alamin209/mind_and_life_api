<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use App\Libraries\WebApiResponse;
class AdvertisementController extends Controller
{
    /**
     * Display List  Advertisement list
     * @group Advertisement
     * @authenticated
     * @return \Illuminate\Http\Response
     * @response 200
     * {"status":"Success","message":"messages.success_show_all","code":200,"data":[{"id":1,"is_google":0,"ad_image_path":"upload\/6080fd0fcdd1b_work_alamin_vai.png","website_link":"www.google.com","status":1,"created_at":null,"updated_at":null}]}
    */

    public function list()
    {
        try {
            $advertisements = Advertisement::where('status',1)->get()->toArray();
            return WebApiResponse::success(200, $advertisements, trans('messages.success_show_all'));

        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }
}
