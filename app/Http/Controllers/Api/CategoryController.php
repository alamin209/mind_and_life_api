<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Libraries\WebApiResponse;
class CategoryController extends Controller
{
    /**
     * Display List  Category list
     * @group Category
     * @return \Illuminate\Http\Response
     * @response 200
     *{"status":"Success","message":"messages.success_show_all","code":200,"data":[{"id":1,"name":"article category","type":"article","status":1,"created_at":"2021-05-18T12:13:26.000000Z","updated_at":"2021-05-11T12:13:28.000000Z"}]}
    */

    public function list()
    {
        try {
            $category = Category::where('status',1)->where('type','article')->get()->toArray();
            return WebApiResponse::success(200, $category, trans('messages.success_show_all'));

        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }
    /**
     * Display List  Video list
     * @group  Category
     * @return \Illuminate\Http\Response
     * @response 200
     *{"status":"Success","message":"messages.success_show_all","code":200,"data":[{"id":2,"name":"video category","type":"video","status":1,"created_at":"2021-05-04T12:13:31.000000Z","updated_at":"2021-05-17T12:13:33.000000Z"}]}
    */

    public function Video_list()
    {
        try {
            $category = Category::where('status',1)->where('type','video')->get()->toArray();
            return WebApiResponse::success(200, $category, trans('messages.success_show_all'));

        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }



}
