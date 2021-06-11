<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
use Illuminate\Support\Facades\Validator;
use App\Libraries\WebApiResponse;
class DeviceController extends Controller
{

    /**
     * Create Device for User Notification
     * @group  Device
     * @authenticated
     * @param  \Illuminate\Http\Request  $request
     * @bodyParam user_id  Integer required User Id. Example: 1
     * @bodyParam device_id  String required Device Id. Example: 1
     * @return \Illuminate\Http\Response
     * @response 200 {"status":"Success","message":"messages.success_created","code":200,"data":{"user_id":2,"device_id":"safdsfsd fsdf sfsd fsdfsdf","status":1,"updated_at":"2021-06-10T19:31:10.000000Z","created_at":"2021-06-10T19:31:10.000000Z","id":2}}
     */

    public function store(Request $request)
    {

        $data = $request->validate([
            'user_id'        => 'required | integer',
            'device_id'      => 'required | string',
        ]);

        $data['status']  = 1;
        $new_data = Device::create($data);

        if ($new_data) {
            return WebApiResponse::success(200, $new_data->toArray(), trans('messages.success_created'));
        } else {
            return WebApiResponse::error(404, $errors = [], 'Device Id Create fail');
        }
    }
}
