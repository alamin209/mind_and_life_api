<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserCouponRelation;
use App\Models\Coupon;
use App\Libraries\WebApiResponse;
use \Carbon\Carbon;

class CouponUserlogController extends Controller
{


   /**
     * Display List User view or download history  Log
     * @group Coupon
     * @authenticated
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



    /**
     * Create New User Coupon Log
     * @group  Coupon
     * @authenticated
     * @param  \Illuminate\Http\Request  $request
     * @bodyParam user_id  Integer required User Id. Example: 1
     * @bodyParam coupon_id  Integer required Coupon Id. Example: 1
     * @bodyParam is_download  Integer  optional  The Coupon that download by the user. Example: 1
     * @bodyParam is_shared   Integer  optional  The Coupon that shared by  the user. Example: 1
     * @bodyParam is_redeemed  Integer optional  The Coupon that  redeemed  by the user. Example: 1
     * @bodyParam is_view   Integer required  The Coupon that view by the user. Example: 1
     * @return \Illuminate\Http\Response
     * @response 200 {"status":"Success","message":"Coupon log ","code":201,"data":{"id":1,"user_id":2,"coupon_id":1,"is_download":1,"is_redeemed":1,"is_view":1,"is_shared":null,"created_at":"2021-06-08T19:20:49.000000Z","updated_at":"2021-06-08T19:24:58.000000Z","coupon":{"id":1,"category_id":1,"heading":"special iteam","image_path":"public\/coupon\/ar_60bc330bcf9040gDqy2sYjI.png","description":"<p>free food<\/p>","offer_brand":"foor","expire_date":"2021-07-08","download_limit":20,"total_download":1,"total_redeemed":null,"price":250,"total_shared":0,"total_view":1,"status":1,"term_condition":"<p><br><\/p>","created_at":"2021-06-06T02:29:31.000000Z","updated_at":"2021-06-08T19:24:58.000000Z"},"user":{"id":2,"username":"pennyyau88","phone":null,"name":null,"occupation_id":null,"email":"penny@gmail.com","profile_pic":null,"sex":"Male","industry_id":0,"salary_range_id":1,"referral_code":null,"email_verified_at":null,"status":1,"created_at":"2021-04-22T04:35:27.000000Z","updated_at":"2021-04-22T04:35:27.000000Z","user_type":"admin","is_api":0}}}
     */

