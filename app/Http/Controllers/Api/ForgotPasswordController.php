<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Libraries\WebApiResponse;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */



    use SendsPasswordResetEmails;


    protected function sendResetLinkResponse(Request $request, $response)
    {

         return WebApiResponse::success(201,  '',  trans($response));

    }


    protected function sendResetLinkFailedResponse(Request $request, $response)
    {

        $errors = [
            [
                'field'     => '',
                'value'     => '',
                'message'   => trans($response)
            ]
        ];

        return WebApiResponse::error(422, $errors, $response);

    }
}
