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

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Quiz  List';
        $quizTypes = QuizType::get();

        if ($request->ajax()) {

            $data = Quiz::with('quizType')->get();

            return Datatables::of($data)

                ->addIndexColumn()
                ->addColumn('quiz_type_id', function ($row) {
                    return $row->quizType->name ?? '';
                })

                ->addIndexColumn()
                ->addColumn('heading', function ($row) {
                    return $row->heading ?? '';
                })

                ->addIndexColumn()
                ->addColumn('image_path', function ($row) {
                    return $row->image_path ?? '';
                })

                ->addIndexColumn()
                ->addColumn('total_view', function ($row) {
                    return $row->total_view ?? '';
                })

                ->addIndexColumn()
                ->addColumn('tota_share', function ($row) {
                    return $row->tota_share ?? '';
                })

                ->addIndexColumn()
                ->addColumn('total_download', function ($row) {
                    return $row->total_download ?? '';
                })

                ->addIndexColumn()
                ->addColumn('total_point', function ($row) {
                    return $row->total_point ?? '';
                })

                // ->addIndexColumn()
                // ->addColumn('total_question', function ($row) {
                //     return $row->total_question ?? '';
                // })

                // ->addIndexColumn()
                // ->addColumn('total_min', function ($row) {
                //     return $row->total_min ?? '';
                // })


                ->addColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return 'Active';
                    } else {
                        return 'Inactive';
                    }
                })

                ->addColumn('action', function ($row) {
                    $btn = '<button type="button"   onclick="selectid2(' . $row->id . ')"
                    class="btn btn-success waves-effect waves-light"style="margin-right:20px"   data-toggle="modal" data-target="#updatecategory">
                   Edit

                    </button> ';
                    $btn2 = '<button type="button" data-panel-id="'.$row->id.'"   onclick="delete_quiz_type(' . $row->id . ')"
                        class="btn btn-danger waves-effect waves-light"   data-toggle="modal" data-target="#">
                        Delete
                        </button>';
                    return  $btn . '' . $btn2;

                    // <i class="bx bx-pencil  font-size-16 align-right "   ></i>
                })


                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.quiz.index', compact('title','quizTypes'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'quiz_type_id'               => 'required|numeric',
            'heading'                    => 'required | unique:quizzes',
            'description'                => 'nullable |string',
            'image_path'                 => 'nullable | image |  mimes:jpeg,png,jpg,gif | max:8240',
            // 'total_view'               => 'required|numeric',
            // 'tota_share'               => 'required|numeric',
            // 'total_download'            => 'required|numeric',
              'total_point'              => 'required|numeric',
            'total_question'              => 'required|numeric',
            // 'total_min'                => 'required|numeric',
            // 'status'                  => 'nullable|integer',
        ]);

        if ($request->hasFile('image_path') != '') {

            $quiz_image = $request->file('image_path');
            $quiz_image_name =  uniqid('qtype_') . Str::random('10') . '.' . $quiz_image->getClientOriginalExtension();
            $quiz_image_resize = Image::make($quiz_image->getRealPath());
            // $quiz_image_resize->resize(200, 200);
            if ($quiz_image->isValid()) {

                $quiz_image_resize->save(public_path('quiz/' . $quiz_image_name));

                $quiz_image_path = 'public/quiz/' . $quiz_image_name;
                $data['image_path'] = $quiz_image_path;

                Quiz::create($data);
            }
        } else {

            Quiz::create($data);
        }

        try {
            $this->successfullymessage('Quiz Added Successfully ');
            return redirect()->back();
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
        $quiz =   Quiz::find($id);
        $quizTypes = QuizType::get();

        return view('admin/quiz/update', compact('quiz','quizTypes'));
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

        $data = $request->validate([
            'quiz_type_id'             => 'required|numeric',
            'heading'                  => 'required|unique:quizzes,heading,'.$id,
            'description'              => 'required',
            'image_path'               => 'nullable | image |  mimes:jpeg,png,jpg,gif | max:8240',
            // 'total_view'               => 'required|numeric',
            // 'tota_share'               => 'required|numeric',
            // 'total_download'           => 'required|numeric',
            'total_point'              => 'required|numeric',
            'total_question'           => 'required|numeric',
            // 'total_min'               => 'required|numeric',
             'status'                  => 'required|integer',
        ]);


        $old_quiz  =  Quiz::find($id);

        if ($request->hasFile('image_path') != '') {

            $quiztype_image = $request->file('image_path');
            $quiztype_image_name =  uniqid('ad_') . Str::random('10') . '.' . $quiztype_image->getClientOriginalExtension();
            $quiztype_image_resize = Image::make($quiztype_image->getRealPath());
           // $quiztype_image_resize->resize(200, 200);

             if ($quiztype_image->isValid()) {

                if( isset($old_quiz->image_path)){
                    $files_old = $old_quiz->image_path;
                    if($files_old){
                     unlink($files_old);
                    }
               }

                 $quiztype_image_resize->save(public_path('quiz/' . $quiztype_image_name));
                 $image_path = 'public/quiz/' . $quiztype_image_name;
                 $data['image_path'] = $image_path;

                 $old_quiz->update($data);
             }

        }
        else if ($request->hasFile('image_path') == '') {
                $old_quiz->update($data);
         }


       try {
            $this->successfullymessage('Quiz   Updated  successfully ');
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
        $old_quiz = Quiz::findOrFail($id);


        if( isset($old_quiz->image_path)){
            $files_old = $old_quiz->image_path;
            if($files_old){
             unlink($files_old);
            }
       }

        $old_quiz->delete();

        QuizQuestion::where('quiz_id',$id)->delete();
        QuizOption::where('quiz_id',$id)->delete();


    }
}