    public function store(Request $request)
    {

        $data = $request->validate([
            'user_id'           => 'required|integer',
            'coupon_id'         => 'required|integer',
            'is_download'       => 'nullable | integer',
            'is_shared'         => 'nullable | integer',
            'is_redeemed'       => 'nullable | integer',
            'is_view'           => 'nullable | integer',
        ]);


        $coupon_user = UserCouponRelation::with('coupon', 'user')
            ->where('user_id', $request->user_id)
            ->where('coupon_id', $request->coupon_id)
            ->first();

        $coupon = Coupon::find($request->coupon_id);

        if ($coupon->total_download > $coupon->download_limit) {

            return WebApiResponse::error(404, $errors = [], 'downloaded limit cross ');
        }
        $coupon_user1 = '';
        $update_coupon_user = 0;


        if (date('Y-m-d',strtotime($coupon->expire_date)) <= date('Y-m-d')) {

            return WebApiResponse::error(404, $errors = [], 'Coupon date has been Expired');
        }

        if (!$coupon_user) {

            $new_total_download           = $coupon->total_download + $request->is_download;
            $total_view                   = $coupon->total_view + $request->is_view;
            $total_shared                 = $coupon->total_shared + $request->is_shared;

            $coupon->total_download        = $new_total_download;
            $coupon->total_view            =  $total_view;
            $coupon->total_shared          =  $total_shared;
            $coupon->save();


            $new_coupon_user                = new UserCouponRelation();
            $new_coupon_user->user_id       = $request->user_id;
            $new_coupon_user->coupon_id     = $request->coupon_id;
            $new_coupon_user->is_download   = $request->is_download;
            $new_coupon_user->is_shared     = $request->is_shared;
            $new_coupon_user->is_view       = $request->is_view;
            $new_coupon_user->save();

            $update_coupon_user  = $new_coupon_user->id;
        }


        if ($request->filled('is_redeemed')) {

            if ($coupon_user->is_redeemed  == 1) {

                return WebApiResponse::error(404, $errors = [], 'You already use this coupon');
            }
        }



        if (isset($coupon_user)) {



            if ($request->filled('is_redeemed')) {

                    if ($coupon_user->is_redeemed  == null) {

                        $coupon_user1                  = UserCouponRelation::with('coupon', 'user')->where('user_id', $request->user_id)->where('coupon_id', $request->coupon_id)->first();
                        $coupon1                       = Coupon::find($request->coupon_id);
                        $coupon_user1->is_redeemed     = $request->is_redeemed;
                        $coupon_user1->save();


                        $new_total_redeemed              = $coupon1->total_redeemed + $request->is_redeemed;
                        $coupon1->total_redeemed         =  $new_total_redeemed;
                        $coupon1->save();
                    }

            }

            if ($request->filled('is_shared')) {

                $coupon_user1              = UserCouponRelation::with('coupon', 'user')->where('user_id', $request->user_id)->where('coupon_id', $request->coupon_id)->first();
                $coupon1                    = Coupon::find($request->coupon_id);

                $new_user_share             = $coupon_user->total_share + $request->is_shared;
                $coupon->total_share        = $new_user_share;
                $coupon->save();

                $coupon_user1->is_shared     =  $request->is_shared;
                $coupon_user1->save();

                $coupon_link = "https://app.tvpfundhk.com/api/coupon/".$request->coupon_id;
            }

            if ($request->filled('is_view')) {

                $coupon_user1            = UserCouponRelation::with('coupon', 'user')
                    ->where('user_id', $request->user_id)
                    ->where('coupon_id', $request->coupon_id)
                    ->first();

                $coupon1                   = Coupon::find($request->coupon_id);


                $new_total_view             = $coupon_user->total + $request->is_view;
                $coupon->total_view         = $new_total_view;
                $coupon->save();

                $coupon_user1->is_view      =  $request->is_view;
                $coupon_user1->save();
            }
            if ($request->filled('is_download')) {

                $coupon_user1            = UserCouponRelation::with('coupon', 'user')
                    ->where('user_id', $request->user_id)
                    ->where('coupon_id', $request->coupon_id)
                    ->first();

                $coupon1                   = Coupon::find($request->coupon_id);


                $new_total_download             = $coupon_user->total + $request->is_download;
                $coupon->total_download         = $new_total_download;
                $coupon->save();

                $coupon_user1->is_download    =  $request->is_download;
                $coupon_user1->save();
            }


            if ($coupon_user1) {

                $coupon_user1 = UserCouponRelation::with('coupon', 'user')->where('id', $coupon_user1->id)->where('coupon_id', $request->coupon_id)->first();

                $coupon_user =  $coupon_user1;
            }


        }

            if ($request->filled('is_shared')) {
                $coupon_user = $coupon_link;
            }


        if (!$coupon_user1) {
            if ($update_coupon_user) {

                $coupon_user1 = UserCouponRelation::with('coupon', 'user')
                ->where('id', $update_coupon_user)->first();

                $coupon_user =  $coupon_user1;
            }
        }

        return WebApiResponse::success(201, $coupon_user, 'Coupon log ');
    }


   /**
     * Remove the specified User Coupon.
     * @group Coupon
     * @authenticated
     * @urlParam user int required User ID. Example : 5
     * @return \Illuminate\Http\Response
     *
     * @response 200 {"status":"Success","message":"User Deleted","code":200,"data":[]}
     */
    public function destroy($id)
    {
        $user = UserCouponRelation::findOrFail($id);


        try {
            $user->delete();
            return WebApiResponse::success(200, [], 'Coupon  Deleted');
        } catch (\Throwable $th) {
            $errors = $th->getMessage();
            return WebApiResponse::error(500, [$errors], 'Something Went Wrong');
        }
    }
}
