<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArticleUser;
use App\Libraries\WebApiResponse;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleUserlogController extends Controller
{


    /**
     * Create New User Article Log
     * @group User Article Log
     * @authenticated
     * @param  \Illuminate\Http\Request  $request
     * @bodyParam user_id  Integer required User Id. Example: 1
     * @bodyParam article_id  Integer required Article Id. Example: 1
     * @bodyParam user_like  Integer  optional  The article that like by the user. Example: 1
     * @bodyParam user_bookmark  Integer optional  The article that Bookmark by the user. Example: 1
     * @bodyParam user_share  Integer required  The article that share by the user. Example: 1
     * @bodyParam user_view  Integer required  The article that share by the user. Example: 1
     * @return \Illuminate\Http\Response
     * @response 200 {"status":"Success","message":"User Created","code":201,"data":{"id":1,"username":"alamin","email":"alamin@gmail.com","sex":"Male","industry_id":"1","salary_range_id":"1","referral_code":"2023","access_token":{"access_token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZjRmMDFiZTkzMmMzYTRjZmZkODEzYTdlYjUyNTVmYWY4NDZhODFkY2M0YjM2M2YwOWY4YjBjNGYyNDhlM2M0YzAxZWE5MjIyOTI5YmNiMzUiLCJpYXQiOiIxNjE4MjYwNjU2LjgxMDg4MiIsIm5iZiI6IjE2MTgyNjA2NTYuODEwODg1IiwiZXhwIjoiMTYxODM0NzA1Ni42NTg2MTQiLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.j7M_KXyMJMIK2yRgVNSMggUZVIOjF3XU6MVqzisKrixDBTMapQpWkW0L5VQZF20MRjKjgjBfYVxQJyMrbSA-fRPZWm3NhtUaYhGEH_rBEFLV5TDnBH2aZ8uaFt4Vud4fIplyqKKzLkASUzNK-OJSTE9qR0tIRSt08AwuOTGxmdp4e5kSDZdYp0nwSag00khOeJeamCbAmM514Xtv7qtYVzS2kUvUsH3bVNqJA0fvuD0Yx3Jc6kFY8EIdVKzNfiIT44RG0DUIh7lxGKEF9SAd-hn5IB30WaxPB6XgvNtLuNRKidsQEN7FcZA-dOy14v74D1W78z7ZNq4CInLndWOcuBwXQvwNtNGK2dSHtrnZpy__V7X25BdUUQd8EN1oz-YF0B_HilO_kSbElYaA0jg-XMXQLCnHH59B1t7Yl49O2i3F8I9rqWxN4--KGvhzzQSFj_zXySqwXx6gg4TIpASm3ciFkQnhq6fOjsTmsp-4dwBK7W88Ey6JGmwPeTyPi5vucwBTG11xB0pNo4MCQ-G5Yx-5ApKy_FeY1hg2csBLOZR2Z6vXJvQ8id1XksbQwTJWOjlFskmbt_cqnLnvkCq6ZBiH-N2igCsSKQvS-JHI6Sl7Co-FnNpIbURnrKBX8WNsncHQ2-CSHw4PLsKo61zEZdoEVZURZSACNJXeqvbqGJU","token_type":"Bearer","expires_at":"2021-04-13 20:50:56"},"profile_pic":"public\/upload\/6074b2b0be1a4_1611049331368.JPEG","created_at":"2021-04-12T20:50:56.000000Z","updated_at":"2021-04-12T20:50:56.000000Z"}}
     */

    public function store(Request $request)
    {

        $data = $request->validate([
            'user_id'        => 'required|integer',
            'article_id'     => 'required|integer',
            'user_like'      => 'nullable | integer',
            'user_bookmark'  => 'nullable | integer',
            'user_share'     => 'nullable | integer',
            'user_view'      => 'nullable | integer'
        ]);





        $article_user = ArticleUser::with('article', 'user')->where('user_id', $request->user_id)->where('article_id', $request->article_id)->first();

        $article = Article::find($request->article_id);

        $article_user1 = '';
        $update_article_user = 0;

        if (!$article_user) {

            $new_total_like           = $article->total_like + $request->user_like;
            $new_total_bookmark       = $article->total_bookmark + $request->user_bookmark;

            $article->total_bookmark   = $new_total_bookmark;
            $article->total_like       =  $new_total_like;
            $article->save();

            $new_article_user                         = new ArticleUser();
            $new_article_user->user_id               = $request->user_id;
            $new_article_user->article_id            = $request->article_id;
            $new_article_user->user_like             = $request->user_like;
            $new_article_user->user_bookmark         = $request->user_bookmark;
            $new_article_user->save();
            $update_article_user  = $new_article_user->id;
        }

        if (isset($article_user)) {
            if ($request->filled('user_like')) {
                if ($article_user->user_like == 1) {
                    $article_user1 = ArticleUser::with('article', 'user')->where('user_id', $request->user_id)->where('article_id', $request->article_id)->first();
                    $article1 = Article::find($request->article_id);

                    $article_user1->user_like = null;
                    $article_user1->save();

                    $new_total_like            = $article1->total_like - $request->user_like;
                    $article1->total_like       =  $new_total_like;
                    $article1->save();
                }
                if ($article_user->user_like == null) {

                    $article_user1 = ArticleUser::where('user_id', $request->user_id)->where('article_id', $request->article_id)->first();
                    $article1 = Article::find($request->article_id);

                    $article_user1->user_like = $request->user_like;
                    $article_user1->save();

                    $new_total_like            = $article1->total_like + $request->user_like;
                    $article1->total_like       =  $new_total_like;
                    $article1->save();
                }
            }

            if ($request->filled('user_bookmark')) {
                if ($article_user->user_bookmark == 1) {
                    $article_user1 = ArticleUser::where('user_id', $request->user_id)->where('article_id', $request->article_id)->first();
                    $article1 = Article::find($request->article_id);

                    $article_user1->user_bookmark = null;
                    $article_user1->save();


                    $new_total_bookmark            = $article1->total_bookmark - $request->user_bookmark;
                    $article1->total_bookmark       =  $new_total_bookmark;
                    $article1->save();
                }
                if ($article_user->user_bookmark == null) {

                    $article_user1 = ArticleUser::where('user_id', $request->user_id)->where('article_id', $request->article_id)->first();
                    $article1 = Article::find($request->article_id);

                    $article_user1->user_bookmark  = $request->user_bookmark;
                    $article_user1->save();

                    $new_total_bookmark             = $article1->total_bookmark + $request->user_bookmark;
                    $article1->total_bookmark       =  $new_total_bookmark;
                    $article1->save();
                }
            }

            if ($request->filled('user_share')) {

                $new_user_share = $article->total_share + $request->user_share;
                $article->total_share = $new_user_share;
                $article->save();

                $article_link = "https://app.tvpfundhk.com/api/article/" . $request->article_id;
            }

            if ($request->filled('user_view')) {
                $new_user_share = $article->total_view + $request->user_view;
                $article->total_view = $new_user_share;
                $article->save();
            }

            if ($article_user1) {

                $article_user1 = ArticleUser::with('article', 'user')->where('id', $article_user1->id)->where('article_id', $request->article_id)->first();

                $article_user =  $article_user1;
            }



            if ($request->filled('user_share')) {
                $article_user = $article_link;
            }
        }

        if (!$article_user) {
            if ($update_article_user) {

                $article_user1 = ArticleUser::with('article', 'user')->where('id', $update_article_user)->first();

                $article_user =  $article_user1;
            }
        }

        return WebApiResponse::success(201, $article_user, 'Article log ');
    }

    /**
     * Display List User Article Log
     * @group User Article Log
     * @authenticated
     * @queryParam limit  integer  optional  per page limit   to Filter Example:10 .
     * @queryParam orderBy  String  optional  Order    to Filter Example:DESC .
     * @queryParam sortBy  String  optional  Order    to Filter  Example:id .
     * @return \Illuminate\Http\Response
     * @response 200
     * {"status":"Success","message":"messages.success_show_all","code":200,"data":{"current_page":1,"data":[{"id":34,"user_id":2,"article_id":1,"user_like":1,"user_bookmark":null,"created_at":"2021-05-06T11:00:53.000000Z","updated_at":"2021-05-07T09:08:01.000000Z","user":{"id":2,"username":"pennyyau88","email":"penny@gmail.com","profile_pic":"upload\/6080fd0fcdd1b_work_alamin_vai.png","sex":"Male","industry_id":1,"salary_range_id":1,"referral_code":null,"email_verified_at":null,"status":1,"created_at":"2021-04-22T04:35:27.000000Z","updated_at":"2021-04-22T04:35:27.000000Z","user_type":"admin"},"article":{"id":1,"user_id":1,"category_id":1,"title":"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum","total_like":1,"total_bookmark":0,"total_share":61,"total_view":9,"post_date":"2021-04-08","image_path":"public\/article\/ar_608fc9f6bded5fj6jNTpH9l.jpeg","status":1,"created_at":null,"updated_at":"2021-05-07T09:08:01.000000Z"}}],"first_page_url":"https:\/\/localhost\/dss_api\/api\/article-user-log\/list?page=1","from":1,"last_page":1,"last_page_url":"https:\/\/localhost\/dss_api\/api\/article-user-log\/list?page=1","links":[{"url":null,"label":"&laquo; Previous","active":false},{"url":"https:\/\/localhost\/dss_api\/api\/article-user-log\/list?page=1","label":1,"active":true},{"url":null,"label":"Next &raquo;","active":false}],"next_page_url":null,"path":"https:\/\/localhost\/dss_api\/api\/article-user-log\/list","per_page":10,"prev_page_url":null,"to":1,"total":1}}
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


        $user_id = Auth::user()->id;
        $query->where('user_id', $user_id);

        // if ($request->filled('category_id')) {
        //     $query->where('category_id',  $request->category_id);
        // }
        // if ($request->filled('title')) {
        //     $query->where('title', 'like', '%' . $request->title. '%');
        // }

        try {
            $article = $query->with('user', 'article')->orderBy($queryParams['sortBy'], $queryParams['orderBy'])->where($whereClause)->paginate($queryParams['limit'])->toArray();
            return WebApiResponse::success(200, $article, trans('messages.success_show_all'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }

    /**
     * Display List User Article Log
     * @group User article bookmark Log
     * @authenticated
     * @queryParam limit  integer  optional  per page limit   to Filter Example:10 .
     * @queryParam orderBy  String  optional  Order    to Filter Example:DESC .
     * @queryParam sortBy  String  optional  Order    to Filter  Example:id .
     * @return \Illuminate\Http\Response
     * @response 200
     * {"status":"Success","message":"messages.success_show_all","code":200,"data":{"current_page":1,"data":[{"id":34,"user_id":2,"article_id":1,"user_like":1,"user_bookmark":null,"created_at":"2021-05-06T11:00:53.000000Z","updated_at":"2021-05-07T09:08:01.000000Z","user":{"id":2,"username":"pennyyau88","email":"penny@gmail.com","profile_pic":"upload\/6080fd0fcdd1b_work_alamin_vai.png","sex":"Male","industry_id":1,"salary_range_id":1,"referral_code":null,"email_verified_at":null,"status":1,"created_at":"2021-04-22T04:35:27.000000Z","updated_at":"2021-04-22T04:35:27.000000Z","user_type":"admin"},"article":{"id":1,"user_id":1,"category_id":1,"title":"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum","total_like":1,"total_bookmark":0,"total_share":61,"total_view":9,"post_date":"2021-04-08","image_path":"public\/article\/ar_608fc9f6bded5fj6jNTpH9l.jpeg","status":1,"created_at":null,"updated_at":"2021-05-07T09:08:01.000000Z"}}],"first_page_url":"https:\/\/localhost\/dss_api\/api\/article-user-log\/list?page=1","from":1,"last_page":1,"last_page_url":"https:\/\/localhost\/dss_api\/api\/article-user-log\/list?page=1","links":[{"url":null,"label":"&laquo; Previous","active":false},{"url":"https:\/\/localhost\/dss_api\/api\/article-user-log\/list?page=1","label":1,"active":true},{"url":null,"label":"Next &raquo;","active":false}],"next_page_url":null,"path":"https:\/\/localhost\/dss_api\/api\/article-user-log\/list","per_page":10,"prev_page_url":null,"to":1,"total":1}}
     */

    public function book_mark_list(Request $request)
    {
        $queryParams = [
            'limit'         =>  $request->limit ?? 10,
            'sortBy'        =>  $request->sortBy ?? 'id',
            'orderBy'       =>  in_array($request->orderBy, ['ASC', 'DESC']) ? $request->orderBy : 'DESC',
        ];
        $whereClause = $request->whereClause ?? [];

        $query =  ArticleUser::query();


        $user_id = Auth::user()->id;
        $query->where('user_id', $user_id);



        try {
            $article = $query->with('user', 'article')->where($whereClause)->get();
            return WebApiResponse::success(200, $article, trans('messages.success_show_all'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }
}
