<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Libraries\WebApiResponse;
use App\Models\CategoryLog;
use Illuminate\Support\Facades\Validator;
class CategoryController extends Controller
{
    /**
     * Display List  Category list
     * @group Article Category
     * @return \Illuminate\Http\Response
     * @response 200
     *{"status":"Success","message":"messages.success_show_all","code":200,"data":[{"id":1,"name":"article category","type":"article","status":1,"created_at":"2021-05-18T12:13:26.000000Z","updated_at":"2021-05-11T12:13:28.000000Z"}]}
     */

    public function list()
    {
        try {
            $category = Category::where('status', 1)->where('type', 'article')->get()->toArray();
            return WebApiResponse::success(200, $category, trans('messages.success_show_all'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }

    /**
     * Display List  Category list
     * @group all Category
     * @return \Illuminate\Http\Response
     * @response 200
     *{"status":"Success","message":"messages.success_show_all","code":200,"data":[{"id":1,"name":"article category","image_path":"public\/category\/File_20210526-222544.jpg","type":"article","status":1,"created_at":"2021-05-18T12:13:26.000000Z","updated_at":"2021-05-07T04:29:58.000000Z"},{"id":3,"name":"Heath\r\n","image_path":"public\/category\/work alamin vai.png","type":"article","status":1,"created_at":"2021-05-18T12:13:26.000000Z","updated_at":"2021-05-11T12:13:28.000000Z"},{"id":4,"name":"sleep\r\n","image_path":null,"type":"artile","status":1,"created_at":"2021-05-18T12:13:26.000000Z","updated_at":"2021-05-11T12:13:28.000000Z"},{"id":5,"name":"rain\r\n","image_path":null,"type":"article","status":1,"created_at":"2021-05-18T12:13:26.000000Z","updated_at":"2021-05-11T12:13:28.000000Z"},{"id":6,"name":"Hair\r\n","image_path":null,"type":"article","status":1,"created_at":"2021-05-18T12:13:26.000000Z","updated_at":"2021-05-11T12:13:28.000000Z"},{"id":7,"name":"Sewing ","image_path":null,"type":"article","status":1,"created_at":"2021-05-18T12:13:26.000000Z","updated_at":"2021-05-11T12:13:28.000000Z"},{"id":8,"name":"bed","image_path":null,"type":"article","status":1,"created_at":"2021-05-18T12:13:26.000000Z","updated_at":"2021-05-11T12:13:28.000000Z"},{"id":9,"name":"exercise ","image_path":null,"type":"article","status":1,"created_at":"2021-05-18T12:13:26.000000Z","updated_at":"2021-05-11T12:13:28.000000Z"},{"id":10,"name":"Book","image_path":null,"type":"article","status":1,"created_at":"2021-05-10T19:04:05.000000Z","updated_at":"2021-05-10T19:04:14.000000Z"},{"id":11,"name":"Video Category 2","image_path":null,"type":"video","status":1,"created_at":"2021-05-10T21:25:03.000000Z","updated_at":"2021-05-10T21:25:03.000000Z"},{"id":12,"name":"Test video","image_path":null,"type":"video","status":1,"created_at":"2021-05-11T04:46:42.000000Z","updated_at":"2021-05-11T04:46:42.000000Z"}]}
     */

    public function article_video_category()
    {
        try {
            $category = Category::where('status', 1)->get()->toArray();
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
            $category = Category::where('status', 1)->where('type', 'video')->get()->toArray();
            return WebApiResponse::success(200, $category, trans('messages.success_show_all'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }


    /**
     * Create New Category log
     * @group  User Category Log
     * @bodyParam user_id  Integer required User Id. Example: 1
     * @bodyParam categories array required Category List of this category group. Example: [1,2,3]
     * @return \Illuminate\Http\Response
     * @response 200
     *{"status":"Success","message":"messages.success_created","code":200,"data":{"user_id":"1","categories":[1,2,3],"updated_at":"2021-06-04T10:49:52.000000Z","created_at":"2021-06-04T10:49:52.000000Z","id":4}}
     */

    public function user_category_log(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'user_id'           =>    'required|integer',
            'categories'        =>    'required|array',

        ]);
        if ($validator->fails()) {
            return WebApiResponse::validationError($validator, $request);
        }
        try {
            $createData = [
                'user_id'                 =>   $request->user_id,
                'categories'              =>   $request->categories
            ];
            $category_log = CategoryLog::create($createData);

            return WebApiResponse::success(200, $category_log->toArray(), trans('messages.success_created'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [$th->getMessage()],  trans('messages.success_created_faild'));
        }
    }
}
