<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DataTables;
use App\Models\QuizType;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizOption;
use Illuminate\Support\Str;
use App\Libraries\AdRecursionHelper;
use Intervention\Image\ImageManagerStatic as Image;

class QuizQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $title = 'Quiz Question List';
        $quizzes = Quiz::get();
        //return $data = QuizQuestion::with('quiz')->get()->groupBy('quiz_id');
        //return $data = QuizQuestion::with('quiz')->get();

        if ($request->ajax()) {

            $data = Quiz::where('question_ready',1)->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('heading', function ($row) {
                    return $row->heading ?? '';
                })


                ->addColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return 'Active';
                    } else {
                        return 'Inactive';
                    }
                })

                ->addColumn('action', function ($row) {
                    $btn1 = '<a class="btn btn-primary waves-effect waves-light"style="margin-right:20px" href="'.url('quiz-question/'.$row->id ).'">
                            Details
                        </a> ';
                    $btn2 = '<a class="btn btn-success waves-effect waves-light"style="margin-right:20px" href="'.url('quiz-question/'.$row->id.'/edit' ).'">
                            Edit
                        </a> ';
                    $btn3 = '<button type="button" data-panel-id="'.$row->id.'"   onclick="delete_quiz_type(' . $row->id . ')"
                        class="btn btn-danger waves-effect waves-light"   data-toggle="modal" data-target="#">
                        Delete
                        </button>';
                    // $btn3 = '<form method="POST" action="'.url('quiz-question/'.$row->id ).'" accept-charset="UTF-8">
                    //                 '.csrf_token()
                    //                 method("DELETE").'
                    //                 <button type="submit" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Delete Quiz" onclick="return confirm("Are You sure?")"><i class="fas fa-trash"></i></button>
                    //             </form>';
                    return  $btn1 . '' . $btn2 . '' . $btn3;

                    // <i class="bx bx-pencil  font-size-16 align-right "   ></i>
                })


                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.quiz-question.index', compact('title','quizzes'));
    }

    public function create()
    {
        $title = 'Quiz Question List';
        $quizzes = Quiz::get();
        return view('admin.quiz-question.create', compact('title','quizzes'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // $request->validate([
        //     'name'               => 'required',
        //     'type'               => 'required',
        //     'correct_answer'               => 'required',
        //     'status'             => 'nullable|integer',
        // ]);

        //$quizQuestion = QuizQuestion::create($data);

        //$data['quiz_question_id'] = $quizQuestion['id'];
        Quiz::find($data['quiz_id'])->update([
            'question_ready' => 1,
        ]);
        foreach($request->name as $key => $qdata){
            $quizQuestion = QuizQuestion::create([
                'quiz_id' => $data['quiz_id'],
                'name' => $data['name'][$key],
                'type' => $data['type'][$key],
            ]);

            QuizOption::create([
                'quiz_id' => $data['quiz_id'],
                'quiz_question_id' => $quizQuestion['id'],
                'option_1' => $data['option_1'][$key],
                'option_2' => $data['option_2'][$key],
                'option_3' => $data['option_3'][$key],
                'option_4' => $data['option_4'][$key],
                'correct_answer' => $data['correct_answer_'.$key],
            ]);

        }

        try {
            $this->successfullymessage('Question Addedd Successfully ');
            return redirect()->route('quiz-question.index');
        } catch (\Exception $e) {
            $this->failmessage($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Quiz Question Details';

        $quizzes =   Quiz::get();
        $quiz =   Quiz::find($id);
        $questions =   QuizQuestion::where('quiz_id',$id)->with('quizOption')->get();
        $options =   QuizOption::where('quiz_id',$id)->get();

        return view('admin/quiz-question/details', compact('title','quizzes','quiz','questions','options'));
    }


    public function edit($id)
    {
        $title = 'Quiz Question Edit';

        $quizzes =   Quiz::get();
        $questions =   QuizQuestion::where('quiz_id',$id)->with('quizOption')->get();
        $options =   QuizOption::where('quiz_id',$id)->get();

        return view('admin/quiz-question/edit', compact('title','quizzes','questions','options'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        foreach($request->name as $key => $qdata){
            if(isset($request->question_id[$key])){
                $questionExist = QuizQuestion::find($request->question_id[$key]);
                if($questionExist){
                    $questionExist->update([
                        'quiz_id' => $data['quiz_id'],
                        'name' => $data['name'][$key],
                        'type' => $data['type'][$key],
                    ]);
                }
            }else{
                $quizQuestion = QuizQuestion::create([
                    'quiz_id' => $data['quiz_id'],
                    'name' => $data['name'][$key],
                    'type' => $data['type'][$key],
                ]);
            }

            if(isset($request->question_id[$key])){
                $optionExist = QuizOption::find($request->option_id[$key]);
                if($optionExist){
                    $optionExist->update([
                        'quiz_id' => $data['quiz_id'],
                        'option_1' => $data['option_1'][$key],
                        'option_2' => $data['option_2'][$key],
                        'option_3' => $data['option_3'][$key],
                        'option_4' => $data['option_4'][$key],
                        'correct_answer' => $data['correct_answer_'.$key],
                    ]);
                }
            }else{
                QuizOption::create([
                    'quiz_id' => $data['quiz_id'],
                    'quiz_question_id' => $quizQuestion['id'],
                    'option_1' => $data['option_1'][$key],
                    'option_2' => $data['option_2'][$key],
                    'option_3' => $data['option_3'][$key],
                    'option_4' => $data['option_4'][$key],
                    'correct_answer' => $data['correct_answer_'.$key],
                ]);

            }
        }

        try {
            $this->successfullymessage('Question Updated Successfully ');
            //return redirect()->route('quiz-question.index');
            return redirect()->back();
        } catch (\Exception $e) {
            $this->failmessage($e->getMessage());
            return redirect()->back();
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old_quizQuestion = QuizQuestion::findOrFail($id);

       //  if( isset($old_quizQuestion->image_path)){
       //      $files_old = $old_quizQuestion->image_path;
       //      if($files_old){
       //       unlink($files_old);
       //      }
       // }

        $old_quizQuestion->delete();
        QuizOption::where('quiz_question_id',$id)->delete();
    }
}
