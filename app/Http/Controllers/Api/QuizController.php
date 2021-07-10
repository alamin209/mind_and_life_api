<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Libraries\WebApiResponse;

class QuizController extends Controller
{



    /**
     * Display Quiz  List with Categories wise  .
     * @group Quiz
     * @queryParam limit  integer  optional  per page limit   to Filter Example:10 .
     * @queryParam orderBy  String  optional  Order    to Filter Example:DESC .
     * @queryParam sortBy  String  optional  Order    to Filter  Example:id .
     * @queryParam title  String  optional  title    to Filter  Example:Loarinepsume .
     * @queryParam  category_id  integer  optional  Article Limit   to Filter  Example: 2
     * @return \Illuminate\Http\Response
     * @response 200
     *{"status":"Success","message":"messages.success_show_all","code":200,"data":{"current_page":1,"data":[{"id":9,"quiz_id":2,"quiz_point":"2","name":"Do ypu Know peace Country of the world","type":"multiple","status":1,"created_at":"2021-06-11T13:36:49.000000Z","updated_at":"2021-06-11T13:36:49.000000Z","quiz_type":{"id":2,"name":"Lige Style","image_path":"public\/quiz-type\/qtype_60c378aa9f08ed2xRuzfKTs.jpg","status":1,"created_at":"2021-06-11T14:52:26.000000Z","updated_at":"2021-06-11T14:52:26.000000Z"}},{"id":8,"quiz_id":2,"quiz_point":"2","name":"Do you have Experinc in Web Development","type":"single","status":1,"created_at":"2021-06-11T13:36:49.000000Z","updated_at":"2021-06-11T13:36:49.000000Z","quiz_type":{"id":2,"name":"Lige Style","image_path":"public\/quiz-type\/qtype_60c378aa9f08ed2xRuzfKTs.jpg","status":1,"created_at":"2021-06-11T14:52:26.000000Z","updated_at":"2021-06-11T14:52:26.000000Z"}},{"id":7,"quiz_id":2,"quiz_point":"1","name":"Do you jnow any App Development","type":"single","status":1,"created_at":"2021-06-11T13:36:49.000000Z","updated_at":"2021-06-11T13:36:49.000000Z","quiz_type":{"id":2,"name":"Lige Style","image_path":"public\/quiz-type\/qtype_60c378aa9f08ed2xRuzfKTs.jpg","status":1,"created_at":"2021-06-11T14:52:26.000000Z","updated_at":"2021-06-11T14:52:26.000000Z"}}],"first_page_url":"http:\/\/localhost\/mind_life_api\/api\/category_wise_quiz\/2?page=1","from":1,"last_page":1,"last_page_url":"http:\/\/localhost\/mind_life_api\/api\/category_wise_quiz\/2?page=1","links":[{"url":null,"label":"&laquo; Previous","active":false},{"url":"http:\/\/localhost\/mind_life_api\/api\/category_wise_quiz\/2?page=1","label":1,"active":true},{"url":null,"label":"Next &raquo;","active":false}],"next_page_url":null,"path":"http:\/\/localhost\/mind_life_api\/api\/category_wise_quiz\/2","per_page":10,"prev_page_url":null,"to":3,"total":3}}
     */

    public function Category_wise_quiz(Request $request)
    {



        $queryParams = [
            'limit'         =>  $request->limit ?? 10,
            'sortBy'        =>  $request->sortBy ?? 'id',
            'orderBy'       =>  in_array($request->orderBy, ['ASC', 'DESC']) ? $request->orderBy : 'DESC',
        ];
        $whereClause = $request->whereClause ?? [];
        $category_id  =  $request->category_id;
        $quiz = Quiz::query();

        $quiz->WhereHas('quizType', function ($q) use ($category_id) {
            $q->where('id', $category_id);
        });


        try {
            $article = $quiz->with('quizType')
                ->where('status', 1)
                ->orderBy($queryParams['sortBy'], $queryParams['orderBy'])->where($whereClause)
                ->paginate($request->article_limit ?? 10)
                ->toArray();
            return WebApiResponse::success(200, $article, trans('messages.success_show_all'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }


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


        $quiz = Quiz::with('quizType', 'questions', 'questions.question_options')->where('id', $quiz_id)->first();
        try {

            return WebApiResponse::success(200, $quiz, trans('messages.success_show_all'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }


    /**
     * Display the specified quiz
     * @group     Quiz
     * @queryParam quiz_id integer  quiz id   to Filter. Example: 1
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @response 200  {"status":"Success","message":"Article Data Fund","code":200,"data":{"id":1,"user_id":1,"category_id":1,"title":"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum","total_like":2,"total_bookmark":1,"total_share":4,"total_view":7,"post_date":"2021-04-08","image_path":"dfgfd","status":1,"created_at":null,"updated_at":"2021-05-04T23:20:39.000000Z","author":{"id":1,"username":"al-amin_hossainmind_life","email":"alamin209209@gmail.com","profile_pic":"https:\/\/lh5.googleusercontent.com\/-9S33dmSeYgQ\/AAAAAAAAAAI\/AAAAAAAAAAA\/AMZuucnEXYFy3mMQISfBSLntpYIANBF-zw\/s96-c\/photo.jpg","sex":null,"industry_id":null,"salary_range_id":null,"referral_code":null,"email_verified_at":"2021-04-01T23:17:42.000000Z","status":1,"created_at":"2021-04-21T06:07:29.000000Z","updated_at":"2021-04-21T06:07:29.000000Z","user_type":"staff"},"article_category":{"id":1,"name":"article category","type":"article","status":1,"created_at":"2021-05-18T12:13:26.000000Z","updated_at":"2021-05-11T12:13:28.000000Z"},"article_tags":[{"id":1,"article_id":1,"tag_name":"good","status":1,"created_at":null,"updated_at":null},{"id":2,"article_id":1,"tag_name":"tag_demo","status":1,"created_at":null,"updated_at":null}]}}
     */

    public function show($id)
    {
        $ranks = Quiz::with('quizType')->where('id', $id)->first();
        try {

            return WebApiResponse::success(200, $ranks, trans('messages.success_show_all'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }
}
