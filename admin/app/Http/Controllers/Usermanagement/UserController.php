<?php

namespace App\Http\Controllers\Usermanagement;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use \Carbon\Carbon;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\ModelHasRoles;
use DB;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use DataTables;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $data = User::orderBy('id', 'DESC')->where('is_api',1)->paginate(10);
        $roles = Role::get(['id', 'name']);
        $title = 'User  List';
        return view('admin/users/userlist', compact('title', 'data', 'roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }



    public function notifyUser(Request $request){

        $user = User::where('id', 2)->first();

        $notification_id = $user->id;
        $title = "Greeting Notification";
        $message = "Have good day!";
        $id = 2;
        $type = "basic";

        $accesstoken = env('FCM_KEY');

        $URL = 'https://fcm.googleapis.com/fcm/send';


            $post_data = '{
                "to" : "' . $notification_id . '",
                "data" : {
                  "body" : "",
                  "title" : "' . $title . '",
                  "type" : "' . $type . '",
                  "id" : "' . $id . '",
                  "message" : "' . $message . '",
                },
                "notification" : {
                     "body" : "' . $message . '",
                     "title" : "' . $title . '",
                      "type" : "' . $type . '",
                     "id" : "' . $id . '",
                     "message" : "' . $message . '",
                    "icon" : "new",
                    "sound" : "default"
                    },

              }';
            // print_r($post_data);die;

        $crl = curl_init();

        $headr = array();
        $headr[] = 'Content-type: application/json';
        $headr[] = 'Authorization: ' . $accesstoken;
        curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($crl, CURLOPT_URL, $URL);
        curl_setopt($crl, CURLOPT_HTTPHEADER, $headr);

        curl_setopt($crl, CURLOPT_POST, true);
        curl_setopt($crl, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);

        $rest = curl_exec($crl);

        if ($rest === false) {
            // throw new Exception('Curl error: ' . curl_error($crl));
            //print_r('Curl error: ' . curl_error($crl));
            $result_noti = 0;
        } else {

            $result_noti = 1;
        }

        //curl_close($crl);
        //print_r($result_noti);die;
        return $result_noti;


     }

    public function appuser(Request $request)
    {


        $title = 'App User List';

        if ($request->ajax()) {

            $data =  User::orderBy('id', 'DESC')->where('is_api',0)->get();
            return Datatables::of($data)

              ->addIndexColumn()
                ->addColumn('Username', function ($row) {
                    return $row->username ?? '';
                })
                ->addColumn('photo', function ($row) {
                    $url = asset($row->profile_pic);
                    return $url;
                })

                ->addColumn('email', function ($row) {
                    return $row->email ?? '';
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
                        class="btn btn-success waves-effect waves-light"  style="margin-left:10px" data-toggle="modal" data-target="#update_advertisement">
                    Edit';

                    $btn3 = '<button type="button"    style="margin-left:10px"  onclick="selectid2(' . $row->id . ')"
                        class="btn btn-primary waves-effect waves-light" >
                    Activity

                        </button> ';
                    $btn2 = '<button type="button"  style="margin-left:10px"  data-panel-id="' . $row->id . '"   onclick="delete_ad(' . $row->id . ')"
                        class="btn btn-danger waves-effect waves-light"   data-toggle="modal" data-target="#">
                        Delete
                        </button>';
                    return  $btn . ' ' .$btn3 . ' ' . $btn2;
                })


                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin/users/app_user_list', compact('title'));
    }



    public function store(Request $request)

    {

        $this->validate($request, [
            'username'           => 'required|unique:users,username',
            'email'              => 'required|email|unique:users,email',
            'password'           => 'required',
            'roles'              => 'required',
            'profile_pic'        => 'required| mimes:jpeg,png,jpg,gif,JPEG |max:1024',
        ]);


        $input = $request->all();

        $user                     = new User;
        $user->username           = $request->username;
        $user->email              = $request->email;
        $user->password           = Hash::make($request->password) ?? Hash::make('admin12345');
        $user->email_verified_at  = date("Y-m-d h:i:sa");
        $user->status = $request->status;
        $user->save();
        $user->assignRole($request->input('roles'));


        $profile_uploaded_path = '';
        if ($user) {
            if ($request->hasFile('profile_pic')) {
                $uploadFolder = 'upload';
                $profile_pic = $request->file('profile_pic');
                $fileName = uniqid() . '_' . str_replace(' ', '_', $profile_pic->getClientOriginalName());
                $profile_uploaded_path = $profile_pic->storeAs($uploadFolder, $fileName, 'public');

                $user = User::find($user->id);
                $user->profile_pic = 'public/' . $profile_uploaded_path;
                $user->save();
            }
        }
        $user->status = 1;
        $user->profile_pic = 'public/' . $profile_uploaded_path;


        try {

            $this->successfullymessage('New User Created  successfully');
            return redirect()->back();
        } catch (\Exception $e) {

            $this->failmessage($e->getMessage());

            return redirect()->back();
        }
    }



    public function show($id)
    {

        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('admin/users/update_user', compact('user', 'roles', 'userRole'));
    }



    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'username' => 'required|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'roles' => 'required'
        ]);

        $input = $request->all();
        $user = User::find($id);

        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));

        if ($request->hasFile('profile_pic') != '') {

            $this->validate($request, [
                'profile_pic'        => 'required| mimes:jpeg,png,jpg,gif,JPEG |max:1024',
            ]);

            $ad_image = $request->file('profile_pic');
            $ad_image_name =  uniqid('ad_') . Str::random('10') . '.' . $ad_image->getClientOriginalExtension();
            $ad_image_resize = Image::make($ad_image->getRealPath());
            // $ad_image_resize->resize(200, 200);
            if ($ad_image->isValid()) {

                if (isset($user->profile_pic)) {
                    $files_old = $user->profile_pic;
                    if ($files_old) {
                        if (file_exists($files_old)) {
                            unlink($files_old);
                        }
                    }
                }

                $ad_image_resize->save(public_path('upload/' . $ad_image_name));
                $ad_image_path = 'public/upload/' . $ad_image_name;
                $input['profile_pic'] = $ad_image_path;

                // dd($input);
                $user->update($input);
            }
        } else if ($request->hasFile('profile_pic') == '') {

            $user->update($input);
        }

        try {
            $this->successfullymessage('User information  Update successfully ');
            return redirect()->back();
        } catch (\Exception $e) {

            $this->failmessage($e->getMessage());

            return redirect()->back();
        }
    }



    public function destroy($id)

    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
