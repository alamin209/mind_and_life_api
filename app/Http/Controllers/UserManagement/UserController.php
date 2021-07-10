<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Resources\Users\User as UserResource;
use App\Http\Resources\Users\UserCollection;
use App\Libraries\WebApiResponse;
use App\Models\Reports;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Passport;

class UserController extends Controller
{
    /**
     * User List.
     * @group User Management
     * @authenticated
     * @param Request $request
     * @queryParam limit integer optional Data Per Page Limit. Example : 10
     *
     * @return \Illuminate\Http\Response
     * @return Response
     * {"status":"Success","message":"User Created","code":201,"data":{"id":14,"username":"penn2yyau88","email":"penn1y2@gmail.com","sex":"Male","industry_id":"1","salary_range_id":"1","referral_code":"1","profile_pic":"upload\/606ea8ffe16d4_images.jpg","created_at":"2021-04-08T06:55:59.000000Z","updated_at":"2021-04-08T06:55:59.000000Z"}}
     */
    public function index(Request $request)
    {
        $limit = $request->limit ?? 10;
        try {
            $users = User::paginate($limit);
            return new UserCollection($users);
        } catch (\Throwable $th) {
             $errors = $th->getMessage();
             return WebApiResponse::error(500, [$errors], 'Something Went Wrong');
        }
    }

