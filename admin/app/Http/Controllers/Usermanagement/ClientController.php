<?php

namespace App\Http\Controllers\Usermanagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Country;

use App\Models\Client;
use DataTables;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
           $title         ='Client  List';
           $country       = Country::select('id','name')->get();
           $title = 'Client  List';

            if ($request->ajax()) {

                $data    = Client::query()
                            ->with(array('country' => function($query) {
                            $query->select('id','name');
                            }))->get();

                        return Datatables::of($data)
                        ->addIndexColumn()

                        ->addColumn('name', function ($row) {
                            return $row->name_en.'(english)'.$row->name_ch.'(chine)';
                        })

                        ->addColumn('email', function ($row) {
                            return $row->email;
                        })
                        ->addColumn('contact_number', function ($row) {
                            return $row->contact_number;
                        })
                        ->addColumn('status', function ($row) {
                            if ($row->status == 1) {
                                return 'Active';
                            } else {
                                return 'Inactive';
                            }
                        })
                        ->addColumn('action', function($row){
                            $btn = '<button type="button"   onclick="selectid2('.$row->id .')"
                            class="btn btn-success waves-effect waves-light"style="margin-right:20px" onclick="selectid2('.$row->id.')"   data-toggle="modal" data-target="#updateClinet">
                            <i class="bx bx-pencil  font-size-16 align-right "   ></i>
                            </button> ';
                            // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary">Edit</a> ';
                            return $btn;
                        })

                        ->rawColumns(['action'])
                        ->make(true);
                }

         return view('admin/clients/clientlist',compact('title','country'));


    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'name_en'          => 'required | string',
            'name_ch'          => 'required | string',
            'contract_person'   => 'required | string',
            'contact_number'  => 'required | string ',
            'company_name'  => 'required | string ',
            'country_id'       => 'required | integer',
            'email'            => 'required | email | unique:clients,email',
            'city'             =>'required',
            'address'          =>'required',
        ]);

        // $input = $request->all();

        $user                   = new Client;
        $user->name_en          = $request->name_en;
        $user->name_ch          = $request->name_ch;
        $user->email            = $request->email;
        $user->contact_person   = $request->contract_person;
        $user->company_name     = $request->company_name;
        $user->country_id       = $request->country_id;
        $user->contact_number   = $request->contact_number;
        $user->city             = $request->city;
        $user->address          = $request->address;
        $user->status           = $request->status ?? 1 ;
        $user->save();

        try {

            $this->successfullymessage('New Client Created  successfully');
            return redirect()->back();
        }
        catch (\Exception $e) {

          $this->failmessage($e->getMessage());

             return redirect()->back();
        }
    }


    public function show($id)
    {
        $country = Country::select('id','name')->get();
        $client  = Client::find($id);
      return view('admin/clients/update_client',compact('country','client'));

    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'name_en'          => 'required | string',
            'name_ch'          => 'required | string',
            'contract_person'   => 'required | string',
            'contact_number'  => 'required | string ',
            'country_id'       => 'required | integer',
            'email'            => 'required | email | unique:clients,email,'.$id,
            'city'             =>'required',
            'address'          =>'required',
        ]);

        $user                   = Client::find($id);
        $user->name_en          = $request->name_en;
        $user->name_ch          = $request->name_ch;
        $user->email            = $request->email;
        $user->contract_person  = $request->contract_person;
        $user->country_id       = $request->country_id;
        $user->contact_number   = $request->contact_number;
        $user->city             = $request->city;
        $user->address          = $request->address;
        $user->status           = $request->status ?? 1 ;
        $user->save();

        try {

            $this->successfullymessage(' Client Update  successfully');
            return redirect()->back();
        }
        catch (\Exception $e) {
          $this->failmessage($e->getMessage());
          return redirect()->back();
        }
    }


    public function destroy($id)
    {
        //
    }
}
