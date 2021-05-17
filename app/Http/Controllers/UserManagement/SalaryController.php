<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\WebApiResponse;
use App\Models\Salary;
use Validator;
class SalaryController extends Controller
{

    /**
     * Display all  Salary range
     * @group Salary
     * @return \Illuminate\Http\Response
     * @response 200
     * {"status":"Success","message":"messages.success_show_all","code":200,"data":[{"id":1,"salary_range":"HKD0-HKD10000","status":1,"created_at":"2021-04-07T04:47:45.000000Z","updated_at":"2021-04-20T04:47:47.000000Z"},{"id":2,"salary_range":"HKD10000-HKD20000","status":1,"created_at":"2021-04-07T04:47:49.000000Z","updated_at":"2021-04-12T04:47:51.000000Z"},{"id":3,"salary_range":"HKD30000-HKD50000","status":1,"created_at":"2021-04-06T04:47:52.000000Z","updated_at":"2021-04-12T04:47:56.000000Z"},{"id":4,"salary_range":"HKD50000-HKD100000","status":1,"created_at":"2021-04-20T04:47:57.000000Z","updated_at":"2021-04-06T04:47:54.000000Z"},{"id":5,"salary_range":"HKD100000","status":1,"created_at":"2021-04-19T04:48:01.000000Z","updated_at":"2021-04-13T04:47:59.000000Z"}]}
     */
    public function index()
    {
        //
    }



    /**
     * Display List  Salary range
     * @group Salary
     * @return \Illuminate\Http\Response
     * @response 200
     * {"status":"Success","message":"messages.success_show_all","code":200,"data":[{"id":1,"salary_range":"HKD0-HKD10000","status":1,"created_at":"2021-04-07T04:47:45.000000Z","updated_at":"2021-04-20T04:47:47.000000Z"},{"id":2,"salary_range":"HKD10000-HKD20000","status":1,"created_at":"2021-04-07T04:47:49.000000Z","updated_at":"2021-04-12T04:47:51.000000Z"},{"id":3,"salary_range":"HKD30000-HKD50000","status":1,"created_at":"2021-04-06T04:47:52.000000Z","updated_at":"2021-04-12T04:47:56.000000Z"},{"id":4,"salary_range":"HKD50000-HKD100000","status":1,"created_at":"2021-04-20T04:47:57.000000Z","updated_at":"2021-04-06T04:47:54.000000Z"},{"id":5,"salary_range":"HKD100000","status":1,"created_at":"2021-04-19T04:48:01.000000Z","updated_at":"2021-04-13T04:47:59.000000Z"}]}
     */

    public function list()
    {
        try {
            $ranks = Salary::where('status',1)->get()->toArray();
            return WebApiResponse::success(200, $ranks, trans('messages.success_show_all'));

        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }





     /**
     * Create new Salary range
     * @group Salary
     * @bodyParam salary_range  string required Salary Range. Example: HKD0-HKD10000
     * @return \Illuminate\Http\Response
     * @response 200
     * {"status":"Success","message":"messages.success_created","code":200,"data":{"salary_range":"HKD0-HKD10000","status":1,"updated_at":"2021-04-20T22:25:36.000000Z","created_at":"2021-04-20T22:25:36.000000Z","id":1}}
     */

    public function store(Request $request)
    {
        

        $data = $request->validate( [
            'salary_range' => 'required|string|max:255',
        ]);

        $data['status']  = 1;
    
        $new_data =Salary::create($data);
        return WebApiResponse::success(200, $new_data->toArray(), trans('messages.success_created'));
    }

     /**
     * Display the specified Salary range
     * @group Salary
     * @param  \Illuminate\Http\Request  $request
     * @urlParam id required Id of Reference. Example: 1
     * @return \Illuminate\Http\Response
     * @response 200  {"status":"Success","message":"Salary Data Fund","code":200,"data":{"id":1,"salary_range":"HKD0-HKD10000","status":1,"created_at":"2021-04-20T22:25:36.000000Z","updated_at":"2021-04-20T22:25:36.000000Z"}}
     */

    public function show($id)
    {
        try {
            $salary = Salary::findOrFail($id);
            return WebApiResponse::success(200, $salary, 'Salary Data Fund');
        } catch (\Throwable $th) {
            $errors = $th->getMessage();
            return WebApiResponse::error(500, [$errors], 'Something Went Wrong');
        }
    }




   /**
     * Update the specified Salary range
     * @group Salary
     * @param  \Illuminate\Http\Request  $request
     * @urlParam id required Id of Reference. Example: 1
     * @bodyParam salary_range  string required User Name. Example: HKD0-HKD10000
     * @bodyParam status  string required User Name. Example: 1
     * @return \Illuminate\Http\Response
     * @response 200  {"status":"Success","message":"messages.success_update","code":201,"data":{"id":1,"salary_range":"HKD100-HKD10000","status":"1","created_at":"2021-04-20T22:25:36.000000Z","updated_at":"2021-04-20T22:29:15.000000Z"}}
    */
    public function update(Request $request, $id)
    {
        $data = $request->validate( [
            'salary_range' => 'required|string|max:255',
            'status'      => 'required'
        ]);

        $salary = Salary::findOrFail($id);

        try {
            $salary->update($request->all());
            $salary = $salary->toArray();
            return WebApiResponse::success(201, $salary, trans('messages.success_update'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(400, $errors = [], trans('messages.success_update_faild'));
        }
    }

    /**
     * Remove Specific the specified Salary range
     * @group Salary
     * @param  \Illuminate\Http\Request  $request
     * @urlParam id required Id of salary table. Example: 6
     * @return \Illuminate\Http\Response
     * @response 200 {"status":"Success","message":"messages.success_delete","code":200,"data":[]}
     */
    public function destroy($id)
    {
        try {
            $salary = Salary::find($id);
            $salary->delete();
            $salary = [];
            return WebApiResponse::success(200, $salary, trans('messages.success_delete'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(400, $errors = [], trans('messages.success_delete_faild'));
        }
    }
}
