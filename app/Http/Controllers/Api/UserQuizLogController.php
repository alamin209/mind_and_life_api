<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserRelationQuiz;
use App\Libraries\WebApiResponse;
use App\Models\Quiz;;

use App\Models\QuizQuestion;
use App\Models\QuizOption;

class UserQuizLogController extends Controller
{
    /**
     * Display User Quiz Answered Log
     * @group Quiz
     * @authenticated
     * @queryParam limit  integer  optional  per page limit   to Filter Example:10 .
     * @queryParam orderBy  String  optional  Order    to Filter Example:DESC .
     * @queryParam sortBy  String  optional  Order    to Filter  Example:id .
     * @bodyParam user_id  Integer required User Id. Example: 1
     * @return \Illuminate\Http\Response
     * @response 200
     * {"status":"Success","message":"messages.success_show_all","code":200,"data":{"current_page":1,"data":[{"id":2,"user_id":2,"count_attempt":4,"quiz_id":1,"total_point":50,"total_answered":1,"previous_point":5,"quiz_share":null,"created_at":"2021-06-12T18:19:09.000000Z","updated_at":"2021-06-12T18:21:16.000000Z","quiz":{"id":9,"quiz_id":2,"quiz_point":"2","name":"Do ypu Know peace Country of the world","type":"multiple","status":1,"created_at":"2021-06-11T13:36:49.000000Z","updated_at":"2021-06-11T13:36:49.000000Z"}}],"first_page_url":"http:\/\/localhost\/dss_api\/api\/user-quiz-log?page=1","from":1,"last_page":1,"last_page_url":"http:\/\/localhost\/dss_api\/api\/user-quiz-log?page=1","links":[{"url":null,"label":"&laquo; Previous","active":false},{"url":"http:\/\/localhost\/dss_api\/api\/user-quiz-log?page=1","label":1,"active":true},{"url":null,"label":"Next &raquo;","active":false}],"next_page_url":null,"path":"http:\/\/localhost\/dss_api\/api\/user-quiz-log","per_page":10,"prev_page_url":null,"to":1,"total":1}}
     */

    public function index(Request $request)
    {



        try {
            $queryParams = [
                'limit'         =>  $request->limit ?? 10,
                'sortBy'        =>  $request->sortBy ?? 'id',
                'orderBy'       =>  in_array($request->orderBy, ['ASC', 'DESC']) ? $request->orderBy : 'DESC',
            ];
            $whereClause = $request->whereClause ?? [];

           $user_quiz =  UserRelationQuiz::where('user_id',$request->user_id)
                            ->with('quiz')
                            ->orderBy($queryParams['sortBy'], $queryParams['orderBy'])
                            ->where($whereClause)
                            ->paginate($queryParams['limit'])
                            ->toArray();

            return WebApiResponse::success(200, $user_quiz, trans('messages.success_show_all'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.failed_show_all'));
        }
    }



    /**
     * Create New User Quiz Answered Log
     * @group  Quiz
     * @param  \Illuminate\Http\Request  $request
     * @bodyParam user_id  Integer required User Id. Example: 1
     * @bodyParam quiz_id  Integer required Quiz Id. Example: 1
     * @bodyParam  answers array required question  Id and answered    List . Example: Example:  [  { "quiz_question_id": 1 , "option" : "Bhutan" }, { "quiz_question_id": 2 , "option" :  "Yes" }],
     * @return \Illuminate\Http\Response
     * @response 200 {"status":"Success","message":"Quiz Answered ","code":201,"data":{"total_correct_answers":1,"total_points":50}}
     */

    public function store(Request $request)
    {

        $data = $request->validate([
            'user_id'           => 'required|integer',
            'quiz_id'           => 'required|integer',
            'answers'           => 'array | required'
        ]);

        $answers          = $request->answers;
        $total_answered   = 1;
        $i                = 0;
        $total_point      = 0;
        foreach ($answers as  $key => $answer) {

            $answer['quiz_question_id'];
            $option               = ($answer["option"]);
            $correct_answered     = QuizOption::where('quiz_question_id', $answer['quiz_question_id'])->first();
            $real_answer          = (str_replace(['["', '"]'], "", $correct_answered->correct_answer));

            if ($option == $real_answer) {

                $id              =  $correct_answered->quiz_question_id;
                $point           = QuizQuestion::where("quiz_id", $request->quiz_id)->where('id',  $id)->first()->quiz_point;
                $total_point     =    $total_point+$point;
                $total_answered  = $total_answered + $i;

            } else {
                echo "";
            }

            $i++;
        }

         $user_quiz = UserRelationQuiz::where('user_id',$request->user_id)->where('quiz_id',$request->quiz_id)->first();

         if($user_quiz){

            $user_quiz->total_point;
            $user_quiz->previous_point;

            if(  $total_point > $user_quiz->previous_point){
                $user_quiz->total_point      = $total_point;
                $user_quiz->total_answered   = $total_answered;
                $user_quiz->count_attempt    = $user_quiz->count_attempt + 1;
                $user_quiz->save();

            }

         }else{
            $new_user_quizzed = new UserRelationQuiz();
            $new_user_quizzed->user_id         = $request->user_id;
            $new_user_quizzed->quiz_id         =  $request->quiz_id;
            $new_user_quizzed->total_point     =  $total_point;
            $new_user_quizzed->total_answered  =  $total_answered;
            $new_user_quizzed->previous_point  = $total_point;
            $new_user_quizzed->count_attempt   =  0;

            $new_user_quizzed->save();


         }

         $total_answered =[
                    'total_correct_answers'  =>  $total_answered,
                    'total_points'           =>  $total_point,
         ];

     return WebApiResponse::success(201, $total_answered, 'Quiz Answered ');
    }
}
