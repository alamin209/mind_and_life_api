<?php

namespace App\Http\Controllers\Usermanagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use DataTables;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $title = 'Vendor  List';


        if ($request->ajax()) {

                $data    = Vendor::get();
                        return Datatables::of($data)
                        ->addIndexColumn()

                        ->addColumn('company_name', function ($row) {
                            return $row->company_name;
                        })

                        ->addColumn('contact_name', function ($row) {
                            return $row->contact_name;
                        })

                        ->addColumn('company_email', function ($row) {
                            return $row->company_email;
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

         return view('admin/vendors/vendorlist',compact('title'));
    }



    public function store(Request $request)
    {
        $this->validate($request, [

            'company_name'            => 'required | string',
            'contact_name'            => 'required | string',
            'post_title'              => 'required | string',
            'company_phone'           => 'required | string ',
            'company_email'           => 'required | email | unique:vendors,company_email',
            'company_address'         =>'required',
            'company_signature'       =>'required|image|  mimes:jpeg,png,jpg,gif | max:10248',
            'company_seal'            =>'required|image| mimes:jpeg,png,jpg,gif | max:10248'
        ]);

        $company_sign=$request->file('company_signature');
        $company_signature_name=  uniqid('cp_signature_').Str::random('10').'.'.$company_sign->getClientOriginalExtension();
        $company_sign_resize = Image::make($company_sign->getRealPath());
        $company_sign_resize->resize(200,200 );


        $company_seal = $request->file('company_seal');
        $company_seal_name=  uniqid('cp_seal_').Str::random('10').'.'.$company_seal->getClientOriginalExtension();

        $company_seal_resize = Image::make($company_seal->getRealPath());
        $company_seal_resize->resize(200,200 );

       if($company_sign->isValid() &&  $company_seal->isValid() ){

             $company_sign_resize->save(public_path('company_signature/' .$company_signature_name));
             $company_seal_resize->save(public_path('company_seal/' .$company_seal_name));

            $user                        = new Vendor;
            $user->company_name          = $request->company_name;
            $user->contact_name          = $request->contact_name;
            $user->post_title            = $request->post_title;
            $user->company_email         = $request->company_email;
            $user->company_phone         = $request->company_phone;
            $user->company_address       = $request->company_address;
            $user->company_signature     = $company_signature_name;
            $user->company_seal          = $company_seal_name;
            $user->status                = $request->status ?? 1 ;
            $user->save();

        }

        try {

            $this->successfullymessage('New Vendor Created  successfully');
            return redirect()->back();
        }
        catch (\Exception $e) {

          $this->failmessage($e->getMessage());

             return redirect()->back();
        }
    }

    public function show($id)
    {
        $vendor  = Vendor::find($id);
        return view('admin/vendors/update_vendor',compact('vendor'));

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
        $this->validate($request, [

            'company_name'            => 'required | string',
            'contact_name'            => 'required | string',
            'post_title'              => 'required | string',
            'company_phone'           => 'required | string ',
            //'name' => 'required|string|max:255|unique:complain_types,name,'.$id,
            'company_email'           => 'required | email | unique:vendors,company_email,'.$id,
            'company_address'         =>'required',

        ]);

            $vendor =Vendor::find($id);

            if($request->file('company_signature') != ''){

                $this->validate($request, [
                    'company_signature'       =>'image| mimes:jpeg,png,jpg,gif,PNG | max:10248',
                  ]);

                $path = public_path().'/company_signature/';
                //code for remove old file
                if($vendor->company_signature != ''  && $vendor->company_signature != null){
                     $files_old = $path.$vendor->company_signature;
                     if($files_old){
                      unlink($files_old);
                     }
                }

                $company_sign=$request->file('company_signature');
                $company_signature_name=  uniqid('cp_signature_').Str::random('10').'.'.$company_sign->getClientOriginalExtension();
                $company_sign_resize = Image::make($company_sign->getRealPath());
                $company_sign_resize->resize(200,200 );

                $company_sign_resize->save(public_path('company_signature/'.$company_signature_name));
            }

            if($request->file('company_seal') != ''){

                $this->validate($request, [
                    'company_seal'        =>'image|  mimes:jpeg,png,jpg,gif,PNG | max:10248',
                  ]);

                $path_seal = public_path().'/company_seal/';

                if($vendor->company_seal != ''  && $vendor->company_seal != null){
                     $file_old = $path_seal.$vendor->company_seal;
                     if($file_old){
                       unlink($file_old);
                     }
                }

                $company_seal = $request->file('company_seal');
                $company_seal_name=  uniqid('cp_seal_').Str::random('10').'.'.$company_seal->getClientOriginalExtension();
                $company_seal_resize = Image::make($company_seal->getRealPath());
                $company_seal_resize->resize(200,200 );
                $company_seal_resize->save(public_path('company_seal/' .$company_seal_name));
            }

            $user                        = Vendor::find($id);
            $user->company_name          = $request->company_name;
            $user->contact_name          = $request->contact_name;
            $user->post_title            = $request->post_title;
            $user->company_email         = $request->company_email;
            $user->company_phone         = $request->company_phone;
            $user->company_address       = $request->company_address;
            $user->company_signature     = $company_signature_name ?? $vendor->company_signature;
            $user->company_seal          = $company_seal_name ?? $vendor->company_seal;
            $user->status                = $request->status ?? 1 ;
            $user->save();

        try {

            $this->successfullymessage('Vendor Update  successfully');
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
