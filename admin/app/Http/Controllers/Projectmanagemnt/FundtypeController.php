<?php

namespace App\Http\Controllers\Projectmanagemnt;

use App\Http\Controllers\Controller;
use App\Models\FundType;
use Illuminate\Http\Request;
use DataTables;

class FundtypeController extends Controller
{
    public function index(Request $request)
    {
        $title ='Fund Type List';

        $data =FundType::get(['id','name','status']);

        if ($request->ajax()) {

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    return $row->name;
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
                    class="btn btn-success waves-effect waves-light"style="margin-right:20px" onclick="selectid2('.$row->id.')"   data-toggle="modal" data-target="#updatefundtype">
                    <i class="bx bx-pencil  font-size-16 align-right "   ></i>
                  </button> ';
                    // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary">Edit</a> ';
                    return $btn;
                })

                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin/fund-type/fund-type',compact('title'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name'=>'required|unique:fund_types',

        ]);

        $fundType         = new FundType;
        $fundType->name   = $request->name;
        $fundType->status = $request->status ?? 1;
        $fundType->save();

        try {

            $this->successfullymessage('New Fund  Type Created ');
            return redirect()->back();
        }
        catch (\Exception $e) {

          $this->failmessage($e->getMessage());

            return redirect()->back();
        }


    }

    public function show($id)
    {

      $fundtype = FundType::find($id);
      return view('admin/fund-type/update',compact('fundtype'));

    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name'      =>  'required | unique:fund_types,name,'.$id,
            'status'    =>  'required'

        ]);

        $ipaddress          = FundType::find($id);
        $ipaddress->name    = $request->name;
        $ipaddress->status  = $request->status;
        $ipaddress->save();

        try {
             $this->successfullymessage('Fund Type Update successfully');
             return redirect()->back();
        }
        catch (\Exception $e) {

          $this->failmessage($e->getMessage());

             return redirect()->back();
        }
    }


}
