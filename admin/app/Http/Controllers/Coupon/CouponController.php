<?php

namespace App\Http\Controllers\Coupon;

use App\Http\Controllers\Controller;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\CouponsCategory;
use Intervention\Image\ImageManagerStatic as Image;
use DataTables;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $title = 'Coupon List';

        if ($request->ajax()) {

            $data = Coupon::with('category')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('category_name', function ($row) {
                    return $row->category->name ?? '';
                })
                ->addColumn('heading', function ($row) {
                    return $row->heading ?? '';
                })
                ->addColumn('image', function ($row) {
                    $url = asset($row->image_path);
                    return $url;
                })
                ->addColumn('description', function ($row) {
                    return substr($row->description, 0, 200)."Click details for more"  ?? '';
                })
                ->addColumn('expiry_date', function ($row) {
                    return $row->expiry_date ?? '';
                })
                ->addColumn('offer_brand', function ($row) {
                    return $row->offer_brand ?? '';
                })
                ->addColumn('price', function ($row) {
                    return $row->price ?? '';
                })
                ->addColumn('download_limit', function ($row) {
                    return $row->download_limit ?? '';
                })
                ->addColumn('total_download', function ($row) {
                    return $row->total_download ?? '';
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn btn-primary waves-effect waves-light"style="margin-right:20px" href="'.url('coupon/'.$row->id ).'">
                            Details
                        </a> ';
                    $btn1 = '<a class="btn btn-success waves-effect waves-light"style="margin-right:20px" href="'.url('coupon/'.$row->id.'/edit' ).'">
                            Edit
                        </a> ';
                    $btn2 = '<button type="button" data-panel-id="'.$row->id.'"   onclick="delete_quiz_type(' . $row->id . ')"
                        class="btn btn-danger waves-effect waves-light"   data-toggle="modal" data-target="#">
                        Delete
                        </button>';

                    return $btn . '' . $btn1 . '' . $btn2;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin/coupon/coupons', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'New Coupon';
        $categories = CouponsCategory::where('status', 1)->get();
        return view('admin/coupon/create', compact('categories', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'image_path'     => 'required | image |  mimes:jpeg,png,jpg,gif,JPEG | max:40248',
            'category_id'    => 'required | integer',
            'heading'        => 'required | string',
            'expire_date'    => 'required | date',
            'start_date'     => 'required | date',
            'description'    => 'nullable | string',
            'offer_brand'    => 'required | string',
            'download_limit' => 'required | integer',
            'total_download' => 'nullable | integer',
            'price'          => 'required | numeric',
            'term_condition' => 'required | string',
        ]);

        if ($request->hasFile('image_path') != '') {

            $coupon_image = $request->file('image_path');
            $coupon_image_name = uniqid('ar_') . Str::random('10') . '.' . $coupon_image->getClientOriginalExtension();
            $coupon_image_resize = Image::make($coupon_image->getRealPath());

            $created_id = 0;
            if ($coupon_image->isValid()) {
                $coupon_image_resize->save(public_path('coupon/' . $coupon_image_name));
                $coupon_image_path = 'public/coupon/' . $coupon_image_name;
                $data['image_path'] = $coupon_image_path;
                Coupon::create($data);
            }
        } else {
            Coupon::create($data);
        }
        try {
            $this->successfullymessage('Coupon Added successfully ');
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
        $title = 'Coupon';
        $categories = CouponsCategory::where('status', 1)->get();
        $coupon = Coupon::with('category')->find($id);
        return view('admin/coupon/view', compact('categories', 'title', 'coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title      = 'Edit Coupon';
        $categories = CouponsCategory::where('status', 1)->get();
        $coupon     = Coupon::with('category')->find($id);
        return view('admin/coupon/update', compact('categories', 'title', 'coupon'));
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
            'image_path'     => 'required | image |  mimes:jpeg,png,jpg,gif,JPEG | max:40248',
            'category_id'    => 'required | integer',
            'heading'        => 'required | string',
            'start_date'     => 'required | date',
            'expire_date'    => 'required | date',
            'description'    => 'nullable | string',
            'offer_brand'    => 'required | string',
            'download_limit' => 'required | integer',
            'total_download' => 'nullable | integer',
            'price'          => 'required | numeric',
            'term_condition' => 'required | string',
        ]);

        $old_coupon = Coupon::find($id);
        if ($request->hasFile('image_path') != '') {

            $coupon_image = $request->file('image_path');
            $coupon_image_name = uniqid('ar_') . Str::random('10') . '.' . $coupon_image->getClientOriginalExtension();
            $coupon_image_resize = Image::make($coupon_image->getRealPath());

            if ($coupon_image->isValid()) {
                if (isset($old_coupon->image_path)) {
                    $files_old = $old_coupon->image_path;
                    if ($files_old) {
                        unlink($files_old);
                    }
                }

                $coupon_image_resize->save(public_path('coupon/' . $coupon_image_name));
                $coupon_image_path = 'public/coupon/' . $coupon_image_name;
                $data['image_path'] = $coupon_image_path;
                $old_coupon->update($data);
            }
        } else if ($request->hasFile('image_path') == '') {
            $old_coupon->update($data);
        }
        try {
            $this->successfullymessage('Coupon Updated successfully ');
            return redirect()->back();
        } catch (\Exception $e) {
            $this->failmessage($e->getMessage());
            return redirect()->back();
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
        $old_coupon = Coupon::findOrFail($id);
        if (isset($old_coupon->image_path)) {
            $files_old = $old_coupon->image_path;
            if ($files_old) {
                unlink($files_old);
            }
        }
        $old_coupon->delete();
    }
}
