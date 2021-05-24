<?php

namespace App\Http\Controllers\Ipaddress;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Ipaddress;
use App\User;
use DataTables;
class IpAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // function __construct(){

    //         $this->middleware('permission:ipaddress-list|ipaddress-create|ipaddress-edit|ipaddress-delete', ['only' => ['index','show']]);

    //         $this->middleware('permission:ipaddress-create', ['only' => ['create','store']]);

    //         $this->middleware('permission:ipaddress-edit', ['only' => ['edit','update']]);

    //         $this->middleware('permission:ipaddress-delete', ['only' => ['destroy']]);

    // }



    public function index(Request $request)
    {
        $title ='IP address List';
        $user =User::all();
        if ($request->ajax()) {
            $data = Ipaddress::with('user')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    return $row->user->username ?? '';
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

        return view('admin/ipaddress/ippaddress',compact('title','user'));

        // return view('index');
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'user_id'=>'required',
            'ip_address'=>'required|unique:ipaddresses',
            'status'   =>'required'

        ]);

        $ipaddress = new Ipaddress;
        $ipaddress->user_id  = $request->user_id;
        $ipaddress->ip_address = $request->ip_address;
        $ipaddress->status =$request->status;
        $ipaddress->save();

        try {


            $this->successfullymessage('Ip address Addedd successfully ');
            return redirect()->back();
        }
        catch (\Exception $e) {

          $this->failmessage($e->getMessage());

             return redirect()->back();
        }

    }


    public function show($id)
    {

      $user =User::all();
      $ipaddress = Ipaddress::find($id);

     return view('admin/ipaddress/update',compact('ipaddress','user'));

    }


    public function edit($id)
    {


    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'user_id'=>'required',
            // 'ip_address'=>'required|unique:ipaddresses,ip_address,'.$id,
            'status'   =>'required'

        ]);

        $ipaddress = Ipaddress::find($id);
        $ipaddress->user_id  = $request->user_id;
        $ipaddress->ip_address = $request->ip_address;
        $ipaddress->status =$request->status;
        $ipaddress->save();

        try {
             $this->successfullymessage('Ip address Update successfully ');
             return redirect()->back();
        }
        catch (\Exception $e) {

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
        //
    }
}
