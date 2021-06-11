<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\WebApiResponse;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display List Comments Of Article
     * @group Article
     * @queryParam limit  integer  optional  per page limit   to Filter Example:10 .
     * @queryParam orderBy  String  optional  Order    to Filter Example:DESC .
     * @queryParam sortBy  String  optional  Order    to Filter  Example:id .
     * @bodyParam user_id  Integer required User Id. Example: 1
     * @bodyParam article_id  Integer nullable for article list . Example: 1
     * @bodyParam video_id  Integer nullable for video list . Example: 1
     * @return \Illuminate\Http\Response
     * @response 200
     * {"status":"Success","message":"messages.success_show_all","code":200,"data":{"current_page":1,"data":[{"id":6,"user_id":2,"article_id":null,"video_id":1,"comment":"test comment for video","status":"1","created_at":"2021-06-10T18:24:11.000000Z","updated_at":"2021-06-10T18:24:11.000000Z","video":{"id":1,"user_id":3,"category_id":7,"title":"demo test video","type":"directly","video_path":"public\/article\/ar_60b9d76d9b425aCRbuSYvKl.mp4","youtube_link":null,"total_like":null,"total_bookmark":null,"total_download":null,"total_share":null,"total_view":null,"post_date":"2021-06-11","status":1,"is_published":1,"created_at":"2021-06-04T07:34:05.000000Z","updated_at":"2021-06-05T20:02:16.000000Z"},"user":{"id":2,"username":"pennyyau88","phone":null,"name":null,"occupation_id":null,"email":"penny@gmail.com","profile_pic":null,"sex":"Male","industry_id":0,"salary_range_id":1,"referral_code":null,"email_verified_at":null,"status":1,"created_at":"2021-04-22T04:35:27.000000Z","updated_at":"2021-04-22T04:35:27.000000Z","user_type":"admin","is_api":0}},{"id":4,"user_id":2,"article_id":1,"video_id":null,"comment":"test comment for article","status":"1","created_at":"2021-06-10T18:17:17.000000Z","updated_at":"2021-06-10T18:17:17.000000Z","video":null,"user":{"id":2,"username":"pennyyau88","phone":null,"name":null,"occupation_id":null,"email":"penny@gmail.com","profile_pic":null,"sex":"Male","industry_id":0,"salary_range_id":1,"referral_code":null,"email_verified_at":null,"status":1,"created_at":"2021-04-22T04:35:27.000000Z","updated_at":"2021-04-22T04:35:27.000000Z","user_type":"admin","is_api":0}}],"first_page_url":"http:\/\/localhost\/dss_api\/api\/comments?page=1","from":1,"last_page":1,"last_page_url":"http:\/\/localhost\/dss_api\/api\/comments?page=1","links":[{"url":null,"label":"&laquo; Previous","active":false},{"url":"http:\/\/localhost\/dss_api\/api\/comments?page=1","label":1,"active":true},{"url":null,"label":"Next &raquo;","active":false}],"next_page_url":null,"path":"http:\/\/localhost\/dss_api\/api\/comments","per_page":10,"prev_page_url":null,"to":2,"total":2}}
     */

    public function index(Request $request)
    {

        try {
            $queryParams = [
                'limit'         =>  $request->limit ?? 10,
                'sortBy'        =>  $request->sortBy ?? 'id',
                'orderBy'       =>  in_array($request->orderBy, ['ASC', 'DESC']) ? $request->orderBy : 'DESC',
            ];
            $whereClause = $request->whereClause ?? [];

            if ($request->filled('article_id')) {

                $all_comments = Comment::query()
                    ->where('user_id', $request->user_id)
                    ->where('article_id', $request->article_id)
                    ->with('article', 'user')
                    ->where('status',1)
                    ->orderBy($queryParams['sortBy'], $queryParams['orderBy'])
                    ->where($whereClause)
                    ->paginate($queryParams['limit'])
                    ->toArray();
            }
            if ($request->filled('video_id')) {

                    $all_comments = Comment::query()
                        ->where('user_id', $request->user_id)
                        ->where('status',1)
                        ->with('video', 'user')
                        ->orderBy($queryParams['sortBy'], $queryParams['orderBy'])
                        ->where($whereClause)
                        ->paginate($queryParams['limit'])
                        ->toArray();
            }

            return WebApiResponse::success(200, $all_comments, trans('messages.success_show_all'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.failed_show_all'));
        }
    }


    /**
     * Create New User Comments Of Article
     * @group  Article
     * @authenticated
     * @param  \Illuminate\Http\Request  $request
     * @bodyParam user_id  Integer required User Id. Example: 1
     * @bodyParam article_id  Integer required Article Id. Example: 1
     * @bodyParam article_id  Integer required Article Id. Example: 1
     * @bodyParam  article_id  integer   nullable there  article_id Example: 1,
     * @bodyParam  video_id   integer   nullable there   video_id Example: 1,
     * @return \Illuminate\Http\Response
     * @response 200 {"status":"Success","message":"messages.success_created","code":200,"data":{"user_id":"2","article_id":"1","comment":"test comment for article","status":1,"updated_at":"2021-06-10T18:12:14.000000Z","created_at":"2021-06-10T18:12:14.000000Z","id":1}}
     */

    public function store(Request $request)
    {

        $data = $request->validate([
            'user_id'        => 'required|integer',
            'article_id'     => 'nullable|integer',
            'video_id'       => 'nullable|integer',
            'comment'        => 'required | string',
        ]);

        $data['status']  = 1;
        $new_data = Comment::create($data);

        if ($new_data) {
            return WebApiResponse::success(200, $new_data->toArray(), trans('messages.success_created'));
        } else {
            return WebApiResponse::error(404, $errors = [], 'Comment Create fail');
        }
    }



    public function destroy($id)
    {
        //
    }
}
