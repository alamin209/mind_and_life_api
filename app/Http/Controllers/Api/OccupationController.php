<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\WebApiResponse;
use App\Models\Occupation;
class OccupationController extends Controller
{
    /**
     * Display List  Occupation  List
     * @group  Occupation
     * @return \Illuminate\Http\Response
     * @response 200
     * {"status":"Success","message":"messages.success_show_all","code":200,"data":[{"id":1,"name":"Doctor","status":1,"created_at":"2021-06-08T23:23:49.000000Z","updated_at":"2021-06-15T23:23:54.000000Z"},{"id":2,"name":"teacher","status":1,"created_at":"2021-06-15T23:23:52.000000Z","updated_at":"2021-06-16T23:23:56.000000Z"}]}
     */

    public function list()
    {

        $ranks = Occupation::get()->toArray();
        try {


            return WebApiResponse::success(200, $ranks, trans('messages.success_show_all'));

        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }

}
