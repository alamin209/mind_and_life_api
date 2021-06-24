<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use App\Models\ContactUs;
class SettingController extends Controller
{

    public function aboutUs()
    {
        $title   = 'About Us';
        $data    =  AboutUs::get();
        return view('admin/setting/aboutus/aboutus', compact('title', 'data'));
    }

    public function createAboutUs()
    {
        $title   = 'About Us';
        $data    =  AboutUs::get();
        return view('admin/setting/aboutus/create', compact('title', 'data'));
    }

    public function storeAboutUs(Request $request)
    {


        $data = $request->validate([
            'title'            => 'required',
            'description'      => 'nullable',
            'image_path'       => 'nullable | image |  mimes:jpeg,png,jpg,gif | max:8240',
        ]);


        if ($request->hasFile('image_path') != '') {

            $qQimage = $request->file('image_path');
            $qQimage_name =  uniqid('about_') . Str::random('10') . '.' . $qQimage->getClientOriginalExtension();
            $qQimage_resize = Image::make($qQimage->getRealPath());
            if ($qQimage->isValid()) {

                $qQimage_resize->save(public_path('settings/' . $qQimage_name));

                $qQimage_path = 'public/settings/' . $qQimage_name;
                $data['image_path'] = $qQimage_path;

                AboutUs::create($data);
            }
        } else {

            AboutUs::create($data);
        }

        try {
            $this->successfullymessage('About  Us  Added successfully ');
            return redirect()->back();
        } catch (\Exception $e) {
            $this->failmessage($e->getMessage());

            return redirect()->back('/about-us');
        }
    }


    public function edit_about_us($id){

        $title   = ' Update About Us';
        $aboutUs =   AboutUs::find($id);

        return view('admin/setting/aboutus/update', compact( 'title','aboutUs'));

    }

    public function updateAboutUs(Request $request,$id){


        $data = $request->validate([
            'title'           => 'required',
            'description'     => 'required|string',
            'image_path'      => 'nullable | image |  mimes:jpeg,png,jpg,gif | max:8240',

        ]);

        $category = AboutUs::findOrFail($id);

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

                 $qQimage_resize->save(public_path('settings/' . $qQimage_name));
                 $image_path = 'public/settings/' . $qQimage_name;
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


    public function contactUs(){

        $title   = 'Contact Us';
        $data    =  ContactUs::get();
        return view('admin/setting/contact/contactus', compact('title', 'data'));
    }
}
