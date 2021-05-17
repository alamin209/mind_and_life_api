<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArticleUser;
use App\Models\Video;
use App\Libraries\WebApiResponse;
use Illuminate\Support\Facades\Auth;
class VideUserLogController extends Controller
{
   /**
     * Create New User Video Log
     * @group User Video Log
     * @authenticated
     * @param  \Illuminate\Http\Request  $request
     * @bodyParam user_id  Integer required User Id. Example: 1
     * @bodyParam video_id  Integer required Video Id. Example: 1
     * @bodyParam user_like  Integer  optional  The article that like by the user. Example: 1
     * @bodyParam user_bookmark  Integer optional  The article that Bookmark by the user. Example: 1
     * @bodyParam user_share  Integer required  The article that share by the user. Example: 1
     * @bodyParam user_view  Integer required  The article that share by the user. Example: 1
     * @return \Illuminate\Http\Response
     * @response 200 {"status":"Success","message":"Video log ","code":201,"data":{"id":39,"user_id":1,"article_id":null,"video_id":1,"user_like":1,"user_bookmark":1,"created_at":"2021-05-11T07:45:29.000000Z","updated_at":"2021-05-11T07:45:29.000000Z","video":null,"user":{"id":1,"username":"al-amin_hossainmind_life","email":"alamin209209@gmail.com","profile_pic":"https:\/\/lh5.googleusercontent.com\/-9S33dmSeYgQ\/AAAAAAAAAAI\/AAAAAAAAAAA\/AMZuucnEXYFy3mMQISfBSLntpYIANBF-zw\/s96-c\/photo.jpg","sex":null,"industry_id":null,"salary_range_id":null,"referral_code":null,"email_verified_at":"2021-04-01T23:17:42.000000Z","status":1,"created_at":"2021-04-21T06:07:29.000000Z","updated_at":"2021-04-21T06:07:29.000000Z","user_type":"staff"}}}
     */

    public function store(Request $request)
    {

        $data = $request->validate([
            'user_id'        => 'required|integer',
            'video_id'     => 'required|integer',
            'user_like'      => 'nullable | integer',
            'user_bookmark'  => 'nullable | integer',
            'user_share'     => 'nullable | integer',
            'user_view'      => 'nullable | integer'
        ]);



        $video_user = ArticleUser::with('video','user')->where('user_id', $request->user_id)->where('video_id', $request->video_id)->first();

        $video = Video::find($request->video_id);

        if (!$video_user) {

            $new_total_like           = $video->total_like + $request->user_like;
            $new_total_bookmark       = $video->total_bookmark + $request->user_bookmark;

            $video->total_bookmark   = $new_total_bookmark;
            $video->total_like       =  $new_total_like;
            $video->save();

            $new_video_user                        = new ArticleUser();
            $new_video_user->user_id               = $request->user_id;
            $new_video_user->video_id            = $request->video_id;
            $new_video_user->user_like             = $request->user_like;
            $new_video_user->user_bookmark         = $request->user_bookmark;
            $new_video_user->save();

            $update_article_user  = $new_video_user->id;
        }

        if (isset($video_user)) {
            if ($video_user->user_like == 1) {
                $video_user1 = ArticleUser::with('video','user')->where('user_id', $request->user_id)->where('video_id', $request->video_id)->first();
                $video1 = Video::find($request->video_id);

                $video_user1->user_like = null;
                $video_user1->save();


                $new_total_like            = $video1->total_like - $request->user_like;
                $video1->total_like       =  $new_total_like;
                $video1->save();
            }
            if ($video_user->user_like == null) {

                $article_user1 = ArticleUser::where('user_id', $request->user_id)->where('video_id', $request->video_id)->first();
                $video1 = Video::find($request->video_id);

                $video1->user_like = $request->user_like;
                $video1->save();

                $new_total_like            = $video1->total_like + $request->user_like;
                $video1->total_like       =  $new_total_like;
                $video1->save();
            }

            if ($video_user->user_bookmark == 1) {
                $article_user1 = ArticleUser::where('user_id', $request->user_id)->where('video_id', $request->video_id)->first();
                $video1 = Video::find($request->video_id);

                $article_user1->user_bookmark = null;
                $article_user1->save();


                $new_total_bookmark            = $video1->total_bookmark - $request->user_bookmark;
                $video1->total_bookmark       =  $new_total_bookmark;
                $video1->save();
            }
            if ($video_user->user_bookmark == null) {

                $article_user1 = ArticleUser::where('user_id', $request->user_id)->where('video_id', $request->video_id)->first();
                $video1 = Video::find($request->video_id);

                $article_user1->user_bookmark  = $request->user_bookmark;
                $article_user1->save();

                $new_total_bookmark            = $video1->total_bookmark + $request->user_bookmark;
                $video1->total_bookmark       =  $new_total_bookmark;
                $video1->save();
            }

            if ($request->filled('user_share')) {

                $new_user_share = $video->total_share + $request->user_share;
                $video->total_share = $new_user_share;
                $video->save();

                $article_link ="https://app.tvpfundhk.com/api/videos/".$request->video_id;
            }

            if ($request->filled('user_view')) {
                $new_user_share = $video->total_view + $request->user_view;
                $video->total_view = $new_user_share;
                $video->save();

            }

            if ($request->filled('user_share')) {
                $article_user = $article_link;
            }
        }
        return WebApiResponse::success(201, $video_user, 'Video log ');

    }

