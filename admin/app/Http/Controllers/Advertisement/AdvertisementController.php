<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use DataTables;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Advertisement List';

        if ($request->ajax()) {

            $data = Advertisement::get();

            return Datatables::of($data)

                 ->addIndexColumn()

                ->addColumn('advertisement_photo', function ($row) {
                    $url=asset($row->ad_image_path);
                    return $url;
             })

                ->addColumn('website_link', function ($row) {
                    return $row->website_link ?? '';
                })

                ->addColumn('google', function ($row) {
                    if ($row->is_google == 0) {
                        return 'No';
                    } else {
                        return 'Yes';
                    }
                })
                ->addColumn('total_clicks', function ($row) {

                    return $row->total_clicks ?? '';
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
                        class="btn btn-success waves-effect waves-light"  data-toggle="modal" data-target="#update_advertisement">
                    Edit

                        </button> ';
                    $btn2 = '<button type="button" data-panel-id="'.$row->id.'"   onclick="delete_ad(' . $row->id . ')"
                        class="btn btn-danger waves-effect waves-light"   data-toggle="modal" data-target="#">
                        Delete
                        </button>';
                    return  $btn . '' . $btn2;

                })


                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin/advertisement/advertisements', compact('title'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $data = $request->validate([
            'ad_image_path'       => 'nullable | image |  mimes:jpeg,png,jpg,gif | max:8240',
            'is_google'          => 'nullable | integer',
            'website_link'       => 'nullable | string',
            'add_sense_link'     => 'nullable | string',
            'status'             => 'nullable | integer'
        ]);


        $is_google = $request->has('is_google');

        if ($request->hasFile('ad_image_path') != '') {

            $ad_image = $request->file('ad_image_path');
            $ad_image_name =  uniqid('ad_') . Str::random('10') . '.' . $ad_image->getClientOriginalExtension();
            $ad_image_resize = Image::make($ad_image->getRealPath());
            // $ad_image_resize->resize(200, 200);
            $data['is_google'] = $is_google;
            if ($ad_image->isValid()) {

                $ad_image_resize->save(public_path('advertisement/' . $ad_image_name));

                $ad_image_path = 'public/advertisement/' . $ad_image_name;
                $data['ad_image_path'] = $ad_image_path;

                Advertisement::create($data);
            }
        } else {

            Advertisement::create($data);
        }

        try {
            $this->successfullymessage('Advertisement  Addedd successfully ');
            return redirect()->back();
        } catch (\Exception $e) {
            $this->failmessage($e->getMessage());
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $advertisement =   Advertisement::find($id);

        return view('admin/advertisement/update', compact('advertisement'));
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
            'ad_image_path'      => 'nullable | image |  mimes:jpeg,png,jpg,gif | max:40248',
            'is_google'          => 'nullable | integer',
            'website_link'       => 'nullable | string',
            'add_sense_link'     => 'nullable | string',
            'status'             => 'nullable | integer'
        ]);


        $old_advertisement  =  Advertisement::find($id);
        $is_google = $request->has('is_google');

        if( $is_google ){

            if( isset($old_advertisement->ad_image_path)){
                $files_old = $old_advertisement->ad_image_path;
                if($files_old){
                 unlink($files_old);
                }
           }
            $data['ad_image_path'] ='';
            $data['website_link'] ='';
            $old_advertisement->update($data);
        }



        else if ($request->hasFile('ad_image_path') != '') {

            $ad_image = $request->file('ad_image_path');
            $ad_image_name =  uniqid('ad_') . Str::random('10') . '.' . $ad_image->getClientOriginalExtension();
            $ad_image_resize = Image::make($ad_image->getRealPath());
           // $ad_image_resize->resize(200, 200);
             $data['is_google'] = $is_google;

             if ($ad_image->isValid()) {

                if( isset($old_advertisement->ad_image_path)){
                    $files_old = $old_advertisement->ad_image_path;
                    if($files_old){
                     unlink($files_old);
                    }
               }

                 $ad_image_resize->save(public_path('advertisement/' . $ad_image_name));
                 $ad_image_path = 'public/advertisement/' . $ad_image_name;
                 $data['ad_image_path'] = $ad_image_path;

                 $old_advertisement->update($data);
             }

        }

        else if ($request->hasFile('ad_image_path') == '') {

                 $old_advertisement->update($data);
         }


       try {
            $this->successfullymessage('Advertisement  Update  successfully ');
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
        $old_advertisement = Advertisement::findOrFail($id);


        if( isset($old_advertisement->ad_image_path)){
            $files_old = $old_advertisement->ad_image_path;
            if($files_old){
             unlink($files_old);
            }
       }

        $old_advertisement->delete();


    }

}

