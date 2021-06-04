<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use DataTables;
use Illuminate\Support\Str;
use Session;
use Hash;
use Auth;
use File;
use DB;
use Intervention\Image\ImageManagerStatic as Image;

class VideoCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $title = 'Video Category List';

        if ($request->ajax()) {

            $data = Category::where('type', 'video')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    return $row->name ?? '';
                })

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
                    $btn2 = '<button type="button"   onclick="delete(' . $row->id . ')"
                     class="btn btn-danger waves-effect waves-light"style="margin-right:20px"   data-toggle="modal" data-target="#">
                      Delete
                     </button>';
                    return  $btn . '' . $btn2;

                    // <i class="bx bx-pencil  font-size-16 align-right "   ></i>
                })


                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin/videocategory/category', compact('title'));
    }

    public function store(Request $request)
    {

        return  $request->all();
        $data = $request->validate([
            'name'               => 'required|max:255 |unique:categories',
            'type'               => 'required|string',
            'status'             => 'nullable|integer',
            'image_path'               => 'nullable | image |  mimes:jpeg,png,jpg,gif | max:8240',
        ]);
        if ($request->hasFile('image_path') != '') {

            $qQimage = $request->file('image_path');
            $qQimage_name =  uniqid('qtype_') . Str::random('10') . '.' . $qQimage->getClientOriginalExtension();
            $qQimage_resize = Image::make($qQimage->getRealPath());
            // $qQimage_resize->resize(200, 200);
            if ($qQimage->isValid()) {

                $qQimage_resize->save(public_path('article-category/' . $qQimage_name));

                $qQimage_path = 'public/article-category/' . $qQimage_name;
                $data['image_path'] = $qQimage_path;

                Category::create($data);
            }
        } else {

            Category::create($data);
        }

        try {
            $this->successfullymessage('Category  Addedd successfully ');
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
        $category =   Category::find($id);

        return view('admin/videocategory/update', compact('category'));
    }
}
