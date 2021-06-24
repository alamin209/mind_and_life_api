<?php

namespace App\Http\Controllers\Occupation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Occupation;
use DataTables;
class OccupationController extends Controller
{

    public function index(Request $request)
    {
        $title ='Occupation List';
        $data =Occupation::all();
        if ($request->ajax()) {

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    return $row->name ?? '';
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return 'Active';
                    } else {
                        return 'Inactive';
                    }
                })

                ->addColumn('action', function($row){
                    $btn = ' <button type="button"   onclick="selectid2('.$row->id .')"
                    class="btn btn-success waves-effect waves-light"style="margin-right:20px" onclick="selectid2('.$row->id.')"   data-toggle="modal" data-target="#updatenewipaddress">
                    <i class="bx bx-pencil  font-size-16 align-right "   ></i>
                  </button> ';
                    // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary">Edit</a> ';
                    return $btn;
                })


                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin/occupation/occupation',compact('title'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


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
