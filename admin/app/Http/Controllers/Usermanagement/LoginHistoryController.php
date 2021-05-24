<?php

namespace App\Http\Controllers\Usermanagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoginHistory;
// use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Models\Activity;
class LoginHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $loginuserhistory =Loginhistory::with('user')->get();
        $title ='Login History   List';
        return view('admin/users/login_user_history',compact('loginuserhistory','title'));
    }

    public function allActivity()
    {

        $activity = Activity::with('user')->get();

        // dd( $activity );
        $title ='Activity History   List';
        return view('admin/users/activity_log_history',compact('activity','title'));
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
