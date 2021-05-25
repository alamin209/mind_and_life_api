<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Rules\MatchOldPassword;
use App\Libraries\WebApiResponse;
use App\Models\Video;
use App\Models\Advertisement;
use App\Libraries\AdRecursionHelper;
class VideController extends Controller
{

    /**
     * Display List  Video list
     * @group Video
     * @authenticated
     * @queryParam category_id integer optional Category  Id to Filter. Example: 1
     * @queryParam limit  integer  optional  per page limit   to Filter.Example:10
     * @queryParam orderBy  String  optional  Order    to Filter. Example:DESC
     * @return \Illuminate\Http\Response
     * @response 200
     * {"status":"Success","message":"messages.success_show_all","code":200,"data":{"current_page":1,"data":[{"id":6,"user_id":1,"category_id":11,"title":"sdfds","type":"directly","video_path":"public\/article\/ar_60aafab8e064aKLd5q4wKGt.mp4","youtube_link":null,"total_like":null,"total_bookmark":null,"total_download":null,"total_share":null,"total_view":null,"post_date":"2021-05-11","status":1,"created_at":"2021-05-24T01:00:40.000000Z","updated_at":"2021-05-24T01:00:40.000000Z","author":{"id":1,"username":"al-amin_hossainmind_life","email":"alamin209209@gmail.com","profile_pic":"https:\/\/lh5.googleusercontent.com\/-9S33dmSeYgQ\/AAAAAAAAAAI\/AAAAAAAAAAA\/AMZuucnEXYFy3mMQISfBSLntpYIANBF-zw\/s96-c\/photo.jpg","sex":null,"industry_id":null,"salary_range_id":null,"referral_code":null,"email_verified_at":"2021-04-01T23:17:42.000000Z","status":1,"created_at":"2021-04-21T06:07:29.000000Z","updated_at":"2021-04-21T06:07:29.000000Z","user_type":"staff"},"video_category":{"id":11,"name":"Video Category 2","type":"video","status":1,"created_at":"2021-05-10T21:25:03.000000Z","updated_at":"2021-05-10T21:25:03.000000Z"},"video_tags":[],"user_log_details":[]},{"id":5,"user_id":2,"category_id":12,"title":"ert","type":"directly","video_path":"public\/article\/ar_60aaa52179652aI1GfGDtgP.mp4","youtube_link":null,"total_like":null,"total_bookmark":null,"total_download":null,"total_share":null,"total_view":null,"post_date":"2021-05-19","status":1,"created_at":"2021-05-23T18:55:29.000000Z","updated_at":"2021-05-23T18:55:29.000000Z","author":{"id":2,"username":"pennyyau88","email":"penny@gmail.com","profile_pic":"upload\/6080fd0fcdd1b_work_alamin_vai.png","sex":"Male","industry_id":1,"salary_range_id":1,"referral_code":null,"email_verified_at":null,"status":1,"created_at":"2021-04-22T04:35:27.000000Z","updated_at":"2021-04-22T04:35:27.000000Z","user_type":"admin"},"video_category":{"id":12,"name":"Test video","type":"video","status":1,"created_at":"2021-05-11T04:46:42.000000Z","updated_at":"2021-05-11T04:46:42.000000Z"},"video_tags":[],"user_log_details":[]},{"id":4,"user_id":1,"category_id":11,"title":"ertert","type":"directly","video_path":"article\/ar_60aaa4ed5669daRUKAi75t6.mp4","youtube_link":null,"total_like":null,"total_bookmark":null,"total_download":null,"total_share":null,"total_view":null,"post_date":"2021-05-18","status":1,"created_at":"2021-05-23T18:54:37.000000Z","updated_at":"2021-05-23T18:54:37.000000Z","author":{"id":1,"username":"al-amin_hossainmind_life","email":"alamin209209@gmail.com","profile_pic":"https:\/\/lh5.googleusercontent.com\/-9S33dmSeYgQ\/AAAAAAAAAAI\/AAAAAAAAAAA\/AMZuucnEXYFy3mMQISfBSLntpYIANBF-zw\/s96-c\/photo.jpg","sex":null,"industry_id":null,"salary_range_id":null,"referral_code":null,"email_verified_at":"2021-04-01T23:17:42.000000Z","status":1,"created_at":"2021-04-21T06:07:29.000000Z","updated_at":"2021-04-21T06:07:29.000000Z","user_type":"staff"},"video_category":{"id":11,"name":"Video Category 2","type":"video","status":1,"created_at":"2021-05-10T21:25:03.000000Z","updated_at":"2021-05-10T21:25:03.000000Z"},"video_tags":[],"user_log_details":[]},{"id":3,"user_id":1,"category_id":11,"title":"ertre","type":"link","video_path":null,"youtube_link":"https:\/\/www.youtube.com\/watch?v=G2fnlWaJNFE&list=PLFZAa7EupbB4OPoiMcFVY6KaNsJA8CY_B","total_like":null,"total_bookmark":null,"total_download":null,"total_share":null,"total_view":null,"post_date":"2021-05-26","status":1,"created_at":"2021-05-23T18:51:28.000000Z","updated_at":"2021-05-23T18:51:28.000000Z","author":{"id":1,"username":"al-amin_hossainmind_life","email":"alamin209209@gmail.com","profile_pic":"https:\/\/lh5.googleusercontent.com\/-9S33dmSeYgQ\/AAAAAAAAAAI\/AAAAAAAAAAA\/AMZuucnEXYFy3mMQISfBSLntpYIANBF-zw\/s96-c\/photo.jpg","sex":null,"industry_id":null,"salary_range_id":null,"referral_code":null,"email_verified_at":"2021-04-01T23:17:42.000000Z","status":1,"created_at":"2021-04-21T06:07:29.000000Z","updated_at":"2021-04-21T06:07:29.000000Z","user_type":"staff"},"video_category":{"id":11,"name":"Video Category 2","type":"video","status":1,"created_at":"2021-05-10T21:25:03.000000Z","updated_at":"2021-05-10T21:25:03.000000Z"},"video_tags":[],"user_log_details":[]},{"id":2,"user_id":1,"category_id":2,"title":null,"type":"link","video_path":"sdfsdf","youtube_link":"<iframe width=\"560\" height=\"315\" src=\"https:\/\/www.youtube.com\/embed\/prJIrUgIN9Y\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen><\/iframe>list=PLylMDDjFIp1Dc_dgUY7q3TEG86RzXnR5P&index=14","total_like":null,"total_bookmark":null,"total_download":null,"total_share":null,"total_view":null,"post_date":null,"status":1,"created_at":"2021-05-11T11:10:52.000000Z","updated_at":"2021-05-05T11:10:54.000000Z","author":{"id":1,"username":"al-amin_hossainmind_life","email":"alamin209209@gmail.com","profile_pic":"https:\/\/lh5.googleusercontent.com\/-9S33dmSeYgQ\/AAAAAAAAAAI\/AAAAAAAAAAA\/AMZuucnEXYFy3mMQISfBSLntpYIANBF-zw\/s96-c\/photo.jpg","sex":null,"industry_id":null,"salary_range_id":null,"referral_code":null,"email_verified_at":"2021-04-01T23:17:42.000000Z","status":1,"created_at":"2021-04-21T06:07:29.000000Z","updated_at":"2021-04-21T06:07:29.000000Z","user_type":"staff"},"video_category":{"id":2,"name":"video category","type":"video","status":0,"created_at":"2021-05-04T12:13:31.000000Z","updated_at":"2021-05-10T21:25:35.000000Z"},"video_tags":[],"user_log_details":[],"advertise":{"id":11,"is_google":0,"add_sense_link":"http:\/\/localhost\/hongkong\/public\/advertisement\/cp_signature_608bef218fb79RyfYKDrTlU.jpg","ad_image_path":"public\/advertisement\/ad_608fc9f6bded5fj6jNTpH9l.jpeg","total_clicks":25,"website_link":"সাদসদাসদাস","status":1,"created_at":"2021-05-01T07:20:58.000000Z","updated_at":"2021-05-04T07:36:04.000000Z"}},{"id":1,"user_id":1,"category_id":2,"title":null,"type":"directly","video_path":"public\/article\/demo_video.mp4","youtube_link":null,"total_like":0,"total_bookmark":0,"total_download":null,"total_share":1,"total_view":1,"post_date":null,"status":1,"created_at":"2021-05-11T11:10:47.000000Z","updated_at":"2021-05-11T07:45:41.000000Z","author":{"id":1,"username":"al-amin_hossainmind_life","email":"alamin209209@gmail.com","profile_pic":"https:\/\/lh5.googleusercontent.com\/-9S33dmSeYgQ\/AAAAAAAAAAI\/AAAAAAAAAAA\/AMZuucnEXYFy3mMQISfBSLntpYIANBF-zw\/s96-c\/photo.jpg","sex":null,"industry_id":null,"salary_range_id":null,"referral_code":null,"email_verified_at":"2021-04-01T23:17:42.000000Z","status":1,"created_at":"2021-04-21T06:07:29.000000Z","updated_at":"2021-04-21T06:07:29.000000Z","user_type":"staff"},"video_category":{"id":2,"name":"video category","type":"video","status":0,"created_at":"2021-05-04T12:13:31.000000Z","updated_at":"2021-05-10T21:25:35.000000Z"},"video_tags":[],"user_log_details":[]}],"first_page_url":"http:\/\/127.0.0.1:8000\/api\/videos\/list?page=1","from":1,"last_page":1,"last_page_url":"http:\/\/127.0.0.1:8000\/api\/videos\/list?page=1","links":[{"url":null,"label":"&laquo; Previous","active":false},{"url":"http:\/\/127.0.0.1:8000\/api\/videos\/list?page=1","label":1,"active":true},{"url":null,"label":"Next &raquo;","active":false}],"next_page_url":null,"path":"http:\/\/127.0.0.1:8000\/api\/videos\/list","per_page":"20","prev_page_url":null,"to":7,"total":7}}
     */

