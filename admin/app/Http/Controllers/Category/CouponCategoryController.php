<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\CouponsCategory;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use Hash;
use Auth;
use File;
use DB;
use Intervention\Image\ImageManagerStatic as Image;

class CouponCategoryController extends Controller
{
    public function index(Request $request)
    {
        $title = 'All Category List';

        if ($request->ajax()) {

            $data = CouponsCategory::get();
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
                    return $btn . '' . $btn2;

                    // <i class="bx bx-pencil  font-size-16 align-right "   ></i>
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin/coupon/couponCategory', compact('title'));
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'name'        => 'required|max:255 |unique:categories',
            'status'      => 'nullable|integer',
            'image_path'  => 'nullable | image |  mimes:jpeg,png,jpg,gif | max:8240',
        ]);
        if ($request->hasFile('image_path') != '') {

            $qQimage = $request->file('image_path');
            $qQimage_name =  uniqid('qtype_') . Str::random('10') . '.' . $qQimage->getClientOriginalExtension();
            $qQimage_resize = Image::make($qQimage->getRealPath());
            // $qQimage_resize->resize(200, 200);
            if ($qQimage->isValid()) {

                $qQimage_resize->save(public_path('coupon-category/' . $qQimage_name));

                $qQimage_path = 'public/coupon-category/' . $qQimage_name;
                $data['image_path'] = $qQimage_path;

                CouponsCategory::create($data);
            }
        } else {

            CouponsCategory::create($data);
        }

        try {
            $this->successfullymessage('Category  Added successfully ');
            return redirect()->back();
        } catch (\Exception $e) {
            $this->failmessage($e->getMessage());

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = CouponsCategory::find($id);

        return view('admin/coupon/couponCategoryUpdate', compact('category'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|max:255 |unique:categories,name,' . $id,
            'status' => 'required|integer',
            'image_path'               => 'nullable | image |  mimes:jpeg,png,jpg,gif | max:8240',

        ]);

        $category = CouponsCategory::findOrFail($id);

        if ($request->hasFile('image_path') != '') {

            $qQimage = $request->file('image_path');
            $qQimage_name =  uniqid('ad_') . Str::random('10') . '.' . $qQimage->getClientOriginalExtension();
            $qQimage_resize = Image::make($qQimage->getRealPath());
           // $qQimage_resize->resize(200, 200);

             if ($qQimage->isValid()) {

                if( isset($category->image_path)){
                    $files_old = $category->image_path;
                    if($files_old){
                     unlink($files_old);
                    }
               }

                 $qQimage_resize->save(public_path('coupon-category/' . $qQimage_name));
                 $image_path = 'public/coupon-category/' . $qQimage_name;
                 $data['image_path'] = $image_path;

                 $category->update($data);
             }

        }
        else if ($request->hasFile('image_path') == '') {
                $category->update($data);
         }

        try {
            $category->update($data);
            $this->successfullymessage('Category Updated successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            $this->failmessage($e->getMessage());
            return redirect()->back()->with('error', 'Failed to update Category!');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
