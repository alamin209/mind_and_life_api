<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\WebApiResponse;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Video;
use App\Models\Advertisement;
use DB;
use App\Libraries\AdRecursionHelper;
class ArticleController extends Controller
{
    /**
     * Display List  Article list
     * @group Article
     * @queryParam category_id integer optional Category  Id to Filter Example: 1.
     * @queryParam limit  integer  optional  per page limit   to Filter Example:10 .
     * @queryParam orderBy  String  optional  Order    to Filter Example:DESC .
     * @queryParam sortBy  String  optional  Order    to Filter  Example:id .
     * @queryParam title  String  optional  title    to Filter  Example:Loarinepsume .
     * @return \Illuminate\Http\Response
     * @response 200
     * {"status":"Success","message":"messages.success_show_all","code":200,"data":{"current_page":1,"data":[[{"id":11,"user_id":2,"category_id":5,"title":"werwer","description":"<p>wer werwer werw erew<\/p>","total_like":null,"total_bookmark":null,"total_share":null,"total_view":null,"post_date":"2021-05-20","image_path":"public\/article\/ar_60a40ab7b416136dgfvpqnI.png","status":1,"created_at":"2021-05-18T18:43:03.000000Z","updated_at":"2021-05-18T18:43:03.000000Z","author":{"id":2,"username":"pennyyau88","email":"penny@gmail.com","profile_pic":"upload\/6080fd0fcdd1b_work_alamin_vai.png","sex":"Male","industry_id":1,"salary_range_id":1,"referral_code":null,"email_verified_at":null,"status":1,"created_at":"2021-04-22T04:35:27.000000Z","updated_at":"2021-04-22T04:35:27.000000Z","user_type":"admin"},"article_category":{"id":5,"name":"rain\r\n","type":"article","status":1,"created_at":"2021-05-18T12:13:26.000000Z","updated_at":"2021-05-11T12:13:28.000000Z"},"article_tags":[],"user_log_details":[]},{"id":10,"user_id":1,"category_id":6,"title":"asdhuaish asudhiuashiduhasiuhduiahs iudhiuas","description":"<p>ewrwer werewrewr<br \/>asedasdsadasd<\/p>\r\n<p><br \/>sdsdsds<\/p>","total_like":null,"total_bookmark":null,"total_share":null,"total_view":null,"post_date":"2021-05-18","image_path":"public\/article\/ar_60a40a762af9frt5UJNEaKC.png","status":1,"created_at":"2021-05-18T18:41:58.000000Z","updated_at":"2021-05-18T18:41:58.000000Z","author":{"id":1,"username":"al-amin_hossainmind_life","email":"alamin209209@gmail.com","profile_pic":"https:\/\/lh5.googleusercontent.com\/-9S33dmSeYgQ\/AAAAAAAAAAI\/AAAAAAAAAAA\/AMZuucnEXYFy3mMQISfBSLntpYIANBF-zw\/s96-c\/photo.jpg","sex":null,"industry_id":null,"salary_range_id":null,"referral_code":null,"email_verified_at":"2021-04-01T23:17:42.000000Z","status":1,"created_at":"2021-04-21T06:07:29.000000Z","updated_at":"2021-04-21T06:07:29.000000Z","user_type":"staff"},"article_category":{"id":6,"name":"Hair\r\n","type":"article","status":1,"created_at":"2021-05-18T12:13:26.000000Z","updated_at":"2021-05-11T12:13:28.000000Z"},"article_tags":[{"id":16,"article_id":10,"video_id":null,"tag_name":"rtytr","status":1,"created_at":"2021-05-18T18:39:22.000000Z","updated_at":"2021-05-18T18:39:22.000000Z"}],"user_log_details":[]},{"id":9,"user_id":1,"category_id":5,"title":"desc4iotion","description":"<p>werwer<\/p>","total_like":null,"total_bookmark":null,"total_share":null,"total_view":null,"post_date":"2021-05-25","image_path":"public\/article\/ar_60a409da90a8803myZ0EE1A.png","status":1,"created_at":"2021-05-18T18:39:22.000000Z","updated_at":"2021-05-18T18:39:22.000000Z","author":{"id":1,"username":"al-amin_hossainmind_life","email":"alamin209209@gmail.com","profile_pic":"https:\/\/lh5.googleusercontent.com\/-9S33dmSeYgQ\/AAAAAAAAAAI\/AAAAAAAAAAA\/AMZuucnEXYFy3mMQISfBSLntpYIANBF-zw\/s96-c\/photo.jpg","sex":null,"industry_id":null,"salary_range_id":null,"referral_code":null,"email_verified_at":"2021-04-01T23:17:42.000000Z","status":1,"created_at":"2021-04-21T06:07:29.000000Z","updated_at":"2021-04-21T06:07:29.000000Z","user_type":"staff"},"article_category":{"id":5,"name":"rain\r\n","type":"article","status":1,"created_at":"2021-05-18T12:13:26.000000Z","updated_at":"2021-05-11T12:13:28.000000Z"},"article_tags":[{"id":15,"article_id":9,"video_id":null,"tag_name":"werwer","status":1,"created_at":"2021-05-18T17:53:32.000000Z","updated_at":"2021-05-18T17:53:32.000000Z"}],"user_log_details":[]},{"id":8,"user_id":2,"category_id":3,"title":"werwer","description":null,"total_like":null,"total_bookmark":null,"total_share":null,"total_view":null,"post_date":"2021-05-21","image_path":"public\/article\/ar_60a3ff1c447f9GYNz4x2iu1.png","status":1,"created_at":"2021-05-18T17:53:32.000000Z","updated_at":"2021-05-18T17:53:32.000000Z","author":{"id":2,"username":"pennyyau88","email":"penny@gmail.com","profile_pic":"upload\/6080fd0fcdd1b_work_alamin_vai.png","sex":"Male","industry_id":1,"salary_range_id":1,"referral_code":null,"email_verified_at":null,"status":1,"created_at":"2021-04-22T04:35:27.000000Z","updated_at":"2021-04-22T04:35:27.000000Z","user_type":"admin"},"article_category":{"id":3,"name":"Heath\r\n","type":"article","status":1,"created_at":"2021-05-18T12:13:26.000000Z","updated_at":"2021-05-11T12:13:28.000000Z"},"article_tags":[{"id":12,"article_id":8,"video_id":null,"tag_name":"erter","status":1,"created_at":"2021-05-18T17:53:00.000000Z","updated_at":"2021-05-18T17:53:00.000000Z"},{"id":13,"article_id":8,"video_id":null,"tag_name":"ertert","status":1,"created_at":"2021-05-18T17:53:00.000000Z","updated_at":"2021-05-18T17:53:00.000000Z"},{"id":14,"article_id":8,"video_id":null,"tag_name":"ertertre","status":1,"created_at":"2021-05-18T17:53:00.000000Z","updated_at":"2021-05-18T17:53:00.000000Z"}],"user_log_details":[]},{"id":7,"user_id":1,"category_id":5,"title":"erter","description":null,"total_like":null,"total_bookmark":null,"total_share":null,"total_view":null,"post_date":"2021-05-05","image_path":"public\/article\/ar_60a3fefca64657yCVXVhjqD.png","status":1,"created_at":"2021-05-18T17:53:00.000000Z","updated_at":"2021-05-18T17:53:00.000000Z","author":{"id":1,"username":"al-amin_hossainmind_life","email":"alamin209209@gmail.com","profile_pic":"https:\/\/lh5.googleusercontent.com\/-9S33dmSeYgQ\/AAAAAAAAAAI\/AAAAAAAAAAA\/AMZuucnEXYFy3mMQISfBSLntpYIANBF-zw\/s96-c\/photo.jpg","sex":null,"industry_id":null,"salary_range_id":null,"referral_code":null,"email_verified_at":"2021-04-01T23:17:42.000000Z","status":1,"created_at":"2021-04-21T06:07:29.000000Z","updated_at":"2021-04-21T06:07:29.000000Z","user_type":"staff"},"article_category":{"id":5,"name":"rain\r\n","type":"article","status":1,"created_at":"2021-05-18T12:13:26.000000Z","updated_at":"2021-05-11T12:13:28.000000Z"},"article_tags":[{"id":11,"article_id":7,"video_id":null,"tag_name":"werwer","status":1,"created_at":"2021-05-18T17:52:33.000000Z","updated_at":"2021-05-18T17:52:33.000000Z"}],"user_log_details":[]}],{"id":13,"is_google":1,"add_sense_link":"http:\/\/localhost\/hongkong\/public\/advertisement\/cp_signature_608bef218fb79RyfYKDrTlU.jpg","ad_image_path":"","total_clicks":null,"website_link":"","status":1,"created_at":"2021-05-02T05:01:44.000000Z","updated_at":"2021-05-03T13:06:12.000000Z"},[{"id":6,"user_id":2,"category_id":1,"title":"werwerewr","description":null,"total_like":null,"total_bookmark":null,"total_share":null,"total_view":null,"post_date":"2021-05-03","image_path":"public\/article\/ar_60a3fee19c63aaK0xm53r8v.jpg","status":1,"created_at":"2021-05-18T17:52:33.000000Z","updated_at":"2021-05-18T17:52:33.000000Z","author":{"id":2,"username":"pennyyau88","email":"penny@gmail.com","profile_pic":"upload\/6080fd0fcdd1b_work_alamin_vai.png","sex":"Male","industry_id":1,"salary_range_id":1,"referral_code":null,"email_verified_at":null,"status":1,"created_at":"2021-04-22T04:35:27.000000Z","updated_at":"2021-04-22T04:35:27.000000Z","user_type":"admin"},"article_category":{"id":1,"name":"article category","type":"article","status":1,"created_at":"2021-05-18T12:13:26.000000Z","updated_at":"2021-05-07T04:29:58.000000Z"},"article_tags":[{"id":10,"article_id":6,"video_id":null,"tag_name":"werew","status":1,"created_at":"2021-05-18T17:52:18.000000Z","updated_at":"2021-05-18T17:52:18.000000Z"}],"user_log_details":[]},{"id":5,"user_id":2,"category_id":1,"title":"werew","description":null,"total_like":null,"total_bookmark":null,"total_share":null,"total_view":null,"post_date":"2021-05-26","image_path":"public\/article\/ar_60a3fed29b658n7PUr3dnpV.png","status":1,"created_at":"2021-05-18T17:52:18.000000Z","updated_at":"2021-05-18T17:52:18.000000Z","author":{"id":2,"username":"pennyyau88","email":"penny@gmail.com","profile_pic":"upload\/6080fd0fcdd1b_work_alamin_vai.png","sex":"Male","industry_id":1,"salary_range_id":1,"referral_code":null,"email_verified_at":null,"status":1,"created_at":"2021-04-22T04:35:27.000000Z","updated_at":"2021-04-22T04:35:27.000000Z","user_type":"admin"},"article_category":{"id":1,"name":"article category","type":"article","status":1,"created_at":"2021-05-18T12:13:26.000000Z","updated_at":"2021-05-07T04:29:58.000000Z"},"article_tags":[{"id":7,"article_id":5,"video_id":null,"tag_name":"test tag","status":1,"created_at":"2021-05-10T20:01:35.000000Z","updated_at":"2021-05-10T20:01:35.000000Z"},{"id":8,"article_id":5,"video_id":null,"tag_name":"test2 tag","status":1,"created_at":"2021-05-10T20:01:35.000000Z","updated_at":"2021-05-10T20:01:35.000000Z"},{"id":9,"article_id":5,"video_id":null,"tag_name":"more test3","status":1,"created_at":"2021-05-10T20:01:35.000000Z","updated_at":"2021-05-10T20:01:35.000000Z"}],"user_log_details":[{"id":9,"user_id":2,"article_id":5,"video_id":null,"user_like":1,"is_read":null,"user_bookmark":1,"created_at":"2021-05-18T17:48:14.000000Z","updated_at":"2021-05-18T17:48:39.000000Z"}]},{"id":4,"user_id":1,"category_id":5,"title":"Rain Example","description":null,"total_like":1,"total_bookmark":1,"total_share":0,"total_view":null,"post_date":"2021-05-11","image_path":"public\/article\/ar_6099911eeba6eND1RB8WAeV.png","status":1,"created_at":"2021-05-10T20:01:34.000000Z","updated_at":"2021-05-18T17:48:39.000000Z","author":{"id":1,"username":"al-amin_hossainmind_life","email":"alamin209209@gmail.com","profile_pic":"https:\/\/lh5.googleusercontent.com\/-9S33dmSeYgQ\/AAAAAAAAAAI\/AAAAAAAAAAA\/AMZuucnEXYFy3mMQISfBSLntpYIANBF-zw\/s96-c\/photo.jpg","sex":null,"industry_id":null,"salary_range_id":null,"referral_code":null,"email_verified_at":"2021-04-01T23:17:42.000000Z","status":1,"created_at":"2021-04-21T06:07:29.000000Z","updated_at":"2021-04-21T06:07:29.000000Z","user_type":"staff"},"article_category":{"id":5,"name":"rain\r\n","type":"article","status":1,"created_at":"2021-05-18T12:13:26.000000Z","updated_at":"2021-05-11T12:13:28.000000Z"},"article_tags":[{"id":6,"article_id":4,"video_id":null,"tag_name":"Exercise","status":1,"created_at":"2021-05-10T19:05:57.000000Z","updated_at":"2021-05-10T19:05:57.000000Z"}],"user_log_details":[]},{"id":3,"user_id":1,"category_id":9,"title":"This is Exerice example title","description":null,"total_like":null,"total_bookmark":null,"total_share":null,"total_view":null,"post_date":"2021-05-19","image_path":"public\/article\/ad_60998415d177a0UeIIBob1m.jpg","status":1,"created_at":"2021-05-10T19:05:57.000000Z","updated_at":"2021-05-10T19:05:57.000000Z","author":{"id":1,"username":"al-amin_hossainmind_life","email":"alamin209209@gmail.com","profile_pic":"https:\/\/lh5.googleusercontent.com\/-9S33dmSeYgQ\/AAAAAAAAAAI\/AAAAAAAAAAA\/AMZuucnEXYFy3mMQISfBSLntpYIANBF-zw\/s96-c\/photo.jpg","sex":null,"industry_id":null,"salary_range_id":null,"referral_code":null,"email_verified_at":"2021-04-01T23:17:42.000000Z","status":1,"created_at":"2021-04-21T06:07:29.000000Z","updated_at":"2021-04-21T06:07:29.000000Z","user_type":"staff"},"article_category":{"id":9,"name":"exercise ","type":"article","status":1,"created_at":"2021-05-18T12:13:26.000000Z","updated_at":"2021-05-11T12:13:28.000000Z"},"article_tags":[{"id":4,"article_id":3,"video_id":null,"tag_name":"Sewing","status":1,"created_at":"2021-05-10T18:42:42.000000Z","updated_at":"2021-05-10T18:42:42.000000Z"},{"id":5,"article_id":3,"video_id":null,"tag_name":"Sewing 2","status":1,"created_at":"2021-05-10T18:42:42.000000Z","updated_at":"2021-05-10T18:42:42.000000Z"}],"user_log_details":[]},{"id":2,"user_id":2,"category_id":7,"title":"Sewing the title for eaxample is given","description":null,"total_like":null,"total_bookmark":null,"total_share":null,"total_view":null,"post_date":"2021-05-12","image_path":"public\/article\/ad_60997ea283d63nZ6aQshWuD.jpg","status":1,"created_at":"2021-05-10T18:42:42.000000Z","updated_at":"2021-05-10T18:42:42.000000Z","author":{"id":2,"username":"pennyyau88","email":"penny@gmail.com","profile_pic":"upload\/6080fd0fcdd1b_work_alamin_vai.png","sex":"Male","industry_id":1,"salary_range_id":1,"referral_code":null,"email_verified_at":null,"status":1,"created_at":"2021-04-22T04:35:27.000000Z","updated_at":"2021-04-22T04:35:27.000000Z","user_type":"admin"},"article_category":{"id":7,"name":"Sewing ","type":"article","status":1,"created_at":"2021-05-18T12:13:26.000000Z","updated_at":"2021-05-11T12:13:28.000000Z"},"article_tags":[{"id":2,"article_id":2,"video_id":null,"tag_name":"Rain","status":1,"created_at":"2021-05-10T18:32:04.000000Z","updated_at":"2021-05-10T18:32:04.000000Z"},{"id":3,"article_id":2,"video_id":null,"tag_name":"Water","status":1,"created_at":"2021-05-10T18:32:04.000000Z","updated_at":"2021-05-10T18:32:04.000000Z"}],"user_log_details":[]}],{"id":11,"is_google":0,"add_sense_link":"http:\/\/localhost\/hongkong\/public\/advertisement\/cp_signature_608bef218fb79RyfYKDrTlU.jpg","ad_image_path":"public\/advertisement\/ad_608fc9f6bded5fj6jNTpH9l.jpeg","total_clicks":25,"website_link":"সাদসদাসদাস","status":1,"created_at":"2021-05-01T07:20:58.000000Z","updated_at":"2021-05-04T07:36:04.000000Z"},[{"id":1,"user_id":1,"category_id":1,"title":"This is Rain article that has category 2","description":null,"total_like":0,"total_bookmark":0,"total_share":null,"total_view":null,"post_date":"2021-05-24","image_path":"public\/article\/ar_60998fc6d238fWxEy42jAF9.png","status":1,"created_at":"2021-05-10T18:32:04.000000Z","updated_at":"2021-05-18T10:44:48.000000Z","author":{"id":1,"username":"al-amin_hossainmind_life","email":"alamin209209@gmail.com","profile_pic":"https:\/\/lh5.googleusercontent.com\/-9S33dmSeYgQ\/AAAAAAAAAAI\/AAAAAAAAAAA\/AMZuucnEXYFy3mMQISfBSLntpYIANBF-zw\/s96-c\/photo.jpg","sex":null,"industry_id":null,"salary_range_id":null,"referral_code":null,"email_verified_at":"2021-04-01T23:17:42.000000Z","status":1,"created_at":"2021-04-21T06:07:29.000000Z","updated_at":"2021-04-21T06:07:29.000000Z","user_type":"staff"},"article_category":{"id":1,"name":"article category","type":"article","status":1,"created_at":"2021-05-18T12:13:26.000000Z","updated_at":"2021-05-07T04:29:58.000000Z"},"article_tags":[{"id":1,"article_id":1,"video_id":null,"tag_name":"Health tag","status":1,"created_at":"2021-05-10T18:31:09.000000Z","updated_at":"2021-05-10T18:31:09.000000Z"}],"user_log_details":[]}],{"id":20,"is_google":0,"add_sense_link":null,"ad_image_path":"public\/advertisement\/ad_60aafd2f6bc64NOuJ74jJF5.jpeg","total_clicks":null,"website_link":"asdsadsad","status":1,"created_at":"2021-05-24T01:11:11.000000Z","updated_at":"2021-05-24T01:11:11.000000Z"}],"first_page_url":"http:\/\/127.0.0.1:8000\/api\/article\/list?page=1","from":1,"last_page":1,"last_page_url":"http:\/\/127.0.0.1:8000\/api\/article\/list?page=1","links":[{"url":null,"label":"&laquo; Previous","active":false},{"url":"http:\/\/127.0.0.1:8000\/api\/article\/list?page=1","label":1,"active":true},{"url":null,"label":"Next &raquo;","active":false}],"next_page_url":null,"path":"http:\/\/127.0.0.1:8000\/api\/article\/list","per_page":"20","prev_page_url":null,"to":11,"total":11}},
     */

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