    /**
     * Display List User Video Log
     * @group User Video Log
     * @authenticated
     * @queryParam limit  integer  optional  per page limit   to Filter Example:10 .
     * @queryParam orderBy  String  optional  Order    to Filter Example:DESC .
     * @queryParam sortBy  String  optional  Order    to Filter  Example:id .
     * @return \Illuminate\Http\Response
     * @response 200
     * {"status":"Success","message":"messages.success_show_all","code":200,"data":{"current_page":1,"data":[{"id":34,"user_id":2,"article_id":1,"video_id":null,"user_like":1,"user_bookmark":null,"created_at":"2021-05-06T11:00:53.000000Z","updated_at":"2021-05-07T09:08:01.000000Z","user":{"id":2,"username":"pennyyau88","email":"penny@gmail.com","profile_pic":"upload\/6080fd0fcdd1b_work_alamin_vai.png","sex":"Male","industry_id":1,"salary_range_id":1,"referral_code":null,"email_verified_at":null,"status":1,"created_at":"2021-04-22T04:35:27.000000Z","updated_at":"2021-04-22T04:35:27.000000Z","user_type":"admin"},"video":null}],"first_page_url":"https:\/\/localhost\/dss_api\/api\/video-user-log\/list?page=1","from":1,"last_page":1,"last_page_url":"https:\/\/localhost\/dss_api\/api\/video-user-log\/list?page=1","links":[{"url":null,"label":"&laquo; Previous","active":false},{"url":"https:\/\/localhost\/dss_api\/api\/video-user-log\/list?page=1","label":1,"active":true},{"url":null,"label":"Next &raquo;","active":false}],"next_page_url":null,"path":"https:\/\/localhost\/dss_api\/api\/video-user-log\/list","per_page":10,"prev_page_url":null,"to":1,"total":1}}
     */

    public function list(Request $request)
    {
        $queryParams = [
            'limit'         =>  $request->limit ?? 10,
            'sortBy'        =>  $request->sortBy ?? 'id',
            'orderBy'       =>  in_array($request->orderBy, ['ASC', 'DESC']) ? $request->orderBy : 'DESC',
        ];
        $whereClause = $request->whereClause ?? [];

        $query =  ArticleUser::query();

        $user_id = Auth::user()->id ;
        $query->where('user_id' ,$user_id);
        try {
            $article = $query->with('user', 'video')->orderBy($queryParams['sortBy'], $queryParams['orderBy'])->where($whereClause)->paginate($queryParams['limit'])->toArray();
            return WebApiResponse::success(200, $article, trans('messages.success_show_all'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }
}
