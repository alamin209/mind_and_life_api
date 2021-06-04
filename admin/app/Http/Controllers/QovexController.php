<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LoginHistory;
use App\User;
class QovexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(view()->exists($request->path())){

            $total_user = User::where('is_api',0)->count();

            return view($request->path(),compact('total_user'));
        }
        return view('pages-404');
    }

    public function authPages(Request $request) {
        if(view()->exists('auth.'.$request->path())){
            return view('auth.'.$request->path());
        }
        return view('pages-404');
    }

    public function checkStatus(){
        if(!Auth::check()) {
            return abort(404);
        }
        return false;
    }

    public function logout(){

        $id = Auth::user()->id;
        $loginhistory  = new LoginHistory;
        $loginhistory->user_id    = $id;
        $loginhistory->ip_address   =  request()->ip();
        $loginhistory->status      ='4';
        $loginhistory->login_time = date("Y-m-d H:i:s");
        $loginhistory->save();

        Auth::logout();
        return redirect('/login');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
