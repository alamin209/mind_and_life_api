<?php

namespace App\Http\Controllers\Usermanagement;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
Use \Carbon\Carbon;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\ModelHasRoles;
use DB;
class UserController extends Controller
{

    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        $roles = Role::get(['id','name']);
        $title = 'User  List';
        return view('admin/users/userlist',compact('title','data','roles'))
         ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function store(Request $request)

    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'roles' => 'required'
        ]);

        $input = $request->all();

        $user = new User;
        $user->name  = $request->name;
        $user->email  = $request->email;
        $user->password = Hash::make($request->password) ?? Hash::make('admin12345');
        $user->email_verified_at  =date("Y-m-d h:i:sa");
        $user->status =$request->status;
        $user->save();
        $user->assignRole($request->input('roles'));

        try {

            $this->successfullymessage('New User Created  successfully');
            return redirect()->back();
        }
        catch (\Exception $e) {

          $this->failmessage($e->getMessage());

             return redirect()->back();
        }


    }



    public function show($id)
    {

        $user = User::findOrFail($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('admin/users/update_user',compact('user','roles','userRole'));

    }

    public function update(Request $request, $id)

    {
         $this->validate($request, [

            'name' => 'required',

            'email' => 'required|email|unique:users,email,'.$id,

            'roles' => 'required'
        ]);

        $input = $request->all();
         $user = User::find($id);
         $user->update($input);
         DB::table('model_has_roles')->where('model_id',$id)->delete();
         $user->assignRole($request->input('roles'));
        try {
             $this->successfullymessage('User information  Update successfully ');
             return redirect()->back();
        }
        catch (\Exception $e) {

          $this->failmessage($e->getMessage());

             return redirect()->back();
        }

    }


    public function destroy($id)

    {
        User::find($id)->delete();
        return redirect()->route('users.index')
       ->with('success','User deleted successfully');
    }


}