            $articles = Article::query()
            ->with('author', 'article_category', 'article_tags','user_log_details')
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
     * Display List  Article with video and article list
     * @group Article
     * @queryParam limit  integer  optional  per page limit   to Filter Example:10 .
     * @queryParam orderBy  String  optional  Order    to Filter Example:DESC .
     * @queryParam sortBy  String  optional  Order    to Filter  Example:id .
     * @queryParam title  String  optional  title    to Filter  Example:Loarinepsume .
     * @queryParam  article_limit  integer  optional  Article Limit   to Filter  Example: 2
     * @queryParam  video_limit  integer  optional  Video Limit   to Filter  Example: 3
     * @return \Illuminate\Http\Response
     * @response 200
     * {"status":"Success","message":"messages.success_show_all","code":200,"data":{"articles":{"current_page":1,"data":[{"id":5,"user_id":1,"category_id":5,"title":"Rain Example","total_like":null,"total_bookmark":null,"total_share":null,"total_view":null,"post_date":"2021-05-11","image_path":"public\/article\/ar_6099911eeba6eND1RB8WAeV.png","status":1,"created_at":"2021-05-10T20:01:34.000000Z","updated_at":"2021-05-10T20:01:34.000000Z","author":{"id":1,"username":"al-amin_hossainmind_life","email":"alamin209209@gmail.com","profile_pic":"https:\/\/lh5.googleusercontent.com\/-9S33dmSeYgQ\/AAAAAAAAAAI\/AAAAAAAAAAA\/AMZuucnEXYFy3mMQISfBSLntpYIANBF-zw\/s96-c\/photo.jpg","sex":null,"industry_id":null,"salary_range_id":null,"referral_code":null,"email_verified_at":"2021-04-01T23:17:42.000000Z","status":1,"created_at":"2021-04-21T06:07:29.000000Z","updated_at":"2021-04-21T06:07:29.000000Z","user_type":"staff"},"article_category":{"id":5,"name":"rain\r\n","type":"article","status":1,"created_at":"2021-05-18T12:13:26.000000Z","updated_at":"2021-05-11T12:13:28.000000Z"},"article_tags":[{"id":7,"article_id":5,"video_id":null,"tag_name":"test tag","status":1,"created_at":"2021-05-10T20:01:35.000000Z","updated_at":"2021-05-10T20:01:35.000000Z"},{"id":8,"article_id":5,"video_id":null,"tag_name":"test2 tag","status":1,"created_at":"2021-05-10T20:01:35.000000Z","updated_at":"2021-05-10T20:01:35.000000Z"},{"id":9,"article_id":5,"video_id":null,"tag_name":"more test3","status":1,"created_at":"2021-05-10T20:01:35.000000Z","updated_at":"2021-05-10T20:01:35.000000Z"}],"user_log_details":[]}],"first_page_url":"http:\/\/127.0.0.1:8000\/api\/all_article\/list?page=1","from":1,"last_page":4,"last_page_url":"http:\/\/127.0.0.1:8000\/api\/all_article\/list?page=4","links":[{"url":null,"label":"&laquo; Previous","active":false},{"url":"http:\/\/127.0.0.1:8000\/api\/all_article\/list?page=1","label":1,"active":true},{"url":"http:\/\/127.0.0.1:8000\/api\/all_article\/list?page=2","label":2,"active":false},{"url":"http:\/\/127.0.0.1:8000\/api\/all_article\/list?page=3","label":3,"active":false},{"url":"http:\/\/127.0.0.1:8000\/api\/all_article\/list?page=4","label":4,"active":false},{"url":"http:\/\/127.0.0.1:8000\/api\/all_article\/list?page=2","label":"Next &raquo;","active":false}],"next_page_url":"http:\/\/127.0.0.1:8000\/api\/all_article\/list?page=2","path":"http:\/\/127.0.0.1:8000\/api\/all_article\/list","per_page":"1","prev_page_url":null,"to":1,"total":4},"videos":{"current_page":1,"data":[{"id":2,"user_id":1,"category_id":2,"type":"link","video_path":"sdfsdf","youtube_link":"https:\/\/www.youtube.com\/watch?v=0gBKy91k-cQ&list=PLylMDDjFIp1Dc_dgUY7q3TEG86RzXnR5P&index=14","total_like":null,"total_bookmark":null,"total_share":null,"total_view":null,"post_date":null,"status":1,"created_at":"2021-05-11T11:10:52.000000Z","updated_at":"2021-05-05T11:10:54.000000Z","author":{"id":1,"username":"al-amin_hossainmind_life","email":"alamin209209@gmail.com","profile_pic":"https:\/\/lh5.googleusercontent.com\/-9S33dmSeYgQ\/AAAAAAAAAAI\/AAAAAAAAAAA\/AMZuucnEXYFy3mMQISfBSLntpYIANBF-zw\/s96-c\/photo.jpg","sex":null,"industry_id":null,"salary_range_id":null,"referral_code":null,"email_verified_at":"2021-04-01T23:17:42.000000Z","status":1,"created_at":"2021-04-21T06:07:29.000000Z","updated_at":"2021-04-21T06:07:29.000000Z","user_type":"staff"},"video_category":{"id":2,"name":"video category","type":"video","status":0,"created_at":"2021-05-04T12:13:31.000000Z","updated_at":"2021-05-10T21:25:35.000000Z"},"video_tags":[],"user_log_details":[]},{"id":1,"user_id":1,"category_id":2,"type":"directly","video_path":"public\/article\/demo_video.mp4","youtube_link":null,"total_like":0,"total_bookmark":0,"total_share":1,"total_view":1,"post_date":null,"status":1,"created_at":"2021-05-11T11:10:47.000000Z","updated_at":"2021-05-11T07:45:41.000000Z","author":{"id":1,"username":"al-amin_hossainmind_life","email":"alamin209209@gmail.com","profile_pic":"https:\/\/lh5.googleusercontent.com\/-9S33dmSeYgQ\/AAAAAAAAAAI\/AAAAAAAAAAA\/AMZuucnEXYFy3mMQISfBSLntpYIANBF-zw\/s96-c\/photo.jpg","sex":null,"industry_id":null,"salary_range_id":null,"referral_code":null,"email_verified_at":"2021-04-01T23:17:42.000000Z","status":1,"created_at":"2021-04-21T06:07:29.000000Z","updated_at":"2021-04-21T06:07:29.000000Z","user_type":"staff"},"video_category":{"id":2,"name":"video category","type":"video","status":0,"created_at":"2021-05-04T12:13:31.000000Z","updated_at":"2021-05-10T21:25:35.000000Z"},"video_tags":[],"user_log_details":[{"id":39,"user_id":1,"article_id":null,"video_id":1,"user_like":null,"user_bookmark":null,"created_at":"2021-05-11T07:45:29.000000Z","updated_at":"2021-05-11T07:45:40.000000Z"}]}],"first_page_url":"http:\/\/127.0.0.1:8000\/api\/all_article\/list?page=1","from":1,"last_page":1,"last_page_url":"http:\/\/127.0.0.1:8000\/api\/all_article\/list?page=1","links":[{"url":null,"label":"&laquo; Previous","active":false},{"url":"http:\/\/127.0.0.1:8000\/api\/all_article\/list?page=1","label":1,"active":true},{"url":null,"label":"Next &raquo;","active":false}],"next_page_url":null,"path":"http:\/\/127.0.0.1:8000\/api\/all_article\/list","per_page":4,"prev_page_url":null,"to":2,"total":2}}}
     */

