<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DataTables;
use App\Models\QuizType;
use Illuminate\Support\Str;
use App\Libraries\AdRecursionHelper;
use Intervention\Image\ImageManagerStatic as Image;

class QuizTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Quiz Type List';

        if ($request->ajax()) {

            $data = QuizType::get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    return $row->name ?? '';
                })

                ->addIndexColumn()
                ->addColumn('image_path', function ($row) {
                    return $row->image_path ?? '';
                })


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
        return view('admin.quiz-type.index', compact('title'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name'               => 'required|unique:quiz_types',
            'image_path'               => 'nullable | image |  mimes:jpeg,png,jpg,gif | max:8240',
            'status'             => 'nullable|integer',
        ]);

        if ($request->hasFile('image_path') != '') {

            $quiz_image = $request->file('image_path');
            $quiz_image_name =  uniqid('qtype_') . Str::random('10') . '.' . $quiz_image->getClientOriginalExtension();
            $quiz_image_resize = Image::make($quiz_image->getRealPath());
            // $quiz_image_resize->resize(200, 200);
            if ($quiz_image->isValid()) {

                $quiz_image_resize->save(public_path('quiz-type/' . $quiz_image_name));

                $quiz_image_path = 'public/quiz-type/' . $quiz_image_name;
                $data['image_path'] = $quiz_image_path;

                QuizType::create($data);
            }
        } else {

            QuizType::create($data);
        }

        try {
            $this->successfullymessage('Quiz Type Addedd Successfully ');
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
        $category =   QuizType::find($id);

        return view('admin/quiz-type/update', compact('category'));
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
            'name'               => 'required|max:255 |unique:quiz_types,name,'.$id,
            'image_path'               => 'nullable | image |  mimes:jpeg,png,jpg,gif | max:8240',
            'status'             => 'nullable|integer',
        ]);


        $old_quiztype  =  QuizType::find($id);

        if ($request->hasFile('image_path') != '') {

            $quiztype_image = $request->file('image_path');
            $quiztype_image_name =  uniqid('ad_') . Str::random('10') . '.' . $quiztype_image->getClientOriginalExtension();
            $quiztype_image_resize = Image::make($quiztype_image->getRealPath());
           // $quiztype_image_resize->resize(200, 200);

             if ($quiztype_image->isValid()) {

                if( isset($old_quiztype->image_path)){
                    $files_old = $old_quiztype->image_path;
                    if($files_old){
                     unlink($files_old);
                    }
               }

                 $quiztype_image_resize->save(public_path('quiz-type/' . $quiztype_image_name));
                 $image_path = 'public/quiz-type/' . $quiztype_image_name;
                 $data['image_path'] = $image_path;

                 $old_quiztype->update($data);
             }

        }
        else if ($request->hasFile('image_path') == '') {
                $old_quiztype->update($data);
         }


       try {
            $this->successfullymessage('Quiz Type  Updated  successfully ');
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
        $old_quiztype = QuizType::findOrFail($id);


        if( isset($old_quiztype->image_path)){
            $files_old = $old_quiztype->image_path;
            if($files_old){
             unlink($files_old);
            }
       }

        $old_quiztype->delete();


    }
}