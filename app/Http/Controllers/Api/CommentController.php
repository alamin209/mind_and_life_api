<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\WebApiResponse;
use App\Models\Com
class CommentController extends Controller
{
    /**
     * Display List Comments Of Article
     * @group Article
     * @queryParam limit  integer  optional  per page limit   to Filter Example:10 .
     * @queryParam orderBy  String  optional  Order    to Filter Example:DESC .
     * @queryParam sortBy  String  optional  Order    to Filter  Example:id .
     * @bodyParam  is_view  integer   require there is tw type :show the view  Example: 1.
     * @bodyParam is_download  integer   require there is tw type :show the view  Example: 1.
     * @bodyParam user_id  Integer required User Id. Example: 1
     * @return \Illuminate\Http\Response
     * @response 200
     * {"status":"Success","message":"messages.success_show_all","code":200,"data":{"current_page":1,"data":[{"id":2,"user_id":2,"coupon_id":2,"is_download":1,"is_redeemed":0,"is_view":1,"is_shared":null,"created_at":"2021-06-09T02:29:54.000000Z","updated_at":"2021-06-09T02:29:54.000000Z","coupon":{"id":2,"category_id":2,"heading":"test coupon heading","image_path":"public\/coupon\/ar_60bc334712cc8cUixhWEnoG.png","description":"<p>free food<\/p>","offer_brand":"rich brand","expire_date":"2021-07-01","download_limit":200,"total_download":1,"total_redeemed":null,"price":250,"total_shared":0,"total_view":1,"status":1,"term_condition":"free food","created_at":"2021-06-06T02:30:31.000000Z","updated_at":"2021-06-09T02:29:54.000000Z"},"user":{"id":2,"username":"pennyyau88","phone":null,"name":null,"occupation_id":null,"email":"penny@gmail.com","profile_pic":null,"sex":"Male","industry_id":0,"salary_range_id":1,"referral_code":null,"email_verified_at":null,"status":1,"created_at":"2021-04-22T04:35:27.000000Z","updated_at":"2021-04-22T04:35:27.000000Z","user_type":"admin","is_api":0}},{"id":1,"user_id":2,"coupon_id":1,"is_download":1,"is_redeemed":1,"is_view":1,"is_shared":null,"created_at":"2021-06-08T19:20:49.000000Z","updated_at":"2021-06-08T19:24:58.000000Z","coupon":{"id":1,"category_id":1,"heading":"special iteam","image_path":"public\/coupon\/ar_60bc330bcf9040gDqy2sYjI.png","description":"<p>free food<\/p>","offer_brand":"foor","expire_date":"2021-07-08","download_limit":20,"total_download":1,"total_redeemed":null,"price":250,"total_shared":0,"total_view":1,"status":1,"term_condition":"<p><br><\/p>","created_at":"2021-06-06T02:29:31.000000Z","updated_at":"2021-06-08T19:24:58.000000Z"},"user":{"id":2,"username":"pennyyau88","phone":null,"name":null,"occupation_id":null,"email":"penny@gmail.com","profile_pic":null,"sex":"Male","industry_id":0,"salary_range_id":1,"referral_code":null,"email_verified_at":null,"status":1,"created_at":"2021-04-22T04:35:27.000000Z","updated_at":"2021-04-22T04:35:27.000000Z","user_type":"admin","is_api":0}}],"first_page_url":"http:\/\/localhost\/dss_api\/api\/coupon-user-log?page=1","from":1,"last_page":1,"last_page_url":"http:\/\/localhost\/dss_api\/api\/coupon-user-log?page=1","links":[{"url":null,"label":"&laquo; Previous","active":false},{"url":"http:\/\/localhost\/dss_api\/api\/coupon-user-log?page=1","label":1,"active":true},{"url":null,"label":"Next &raquo;","active":false}],"next_page_url":null,"path":"http:\/\/localhost\/dss_api\/api\/coupon-user-log","per_page":10,"prev_page_url":null,"to":2,"total":2}}
     */

    public function index(Request $request){



        try {
            $queryParams = [
                'limit'         =>  $request->limit ?? 10,
                'sortBy'        =>  $request->sortBy ?? 'id',
                'orderBy'       =>  in_array($request->orderBy, ['ASC', 'DESC']) ? $request->orderBy : 'DESC',
            ];
            $whereClause = $request->whereClause ?? [];

            if ($request->filled('is_view')) {
                if($request->is_view == 1){
                    $usercouponlist = UserCouponRelation::query()
                    ->where('is_view',1)
                    ->where('user_id',$request->user_id)
                    ->where('is_view', 'LIKE', "%{$request->type}%")
                    ->with('coupon', 'user')
                    ->orderBy($queryParams['sortBy'], $queryParams['orderBy'])
                    ->where($whereClause)
                    ->paginate($queryParams['limit'])
                    ->toArray();
                }
            }
            if ($request->filled('is_download')) {
                if($request->is_download == '1'){
                    $usercouponlist = UserCouponRelation::query()
                    ->where('is_download',1)
                    ->where('user_id',$request->user_id)
                    ->with('coupon', 'user')
                    ->orderBy($queryParams['sortBy'], $queryParams['orderBy'])
                    ->where($whereClause)
                    ->paginate($queryParams['limit'])
                    ->toArray();

                }
            }

         return WebApiResponse::success(200, $usercouponlist, trans('messages.success_show_all'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.failed_show_all'));
        }

    }



    public function store(Request $request)
    {


    }



    public function destroy($id)
    {
        //
    }
}
