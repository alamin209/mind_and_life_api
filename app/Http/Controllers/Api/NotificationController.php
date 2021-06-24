<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Libraries\WebApiResponse;
use Illuminate\Support\Facades\Auth;
class NotificationController extends Controller
{
    /**
     * Display List User Notification Log
     * @group  Notification
     * @authenticated
     * @queryParam limit  integer  optional  per page limit   to Filter Example:10 .
     * @queryParam orderBy  String  optional  Order    to Filter Example:DESC .
     * @queryParam sortBy  String  optional  Order    to Filter  Example:id .
     * @return \Illuminate\Http\Response
     * @response 200
     * {"status":"Success","message":"messages.success_show_all","code":200,"data":{"current_page":1,"data":[{"id":8,"user_id":2,"title":"you should follow the rules","body":"thank you for follweing the rule","is_read":0,"status":1,"created_at":"2021-06-22T21:29:51.000000Z","updated_at":null,"user":{"id":2,"username":"admin","phone":null,"name":null,"occupation_id":null,"email":"penny@gmail.com","profile_pic":null,"sex":"Male","industry_id":0,"salary_range_id":1,"referral_code":null,"email_verified_at":null,"status":1,"created_at":"2021-04-22T04:35:27.000000Z","updated_at":"2021-04-22T04:35:27.000000Z","user_type":"admin","is_api":0}}],"first_page_url":"http:\/\/localhost\/dss_api\/api\/use-notifications\/list?page=1","from":1,"last_page":1,"last_page_url":"http:\/\/localhost\/dss_api\/api\/use-notifications\/list?page=1","links":[{"url":null,"label":"&laquo; Previous","active":false},{"url":"http:\/\/localhost\/dss_api\/api\/use-notifications\/list?page=1","label":1,"active":true},{"url":null,"label":"Next &raquo;","active":false}],"next_page_url":null,"path":"http:\/\/localhost\/dss_api\/api\/use-notifications\/list","per_page":10,"prev_page_url":null,"to":1,"total":1}}
     */

    public function list(Request $request)
    {
        $queryParams = [
            'limit'         =>  $request->limit ?? 10,
            'sortBy'        =>  $request->sortBy ?? 'id',
            'orderBy'       =>  in_array($request->orderBy, ['ASC', 'DESC']) ? $request->orderBy : 'DESC',
        ];
        $whereClause = $request->whereClause ?? [];

        $query =  Notification::query();

        $user_id = Auth::user()->id ;
        $query->where('user_id' ,$user_id);
        try {
            $notification = $query->with('user')->orderBy($queryParams['sortBy'], $queryParams['orderBy'])->where($whereClause)->paginate($queryParams['limit'])->toArray();
            return WebApiResponse::success(200, $notification, trans('messages.success_show_all'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }


    /**
     * Create  User Notification read status
     * @group  Notification
     * @authenticated
     * @param  \Illuminate\Http\Request  $request
     * @bodyParam user_id  Integer required User Id. Example: 1
     * @bodyParam is_read  Integer required Coupon Id. Example: 1
     * @return \Illuminate\Http\Response
     * @response 200 {"status":"Success","message":"Notification update","code":201,"data":{"id":8,"user_id":2,"title":"you should follow the rules","body":"thank you for follweing the rule","is_read":"1","status":1,"created_at":"2021-06-22T21:29:51.000000Z","updated_at":"2021-06-22T22:21:59.000000Z"}}
     */



    public function update(Request $request, $id)
    {

        $notification_check= Notification::where("id",$id)->where('user_id',$request->user_id)->first();

        if($notification_check){

            $notification_check->is_read =$request->is_read;
            $notification_check->save();

            return WebApiResponse::success(201, $notification_check, 'Notification update');

        }else{

            return WebApiResponse::error(404, $errors = [], 'No nonfiction founds');
        }

    }

}
