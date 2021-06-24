<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Libraries\WebApiResponse;

class QuizController extends Controller
{
   /**
     * Display Quiz  List
     * @group     Quiz
     * @return \Illuminate\Http\Response
     * @response 200
     * {"status":"Success","message":"messages.success_show_all","code":200,"data":[{"id":2,"quiz_type_id":7,"heading":"General Quiz","description":"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas vel architecto unde qui esse similique corporis fuga libero ex, quia quae inventore impedit. Distinctio, suscipit ullam quod, pariatur dolorem delectus.","image_path":"public\/quiz\/ad_60b26ba5c4beakdTH7wnuN6.jpg","total_view":1,"tota_share":2,"total_download":3,"total_point":4,"total_question":3,"total_min":5,"status":1,"question_ready":1,"created_at":"2021-05-29T05:04:29.000000Z","updated_at":"2021-05-29T16:28:21.000000Z","quiz_type":null},{"id":6,"quiz_type_id":7,"heading":"Technical Quiz","description":"test","image_path":"public\/quiz\/qtype_60b5eae79325ePFTfwc9SNO.jpg","total_view":1,"tota_share":1,"total_download":1,"total_point":1,"total_question":1,"total_min":1,"status":1,"question_ready":1,"created_at":"2021-06-01T08:08:07.000000Z","updated_at":"2021-06-01T08:39:53.000000Z","quiz_type":null}]}
     */

    public function list()
    {

        $ranks = Quiz::with('quizType')->get()->toArray();
        try {

            return WebApiResponse::success(200, $ranks, trans('messages.success_show_all'));

        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }

    /**
     * Display Quiz wise question  List
     * @group     Quiz
     * @queryParam quiz_id integer  quiz id   to Filter. Example: 1
     * @return \Illuminate\Http\Response
     * @response 200
     * {"status":"Success","message":"messages.success_show_all","code":200,"data":[{"id":2,"quiz_id":2,"name":"demo question 2","type":"multiple","status":1,"created_at":"2021-06-03T03:31:46.000000Z","updated_at":"2021-06-03T03:31:46.000000Z","quiz_type":null,"questions":[{"id":1,"quiz_id":2,"name":"how to keep fit","type":"single","status":1,"created_at":"2021-06-03T03:31:46.000000Z","updated_at":"2021-06-03T03:31:46.000000Z","question_options":[{"id":1,"quiz_id":2,"quiz_question_id":1,"option_1":"doing exercise","option_2":"not doing exercise","option_3":"null","option_4":"null","correct_answer":"[\"doing exercise\"]","created_at":"2021-06-03T03:31:46.000000Z","updated_at":"2021-06-03T03:31:46.000000Z"}]},{"id":2,"quiz_id":2,"name":"demo question 2","type":"multiple","status":1,"created_at":"2021-06-03T03:31:46.000000Z","updated_at":"2021-06-03T03:31:46.000000Z","question_options":[{"id":2,"quiz_id":2,"quiz_question_id":2,"option_1":"demo option1","option_2":"demo option2","option_3":"demo option3","option_4":"demo option4","correct_answer":"[\"demo option2\"]","created_at":"2021-06-03T03:31:46.000000Z","updated_at":"2021-06-03T03:31:46.000000Z"}]},{"id":3,"quiz_id":2,"name":"demo question 3","type":"multiple","status":1,"created_at":"2021-06-03T03:31:46.000000Z","updated_at":"2021-06-03T03:31:46.000000Z","question_options":[{"id":3,"quiz_id":2,"quiz_question_id":3,"option_1":"option1","option_2":"option2","option_3":"option3","option_4":"option4","correct_answer":"[\"option3\"]","created_at":"2021-06-03T03:31:46.000000Z","updated_at":"2021-06-03T03:31:46.000000Z"}]},{"id":4,"quiz_id":2,"name":"question 5","type":"multiple","status":1,"created_at":"2021-06-04T17:22:33.000000Z","updated_at":"2021-06-04T17:22:33.000000Z","question_options":[{"id":4,"quiz_id":2,"quiz_question_id":4,"option_1":"rr","option_2":"erer","option_3":"null","option_4":"null","correct_answer":"[\"rr\",\"erer\"]","created_at":"2021-06-04T17:22:33.000000Z","updated_at":"2021-06-04T17:22:33.000000Z"}]}]}]}
     */


    public function quiz_questions($quiz_id)
    {


        $ranks = Quiz::with('quizType','questions','questions.question_options')->where('id',$quiz_id)->get()->toArray();
        try {

            return WebApiResponse::success(200, $ranks, trans('messages.success_show_all'));

        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }
}
