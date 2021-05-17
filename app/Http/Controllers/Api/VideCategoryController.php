<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Rules\MatchOldPassword;
use App\Libraries\WebApiResponse;
class VideCategoryController extends Controller
{
    /**
     * Display List Video Category list
     * @group Video  Category
     * @return \Illuminate\Http\Response
     * @response 200
     * {"status":"Success","message":"messages.success_show_all","code":200,"data":[{"id":2,"name":"video category","type":"video","status":"1","created_at":"2021-05-04T06:13:31.000000Z","updated_at":"2021-05-17T06:13:33.000000Z"}]}
    */

    public function list()
    {
        try {
            $ranks = Category::where('status',1)->where('type','video')->get()->toArray();
            return WebApiResponse::success(200, $ranks, trans('messages.success_show_all'));

        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }


    public function store(){


    }
}
