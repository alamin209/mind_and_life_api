<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Libraries\WebApiResponse;
class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api')->only('resend');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

   /**
     * User verification Email
     * @group User Verification
     * @authenticated
     * @param  \Illuminate\Http\Request  $request
     * @bodyParam email email required User Email. Example: penny@gmail.com
     * {"status":"Success","message":"User Created","code":201,"data":{"id":14,"username":"penn2yyau88","email":"penn1y2@gmail.com","sex":"Male","industry_id":"1","salary_range_id":"1","referral_code":"1","profile_pic":"upload\/606ea8ffe16d4_images.jpg","created_at":"2021-04-08T06:55:59.000000Z","updated_at":"2021-04-08T06:55:59.000000Z"}}
     */



    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {



            return WebApiResponse::success(200, '', 'Already verified');
        }

        $request->user()->sendEmailVerificationNotification();

        if ($request->wantsJson()) {
            // return response(['message' => 'Email Sent']);

            return WebApiResponse::success(200, '', 'Email Sent');
        }

        return back()->with('resent', true);
    }


    /**
     * Mark the authenticated user's email address as verified.
     * @group Authentication
     * @authenticated
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */

    public function verify(Request $request)
    {
        auth()->loginUsingId($request->route('id'));

        if ($request->route('id') != $request->user()->getKey()) {
            throw new AuthorizationException;
        }

        if ($request->user()->hasVerifiedEmail()) {

            return response(['message'=>'Already verified']);

            // return redirect($this->redirectPath());
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return response(['message'=>'Successfully verified']);

    }

}
