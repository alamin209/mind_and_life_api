<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Users\User as UserResource;
use App\Libraries\WebApiResponse;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Passport;
use Validator;
use App\Rules\MatchOldPassword;
use DB;
class AuthController extends Controller
{
    /**
     * Login User and Create Token
     * @group Authentication
     * @param  Request $request
     * @bodyParam email string required User Email. Example: penny@gmail.com
     * @bodyParam password string required User Password. Example: 12345678
     * @return Response
     * @response 200 {"status":"Success","message":"Login Success","code":200,"data":{"id":2,"username":"alamin12","email":"alamin20192019@gmail.com","sex":"Male","status":1,"industry_id":1,"salary_range_id":1,"referral_code":"2023","access_token":{"access_token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNDg1Y2YzYTlkZGE0MDI4ODRmMDA4OTJhZDkyZDRmZmNiMjI0ZmFjNWVjOWQ0M2ZmZGNjMWQ5NWU3MGVkZGFkMzhjYzVjNDU0ODBiZmY3ZDUiLCJpYXQiOiIxNjE4NTA0MjIzLjI1ODk4NCIsIm5iZiI6IjE2MTg1MDQyMjMuMjU4OTg3IiwiZXhwIjoiMTYxODU5MDYyMy4xMTg5MDkiLCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.heiHePCYpVEsHsq8m-B1HgX_TVvecXDGGQdPaOIHA0Rbn98pFUIg7v73tk93IF1IxIp5VGMFDzpAlenHhdqI5sIpW5iuXxcLSa_XmtqCzxHOg_5C8m5KehW--tbnDtrKmE2G2563M52hX9TscqIYt17joQndpAi3pWCs4dklea5mls1UoXg8zPDkp5DkZ_tuORXCsXpldPVXw0JjuOuGmL0D5yfMg3Xufw-KdYX-Ip0GsgU2eT2xf7sjDQcAtba2I_4kNZbgr56ta2RmNxvDIg0spfhoRktQgEsnREesezpv8hyy_SiMHfChmAucyAqTh7TOoFjUZ2BzAqPRBuyw-nLUBogRPE2Y1S9OQg0Od1-Aqgi4F4EFSrklJHrCB5koOLgqoURt_RySo2SweEjIHdudMRSQhtXCRVeBBimxeH_9zIRH_T684hmluNCCIlZeYTxgRBBkFg65i9i1GUSjLpkciUu0txlpPevsOou68A_MWwWByGifq8o4GuY1NVY1FgMYkYMuGraGduUtsmaCBhVZlTX1-tPfuTR1k3XjM7RGMTp8C-8UTqwzruLDu20cwJXsQ4Of6Jp970Rl6FI-9CzqWhlx5GIxrvcFufkV2ntAApBllt4fBVKBKkaaJCCgLo6MrTRuKGU5aI1Lzcz1hkFWHw0JjMDN3jOS5cmD9OM","token_type":"Bearer","expires_at":"2021-04-16 16:30:23"},"profile_pic":"public\/upload\/60785f80cb084_1611049331368.JPEG","created_at":"2021-04-15T15:45:04.000000Z","updated_at":"2021-04-15T15:45:04.000000Z"}}
     */
    public function login(Request $request){
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'email'     => 'required',
            'password'  => 'required'
        ]);

        if($validator->fails()){
            return WebApiResponse::validationError($validator, $request);
        }

        $user = User::where('email', $request->email)->orWhere('username',$request->email)->first();




        if(!$user){
            $errors = [
                [
                    'field'     => '',
                    'value'     => '',
                    'message'   => ['User Not Found']
                ]
            ];

            return WebApiResponse::error(400, $errors, 'User Not Found');
        }




        if(!empty($user) && $user->status==0){
            // return "if";
             $errors = [
                 ['field' => '',
                 'value' => '',
                 'message' => ['Account Has Been deductive']
                 ]
             ];

             return WebApiResponse::error(400, $errors , 'Account Has Been deductive');
         }




        if(filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $user = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        }else{
            $user = Auth::attempt(['username' => $request->email, 'password' => $request->password]);
        }


        if(!$user){
            $errors = [
                [
                    'field'     => '',
                    'value'     => '',
                    'message'   => ['Wrong Credentials']
                ]
            ];

            return WebApiResponse::error(400, $errors, 'Login Failed');
        }

        $userObj = User::where('email', $request->email)->orWhere('username',$request->email)->first();

        $userObj->username               = $userObj->username;
        $userObj->email                  = $userObj->email;
        $userObj->sex                    = $userObj->sex;
        $userObj->industry_id            = $userObj->industry_id;
        $userObj->salary_range_id        = $userObj->salary_range_id;
        $userObj->referral_code          = $userObj->referral_code;
        $userObj->status                 =  $userObj->status;
        $userObj->email_verified_at      =  $userObj->email_verified_at;

        $userObj->profile_pic = 'public/'. $userObj->profile_pic;
        $personalAccessToken=  $userObj->createToken('Personal Access Token');

        $tokenData = [

            'access_token'  => $personalAccessToken->accessToken,
            'token_type'    => 'Bearer',
            'expires_at'    => Carbon::parse($personalAccessToken->token->expires_at)->toDateTimeString()
        ];

        $userObj->access_token =  $tokenData;
        $userData = new UserResource($userObj);
        return WebApiResponse::success(200, $userData, 'Login Success');
    }

    /**
     * Logout User and Revoke Token
     * @authenticated
     * @group Authentication
     * @return \Illuminate\Http\Response
     * @response 200  {"status":"success","message":"Logout Success","code":200,"data":[]}
     */

    public function logOut(){
        Auth::user()->token()->revoke();
        return WebApiResponse::success(200, [], 'Logout Success');
    }

    /**
     * Get Authenticated User Data
     * @group Authentication
     * @authenticated
     * @param  \Illuminate\Http\Request  $request
     * @response 200  {"status":"Success","message":"User Data","code":200,"data":{"id":1,"username":"pennyyau88","email":"penny@gmail.com","sex":"Male","industry_id":1,"salary_range_id":1,"referral_code":null,"profile_pic":"upload\/606ea7dba3d82_images.jpg","created_at":"2021-04-08T04:55:13.000000Z","updated_at":"2021-04-08T06:51:07.000000Z"}}
     */

    public function user(Request $request){
        $user = $request->user();
        $userData = new UserResource($user);
        return WebApiResponse::success(200, $userData, 'User Data');

    }

    private function getAsanaAccessToken(){
        if(request()->remember_me === 'true'){
            Passport::personalAccessTokensExpireIn(now()->addDays(15));
        }

        return Auth::user()->createToken('Personal Access Token');
    }




  /**
     * Change Password
     * @group Password Change
     * @authenticated
     * @param  \Illuminate\Http\Request  $request
     * @bodyParam  current_password string required User Current Password. Example: 12345678
     * @bodyParam  password string required new password. Example: 12345678
     * @bodyParam  confirm_password string required new password confirmation. Example: 12345678
     * @response 200  {"status":"success","message":"Password Changed","code":200,"data":[]}
     */




    public function changePassword(Request $request)
    {
        $customMessages = [];


            $customMessages = [
                'current_password.required'  => 'Enter Current Password.',
                'password.required'          =>  'Enter New Password.',
                'password.min'               =>  'The password must be at least 8 characters.',
                'password.max'               =>  'The password may not be greater than 16 characters.',
                'confirm_password.required'  =>  'Enter Confirm Password.',
                'confirm_password.same'      =>  'Enter Confirm Password Correctly.',
            ];


        $validator = Validator::make($request->all(), [
            'current_password'   => ['required', new MatchOldPassword],
            'password'           => 'string|required|min:8|max:14',
            'confirm_password'   => 'required|same:password',
        ],$customMessages);

        if ($validator->fails()) {
            return WebApiResponse::validationError($validator, $request);
        }

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password)]);

        return WebApiResponse::success(200, $data = [], trans('auth.password_changed'));
    }


     /**
     * Secrete Token
     * @group Authentication
     * @param  Request $request
     * @return Response
     * @response 200 {"status":"Success","message":"Login Success","code":200,"data":{"id":2,"username":"alamin12","email":"alamin20192019@gmail.com","sex":"Male","status":1,"industry_id":1,"salary_range_id":1,"referral_code":"2023","access_token":{"access_token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNDg1Y2YzYTlkZGE0MDI4ODRmMDA4OTJhZDkyZDRmZmNiMjI0ZmFjNWVjOWQ0M2ZmZGNjMWQ5NWU3MGVkZGFkMzhjYzVjNDU0ODBiZmY3ZDUiLCJpYXQiOiIxNjE4NTA0MjIzLjI1ODk4NCIsIm5iZiI6IjE2MTg1MDQyMjMuMjU4OTg3IiwiZXhwIjoiMTYxODU5MDYyMy4xMTg5MDkiLCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.heiHePCYpVEsHsq8m-B1HgX_TVvecXDGGQdPaOIHA0Rbn98pFUIg7v73tk93IF1IxIp5VGMFDzpAlenHhdqI5sIpW5iuXxcLSa_XmtqCzxHOg_5C8m5KehW--tbnDtrKmE2G2563M52hX9TscqIYt17joQndpAi3pWCs4dklea5mls1UoXg8zPDkp5DkZ_tuORXCsXpldPVXw0JjuOuGmL0D5yfMg3Xufw-KdYX-Ip0GsgU2eT2xf7sjDQcAtba2I_4kNZbgr56ta2RmNxvDIg0spfhoRktQgEsnREesezpv8hyy_SiMHfChmAucyAqTh7TOoFjUZ2BzAqPRBuyw-nLUBogRPE2Y1S9OQg0Od1-Aqgi4F4EFSrklJHrCB5koOLgqoURt_RySo2SweEjIHdudMRSQhtXCRVeBBimxeH_9zIRH_T684hmluNCCIlZeYTxgRBBkFg65i9i1GUSjLpkciUu0txlpPevsOou68A_MWwWByGifq8o4GuY1NVY1FgMYkYMuGraGduUtsmaCBhVZlTX1-tPfuTR1k3XjM7RGMTp8C-8UTqwzruLDu20cwJXsQ4Of6Jp970Rl6FI-9CzqWhlx5GIxrvcFufkV2ntAApBllt4fBVKBKkaaJCCgLo6MrTRuKGU5aI1Lzcz1hkFWHw0JjMDN3jOS5cmD9OM","token_type":"Bearer","expires_at":"2021-04-16 16:30:23"},"profile_pic":"public\/upload\/60785f80cb084_1611049331368.JPEG","created_at":"2021-04-15T15:45:04.000000Z","updated_at":"2021-04-15T15:45:04.000000Z"}}
    */

    public function client_token($id)
    {

        $secret = DB::table('oauth_clients')->where('secret', 'id')->where('id',2)->first();

        if ($secret) {

            return WebApiResponse::success(200, $secret->toArray(), trans('messages.success_show'));
        } else {

            return WebApiResponse::error(404, [], trans('messages.success_show_faild'));
        }

    }

}