    /**
     * Create New User
     * @group User Management
     * @authenticated
     * @param  \Illuminate\Http\Request  $request
     * @bodyParam username string required User Name. Example: pennyyau88
     * @bodyParam email string required User Email. Example: penny@gmail.com
     * @bodyParam sex string required User sex.(There will be Male,Female two option will be available ) Example: Male
     * @bodyParam password string required User Password. Example: 12345678
     * @bodyParam password_confirmation string required User Password Confirmation. Example: 12345678
     * @bodyParam industry_id integer required User industry id. Example: 1
     * @bodyParam salary_range_id integer required User industry id. Example: 1
     * @bodyParam referral_code integer optional  User referral_code. Example: 1
     * @bodyParam profile_pic string/file optional User profile picture. Example: profile.png
     * @return \Illuminate\Http\Response
     * @response 200 {"status":"Success","message":"User Created","code":201,"data":{"id":1,"username":"alamin","email":"alamin@gmail.com","sex":"Male","industry_id":"1","salary_range_id":"1","referral_code":"2023","access_token":{"access_token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZjRmMDFiZTkzMmMzYTRjZmZkODEzYTdlYjUyNTVmYWY4NDZhODFkY2M0YjM2M2YwOWY4YjBjNGYyNDhlM2M0YzAxZWE5MjIyOTI5YmNiMzUiLCJpYXQiOiIxNjE4MjYwNjU2LjgxMDg4MiIsIm5iZiI6IjE2MTgyNjA2NTYuODEwODg1IiwiZXhwIjoiMTYxODM0NzA1Ni42NTg2MTQiLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.j7M_KXyMJMIK2yRgVNSMggUZVIOjF3XU6MVqzisKrixDBTMapQpWkW0L5VQZF20MRjKjgjBfYVxQJyMrbSA-fRPZWm3NhtUaYhGEH_rBEFLV5TDnBH2aZ8uaFt4Vud4fIplyqKKzLkASUzNK-OJSTE9qR0tIRSt08AwuOTGxmdp4e5kSDZdYp0nwSag00khOeJeamCbAmM514Xtv7qtYVzS2kUvUsH3bVNqJA0fvuD0Yx3Jc6kFY8EIdVKzNfiIT44RG0DUIh7lxGKEF9SAd-hn5IB30WaxPB6XgvNtLuNRKidsQEN7FcZA-dOy14v74D1W78z7ZNq4CInLndWOcuBwXQvwNtNGK2dSHtrnZpy__V7X25BdUUQd8EN1oz-YF0B_HilO_kSbElYaA0jg-XMXQLCnHH59B1t7Yl49O2i3F8I9rqWxN4--KGvhzzQSFj_zXySqwXx6gg4TIpASm3ciFkQnhq6fOjsTmsp-4dwBK7W88Ey6JGmwPeTyPi5vucwBTG11xB0pNo4MCQ-G5Yx-5ApKy_FeY1hg2csBLOZR2Z6vXJvQ8id1XksbQwTJWOjlFskmbt_cqnLnvkCq6ZBiH-N2igCsSKQvS-JHI6Sl7Co-FnNpIbURnrKBX8WNsncHQ2-CSHw4PLsKo61zEZdoEVZURZSACNJXeqvbqGJU","token_type":"Bearer","expires_at":"2021-04-13 20:50:56"},"profile_pic":"public\/upload\/6074b2b0be1a4_1611049331368.JPEG","created_at":"2021-04-12T20:50:56.000000Z","updated_at":"2021-04-12T20:50:56.000000Z"}}
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'          => 'required|string|unique:users,username',
            'email'             => 'required|email|unique:users,email',
             'sex'              =>'required',
            'industry_id'       => 'required|integer',
            'salary_range_id'   => 'required|integer',
            'password'          => 'required|confirmed|min:8,max:16',
            'profile_pic'       => 'required| mimes:jpeg,png,jpg,gif,JPEG |max:1024',
            'referral_code'     =>'string| nullable'

        ]);

        if($validator->fails()){
            return WebApiResponse::validationError($validator, $request);
        }
        $userObj = new User();

        $userObj->username               = $request->username;
        $userObj->email                  = $request->email;
        $userObj->sex                    = $request->sex;
        $userObj->industry_id            = $request->industry_id;
        $userObj->salary_range_id        = $request->salary_range_id;
        $userObj->referral_code          = $request->referral_code;
        $userObj->password               = bcrypt($request->password);
        $userObj->user_type              =  0;
        $userObj->is_api                 =  0;
        $userObj->occupation_id          = null;

        $user = $userObj->save();

        $profile_uploaded_path ='';
        if($user){
            if($request->hasFile('profile_pic')){
                $uploadFolder = 'upload';
                $profile_pic = $request->file('profile_pic');
                $fileName = uniqid().'_'.str_replace(' ', '_', $profile_pic->getClientOriginalName());
                $profile_uploaded_path = $profile_pic->storeAs($uploadFolder, $fileName, 'public');

                $user = User::find($userObj->id);
                $user->profile_pic = $profile_uploaded_path;
                $user->save();

            }
        }
        $userObj->status = 1;
        $userObj->profile_pic = 'public/'.$profile_uploaded_path;


        $personalAccessToken=  $user->createToken('Personal Access Token');

        $tokenData = [
            'access_token'  => $personalAccessToken->accessToken,
            'token_type'    => 'Bearer',
            'expires_at'    => Carbon::parse($personalAccessToken->token->expires_at)->toDateTimeString()
        ];


        $userObj->access_token =  $tokenData;
        $userData = new UserResource($userObj);


        return WebApiResponse::success(201,  $userData, 'User Created');

    }




    /**
     * Display the specified user.
     * @group User Management
     * @authenticated
     * @param  Request $request
     * @urlParam user int required User ID. Example : 5
     * @return \Illuminate\Http\Response
     * @response 200 {"status":"Success","message":"User Data","code":200,"data":{"id":12,"name":"pennyyau88","email":"pennyyau88@gmail.com","phone":"01849699001","address":"20, Nur Graden City","country":"Bangladesh","country_id":15,"state":null,"state_id":0,"zip":"1230","created_at":"2021-01-26T17:47:52.000000Z","updated_at":"2021-01-26T17:47:52.000000Z"}}
     */
    public function show(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $userData = new UserResource($user);
            return WebApiResponse::success(200, $userData, 'User Data');
        } catch (\Throwable $th) {
            $errors = $th->getMessage();
            return WebApiResponse::error(500, [$errors], 'Something Went Wrong');
        }
    }

    /**
     * Update User
     * @group User Management
     * @authenticated
     * @param  \Illuminate\Http\Request  $request
     * @urlParam user int required User id. Example: 5
     * @bodyParam username string required User Name. Example: pennyyau88
     * @bodyParam email string required User Email. Example: penny@gmail.com
     * @bodyParam sex string required User sex.(There will be Male,Female two option will be available ) Example: Male
     * @bodyParam password string required User Password. Example: 12345678
     * @bodyParam password_confirmation string required User Password Confirmation. Example: 12345678
     * @bodyParam industry_id integer required User industry id. Example: 1
     * @bodyParam salary_range_id integer required User industry id. Example: 1
     * @bodyParam referral_code integer optional  User referral_code. Example: 1
     * @bodyParam profile_pic string/file optional User profile picture. Example: profile.png
     * @return \Illuminate\Http\Response
     * @response 200 {"status":"Success","message":"User Updated","code":201,"data":{"id":12,"name":"pennyyau88","email":"pennyyau88@gmail.com","phone":"01849699001","address":"20, Nur Graden City","country":"Bangladesh","country_id":15,"state":null,"state_id":0,"zip":120,"created_at":"2021-01-26T17:47:52.000000Z","updated_at":"2021-01-26T17:49:57.000000Z"}}
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [

            'email'            => 'required|email|unique:users,email,'.$id,
            'username'         => 'required|string|unique:users,username,'.$id,
             'sex'             =>'required',
            'industry_id'      => 'required|integer',
            'salary_range_id'  => 'required|integer',
            'password'         => 'required|confirmed|min:8,max:16',
           // 'profile_pic'      => 'required| mimes:jpeg,png,jpg,gif |max:1024',
            'referral_code'    =>'string| nullable'
        ]);

        if($validator->fails()){
            return WebApiResponse::validationError($validator, $request);
        }
        $userObj = new User();

        $user   = $userObj->findOrFail($id);


        $userObj->username               = $request->username;
        $userObj->email                  = $request->email;
        $userObj->sex                    = $request->sex;
        $userObj->industry_id            = $request->industry_id;
        $userObj->salary_range_id        = $request->salary_range_id;
        $userObj->referral_code          = $request->referral_code;
        $userObj->password               = bcrypt($request->password);
        $userObj->is_api                 = 0;
        $userObj->occupation_id          = null;

        if($request->filled('password')){
            $user->password     = bcrypt($request->password);
        }
        $user->save();

        if($request->hasFile('profile_pic') != ''){

            $user = User::find($user);


            $uploadFolder = 'upload';
            $profile_pic = $request->file('profile_pic');
            $fileName = uniqid().'_'.str_replace(' ', '_', $profile_pic->getClientOriginalName());
            $profile_uploaded_path = $profile_pic->storeAs($uploadFolder, $fileName, 'public');
            $user->profile_pic = $profile_uploaded_path;
            $user->save();

        }

        $userData = new UserResource($user);
        return WebApiResponse::success(201, $userData, 'User Updated');
    }





    /**
     * Create New Occupation Store
     * @group  User Occupation
     * @bodyParam user_id  Integer required User Id. Example: 1
     * @bodyParam occupation_id  Integer required industry means occupation   Id. Example: 1
     * @return \Illuminate\Http\Response
     * @response 200
     *{"status":"Success","message":"messages.success_created","code":200,"data":{"user_id":"1","categories":[1,2,3],"updated_at":"2021-06-04T10:49:52.000000Z","created_at":"2021-06-04T10:49:52.000000Z","id":4}}
     */

    public function user_occupation(Request $request)
    {



        $validator = Validator::make($request->all(), [
            'user_id'               =>    'required|integer',
            'occupation_id'         =>    'required|integer',

        ]);
        if ($validator->fails()) {
            return WebApiResponse::validationError($validator, $request);
        }
        try {

            $user = User::find($request->user_id);
            $user->occupation_id = $request->occupation_id;
            $user->save();

            return WebApiResponse::success(200, $user->toArray(), trans('messages.success_created'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [$th->getMessage()],  trans('messages.success_created_faild'));
        }
    }
    /**
     * Remove the specified User.
     * @group User Management
     * @authenticated
     *
     * @urlParam user int required User ID. Example : 5
     * @return \Illuminate\Http\Response
     *
     * @response 200 {"status":"Success","message":"User Deleted","code":200,"data":[]}
     */
    // public function destroy($id)
    // {
    //     $user = User::findOrFail($id);

    //     $user->linkedSocialAccounts->delete();

    //     try {
    //         $user->delete();
    //         return WebApiResponse::success(200, [], 'User Deleted');
    //     } catch (\Throwable $th) {
    //         $errors = $th->getMessage();
    //         return WebApiResponse::error(500, [$errors], 'Something Went Wrong');
    //     }
    // }
}