    // public function list(Request $request)
    // {

    //     $queryParams = [
    //         'limit'         =>  $request->limit ?? 10,
    //         'sortBy'        =>  $request->sortBy ?? 'id',
    //         'orderBy'       =>  in_array($request->orderBy, ['ASC', 'DESC']) ? $request->orderBy : 'DESC',
    //     ];
    //     $whereClause = $request->whereClause ?? [];

    //     $query =  Video::query();
    //     $query->where($whereClause);

    //     if ($request->filled('category_id')) {
    //         $query->where('category_id',  $request->category_id);
    //     }

    //     try {
    //         $article = $query->with('author', 'video_category','video_tags','user_log_details')->where('status', 1)->orderBy($queryParams['sortBy'], $queryParams['orderBy'])->where($whereClause)->paginate($queryParams['limit'])->toArray();
    //         return WebApiResponse::success(200, $article, trans('messages.success_show_all'));
    //     } catch (\Throwable $th) {
    //         return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
    //     }
    // }


    public function list(Request $request)
    {
        try {
            $queryParams = [
                'limit'         =>  $request->limit ?? 10,
                'sortBy'        =>  $request->sortBy ?? 'id',
                'orderBy'       =>  in_array($request->orderBy, ['ASC', 'DESC']) ? $request->orderBy : 'DESC',
            ];
            $whereClause = $request->whereClause ?? [];

            //$user =auth()->guard('api')->user();

            $articles = Video::query()
            ->with('author', 'video_category','video_tags','user_log_details')
            ->where('status', 1)
            ->orderBy($queryParams['sortBy'], $queryParams['orderBy'])
            ->where($whereClause)
            ->paginate($queryParams['limit'])
            ->toArray();

            $advertises = Advertisement::inRandomOrder()->get()->toArray();

            $return = [];
            $subArticles  = array_chunk($articles['data'], 5);
            foreach ($subArticles as $key => $value) {
                foreach ($value as $subKey => $subValue) {
                    array_push($return, $subValue);
                }
                $ad_length = count($advertises);
                $ad = $advertises[AdRecursionHelper::recursion($key, $ad_length)];
                $ad['is_ad'] = true;
                array_push($return, $ad);
            }

            $articles['data'] = $return;
            return WebApiResponse::success(200, $articles, trans('messages.success_show_all'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.failed_show_all'));
        }
    }

    /**
     * Display the specified Video Article
     * @group Video
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @response 200  {"status":"Success","message":"Salary Data Fund","code":200,"data":{"id":1,"user_id":1,"category_id":2,"type":" directly","video_path":null,"youtube_link":null,"status":1,"created_at":null,"updated_at":null,"author":{"id":1,"username":"al-amin_hossainmind_life","email":"alamin209209@gmail.com","profile_pic":"https:\/\/lh5.googleusercontent.com\/-9S33dmSeYgQ\/AAAAAAAAAAI\/AAAAAAAAAAA\/AMZuucnEXYFy3mMQISfBSLntpYIANBF-zw\/s96-c\/photo.jpg","sex":null,"industry_id":null,"salary_range_id":null,"referral_code":null,"email_verified_at":"2021-04-01T23:17:42.000000Z","status":1,"created_at":"2021-04-21T06:07:29.000000Z","updated_at":"2021-04-21T06:07:29.000000Z","user_type":"staff"},"video_category":{"id":2,"name":"video category","type":"video","status":1,"created_at":"2021-05-04T12:13:31.000000Z","updated_at":"2021-05-17T12:13:33.000000Z"}}}
    */

    public function show($id)
    {
        try {
            $article = Video::with('author', 'video_category','video_tags')->findOrFail($id);
            return WebApiResponse::success(200, $article, 'Salary Data Fund');
        } catch (\Throwable $th) {
            $errors = $th->getMessage();
            return WebApiResponse::error(500, [$errors], 'Something Went Wrong');
        }
    }
}