    public function video_article_list(Request $request)
    {
        $queryParams = [
            // 'limit'         =>  $request->limit ?? 10,
            'sortBy'        =>  $request->sortBy ?? 'id',
            'orderBy'       =>  in_array($request->orderBy, ['ASC', 'DESC']) ? $request->orderBy : 'DESC',
        ];
        $whereClause = $request->whereClause ?? [];

        $query =  Article::query();

        $query2 =  Video::query();

        $user =auth()->guard('api')->user();

        if ($user) {

            $user_id = auth()->guard('api')->user()->id;
            $query->where('user_id', $user_id);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id',  $request->category_id);
        }
        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        $article = $query->with('author', 'article_category', 'article_tags','user_log_details')->where('status', 1)->orderBy($queryParams['sortBy'], $queryParams['orderBy'])->where($whereClause)->paginate($request->article_limit ?? 6)->toArray();


        $video = $query2->with('author', 'video_category','video_tags','user_log_details')->where('status', 1)->orderBy($queryParams['sortBy'], $queryParams['orderBy'])->where($whereClause)->paginate($request->video_limit ?? 4)->toArray();

        $data = [
            'articles'        => $article,
            'videos'        => $video,
        ];



        try {

            return WebApiResponse::success(200, $data, trans('messages.success_show_all'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }

    /**
     * Display the specified Article
     * @group Article
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @response 200  {"status":"Success","message":"Article Data Fund","code":200,"data":{"id":1,"user_id":1,"category_id":1,"title":"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum","total_like":2,"total_bookmark":1,"total_share":4,"total_view":7,"post_date":"2021-04-08","image_path":"dfgfd","status":1,"created_at":null,"updated_at":"2021-05-04T23:20:39.000000Z","author":{"id":1,"username":"al-amin_hossainmind_life","email":"alamin209209@gmail.com","profile_pic":"https:\/\/lh5.googleusercontent.com\/-9S33dmSeYgQ\/AAAAAAAAAAI\/AAAAAAAAAAA\/AMZuucnEXYFy3mMQISfBSLntpYIANBF-zw\/s96-c\/photo.jpg","sex":null,"industry_id":null,"salary_range_id":null,"referral_code":null,"email_verified_at":"2021-04-01T23:17:42.000000Z","status":1,"created_at":"2021-04-21T06:07:29.000000Z","updated_at":"2021-04-21T06:07:29.000000Z","user_type":"staff"},"article_category":{"id":1,"name":"article category","type":"article","status":1,"created_at":"2021-05-18T12:13:26.000000Z","updated_at":"2021-05-11T12:13:28.000000Z"},"article_tags":[{"id":1,"article_id":1,"tag_name":"good","status":1,"created_at":null,"updated_at":null},{"id":2,"article_id":1,"tag_name":"tag_demo","status":1,"created_at":null,"updated_at":null}]}}
     */

    public function show($id)
    {
        try {
            $article = Article::with('author', 'article_category', 'article_tags')->findOrFail($id);
            return WebApiResponse::success(200, $article, 'Article Data Fund');
        } catch (\Throwable $th) {
            $errors = $th->getMessage();
            return WebApiResponse::error(500, [$errors], 'Something Went Wrong');
        }
    }
}
