<?php

namespace App\Http\Controllers\Usermanagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\WebApiResponse;
use App\Models\Industry;
class IndustryController extends Controller
{

    /**
     * Display All  Industry list
     * @group Industry
     * @return \Illuminate\Http\Response
     * @response 200
     * {"status":"Success","message":"messages.success_show_all","code":200,"data":[{"id":1,"name":"test 1","status":1,"created_at":"2021-04-12T08:54:09.000000Z","updated_at":"2021-04-15T08:57:32.000000Z"},{"id":2,"name":"test2","status":1,"created_at":"2021-04-12T08:57:26.000000Z","updated_at":"2021-04-21T08:57:36.000000Z"}]}
     */
    public function index()
    {
        //
    }


    /**
     * Display List  Industry list
     * @group Industry
     * @return \Illuminate\Http\Response
     * @response 200
     * {"status":"Success","message":"messages.success_show_all","code":200,"data":[{"id":1,"name":"test 1","status":1,"created_at":"2021-04-12T08:54:09.000000Z","updated_at":"2021-04-15T08:57:32.000000Z"},{"id":2,"name":"test2","status":1,"created_at":"2021-04-12T08:57:26.000000Z","updated_at":"2021-04-21T08:57:36.000000Z"}]}
     */


    public function list()
    {
        try {
            $ranks = Industry::where('status',1)->get()->toArray();
            return WebApiResponse::success(200, $ranks, trans('messages.success_show_all'));

        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }


    
     /**
     * Create new Industry
     * @group Industry
     * @bodyParam name  string required name. Example: Test1
     * @return \Illuminate\Http\Response
     * @response 200
     * {"status":"Success","message":"messages.success_created","code":200,"data":{"name":"test","status":1,"updated_at":"2021-04-20T23:17:29.000000Z","created_at":"2021-04-20T23:17:29.000000Z","id":1}}
     */

    public function store(Request $request)
    {
        
        $data = $request->validate( [
            'name' => 'required|string|max:255',
        ]);

        $data['status']  = 1;
    
        $new_data =Industry::create($data);
        return WebApiResponse::success(200, $new_data->toArray(), trans('messages.success_created'));
    }
    

    /**
     * Display the specified Industry
     * @group Industry
     * @param  \Illuminate\Http\Request  $request
     * @urlParam id required Id of Reference. Example: 1
     * @return \Illuminate\Http\Response
     * @response 200 {"status":"Success","message":"messages.success_created","code":200,"data":{"name":"test","status":1,"updated_at":"2021-04-20T23:17:29.000000Z","created_at":"2021-04-20T23:17:29.000000Z","id":1}}
     */
    public function show($id)
    {
        try {
            $industry = Industry::findOrFail($id);
            return WebApiResponse::success(200, $industry, 'industry Data Fund');
        } catch (\Throwable $th) {
            $errors = $th->getMessage();
            return WebApiResponse::error(500, [$errors], 'Something Went Wrong');
        }
    }



    /**
     * Update the specified Industry
     * @group Industry
     * @param  \Illuminate\Http\Request  $request
     * @urlParam id required Id of Reference. Example: 1
     * @bodyParam name string required User Name. Example: test1
     * @bodyParam status  string required User Name. Example: 1
     * @return \Illuminate\Http\Response
     * @response 200  {"status":"Success","message":"messages.success_update","code":201,"data":{"id":1,"name":"werew","status":"1","created_at":"2021-04-20T23:17:29.000000Z","updated_at":"2021-04-20T23:21:54.000000Z"}}
    */
    public function update(Request $request, $id)
    {
        $data = $request->validate( [
            'name' => 'required|string|max:255',
            'status'      => 'required'
        ]);

        $industry = Industry::findOrFail($id);

        try {

            $industry->update($request->all());
            $industry = $industry->toArray();
            return WebApiResponse::success(201, $industry, trans('messages.success_update'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(400, $errors = [], trans('messages.success_update_faild'));
        }
    }

    /**
     * Remove Specific the specified Industry
     * @group Salary
     * @param  \Illuminate\Http\Request  $request
     * @urlParam id required Id of salary table. Example: 6
     * @return \Illuminate\Http\Response
     * @response 200 {"status":"Success","message":"messages.success_delete","code":200,"data":[]}
     */
    public function destroy($id)
    {
        try {
            $industry = Industry::find($id);
            $industry->delete();
            $industry = [];
            return WebApiResponse::success(200, $industry, trans('messages.success_delete'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(400, $errors = [], trans('messages.success_delete_faild'));
        }
    }
}
