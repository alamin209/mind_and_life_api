<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\AdvertisementLog;
use App\Libraries\WebApiResponse;
class AdvertisementLogController extends Controller
{
     /**
     * Create New User Advertise  Log
     * @group User Advertise Log
     * @param  \Illuminate\Http\Request  $request
     * @bodyParam user_id  Integer required User Id. Example: 1
     * @bodyParam advertisement_id  Integer required Advertisement Id. Example: 1
     * @bodyParam user_click  Integer required Click . Example: 1
     * @return \Illuminate\Http\Response
     * @response 200 {"status":"Success","message":"User advertisement Count Successfully ","code":201,"data":{"id":1,"username":"alamin","email":"alamin@gmail.com","sex":"Male","industry_id":"1","salary_range_id":"1","referral_code":"2023","access_token":{"access_token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZjRmMDFiZTkzMmMzYTRjZmZkODEzYTdlYjUyNTVmYWY4NDZhODFkY2M0YjM2M2YwOWY4YjBjNGYyNDhlM2M0YzAxZWE5MjIyOTI5YmNiMzUiLCJpYXQiOiIxNjE4MjYwNjU2LjgxMDg4MiIsIm5iZiI6IjE2MTgyNjA2NTYuODEwODg1IiwiZXhwIjoiMTYxODM0NzA1Ni42NTg2MTQiLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.j7M_KXyMJMIK2yRgVNSMggUZVIOjF3XU6MVqzisKrixDBTMapQpWkW0L5VQZF20MRjKjgjBfYVxQJyMrbSA-fRPZWm3NhtUaYhGEH_rBEFLV5TDnBH2aZ8uaFt4Vud4fIplyqKKzLkASUzNK-OJSTE9qR0tIRSt08AwuOTGxmdp4e5kSDZdYp0nwSag00khOeJeamCbAmM514Xtv7qtYVzS2kUvUsH3bVNqJA0fvuD0Yx3Jc6kFY8EIdVKzNfiIT44RG0DUIh7lxGKEF9SAd-hn5IB30WaxPB6XgvNtLuNRKidsQEN7FcZA-dOy14v74D1W78z7ZNq4CInLndWOcuBwXQvwNtNGK2dSHtrnZpy__V7X25BdUUQd8EN1oz-YF0B_HilO_kSbElYaA0jg-XMXQLCnHH59B1t7Yl49O2i3F8I9rqWxN4--KGvhzzQSFj_zXySqwXx6gg4TIpASm3ciFkQnhq6fOjsTmsp-4dwBK7W88Ey6JGmwPeTyPi5vucwBTG11xB0pNo4MCQ-G5Yx-5ApKy_FeY1hg2csBLOZR2Z6vXJvQ8id1XksbQwTJWOjlFskmbt_cqnLnvkCq6ZBiH-N2igCsSKQvS-JHI6Sl7Co-FnNpIbURnrKBX8WNsncHQ2-CSHw4PLsKo61zEZdoEVZURZSACNJXeqvbqGJU","token_type":"Bearer","expires_at":"2021-04-13 20:50:56"},"profile_pic":"public\/upload\/6074b2b0be1a4_1611049331368.JPEG","created_at":"2021-04-12T20:50:56.000000Z","updated_at":"2021-04-12T20:50:56.000000Z"}}
    */

    public function store(Request $request)
    {

        $data = $request->validate( [
            'user_id'              => 'required|integer',
            'advertisement_id'     => 'required|integer',
            'user_click'           => 'nullable | integer',

        ]);

          $advertisement = Advertisement::find($request->advertisement_id);


                $advertisement_log = AdvertisementLog::where('user_id',$request->user_id)->where('advertisement_id',$request->advertisement_id)->first();



                if(!$advertisement_log){

                    // dd($advertisement_user);
                    $new_total_like = $advertisement->total_clicks + $request->user_click;
                    $advertisement->total_clicks = $new_total_like;
                    $advertisement->save();


                    $advertisement_new_log                    = new AdvertisementLog();
                    $advertisement_new_log->user_id           = $request->user_id;
                    $advertisement_new_log->advertisement_id  = $request->advertisement_id;
                    $advertisement_new_log->user_click        = $request->user_click;
                    $advertisement_new_log->save();

                }elseif($advertisement_log->user_click){

                    $advertisement_log->user_click      = $advertisement_log->user_click + $request->user_click;
                    $advertisement_log->save();
                }
             return WebApiResponse::success(201, $advertisement_log, 'advertisement log');

     }
}
