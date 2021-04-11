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


class UserController extends Controller
{
    /**
     * User List.
     * @group User Management
     * @authenticated
     *
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
     * @response 200 {"status":"Success","message":"User Data","code":200,"data":{"id":14,"username":"penn2yyau88","email":"penn1y2@gmail.com","sex":"Male","industry_id":1,"salary_range_id":1,"referral_code":"1","profile_pic":"upload\/606ea8ffe16d4_images.jpg","created_at":"2021-04-08T06:55:59.000000Z","updated_at":"2021-04-08T06:55:59.000000Z"}}
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
        $userObj->profile_pic = 'public/storage/'.$profile_uploaded_path;

        $userData = new UserResource($userObj);
        return WebApiResponse::success(201, $userData, 'User Created');

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
            'username'         => 'required|string|unique:users,username'.$id,
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
     * Remove the specified User.
     * @group User Management
     * @authenticated
     *
     * @urlParam user int required User ID. Example : 5
     * @return \Illuminate\Http\Response
     *
     * @response 200 {"status":"Success","message":"User Deleted","code":200,"data":[]}
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        try {
            $user->delete();
            return WebApiResponse::success(200, [], 'User Deleted');
        } catch (\Throwable $th) {
            $errors = $th->getMessage();
            return WebApiResponse::error(500, [$errors], 'Something Went Wrong');
        }
    }
}
