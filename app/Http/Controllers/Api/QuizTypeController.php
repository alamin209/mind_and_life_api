<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\WebApiResponse;
use App\Models\QuizType;
class QuizTypeController extends Controller
{
     /**
     * Display Quiz type   List
     * @group   Quiz
     * @return \Illuminate\Http\Response
     * @response 200
     * {"status":"Success","message":"messages.success_show_all","code":200,"data":[{"id":1,"name":"Mind and Life  Quiz","image_path":"public\/quiz-type\/qtype_60b84be519cdfIrRqqCTFMW.jpg","status":1,"created_at":"2021-06-03T03:26:29.000000Z","updated_at":"2021-06-03T03:26:29.000000Z"}]}
     */

    public function list()
    {

        $quiz = QuizType::get()->toArray();
        try {


            return WebApiResponse::success(200, $quiz, trans('messages.success_show_all'));

        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }

}
