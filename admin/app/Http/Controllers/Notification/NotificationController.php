<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Device;
use App\Models\Notification;
use Illuminate\Support\Facades\Date;

class NotificationController extends Controller
{


    public function index()
    {

        $title   = 'Notification  for App User';
        $data    =  User::with('devices')->where('status', 1)->where('is_api', 0)->get();
        return view('admin/notification/push_notification', compact('title', 'data'));
    }


    public function store(Request $request)
    {

        if (!empty($request->user)) {
            foreach ($request->user as $value) {

                $url = 'https://fcm.googleapis.com/fcm/send';

                $FcmToken = Device::where('user_id',$value)->pluck('device_id')->all();

                $serverKey = 'AAAA-kt2o_U:APA91bHP1nbF3-v53ecinbDJjh1wq3PfcvGKWdnsujklPtPrlcSehMcgeGBMA3KIccw6FlGHltGV9fITepXEGkh4rHoDlFroVY18TyxH3s7WrDDsG8mo90u4ZoYOLJyAdmsVZbMoHHNU';

                $data = [
                    "registration_ids" => $FcmToken,
                    "notification" => [
                       // "user_id"=>$value,
                        "title" => $request->title,
                        "body" => $request->body,

                    ]
                ];
                $encodedData = json_encode($data);
                $notification =[
                    "user_id" => $value,
                    "title"   => $request->title,
                    "body"    =>  $request->body,
                    "is_read" => 0,
                    "created_at"=>  date('Y-m-d H:i:s')

                ];
                Notification::insert($notification);

                $headers = [
                    'Authorization:key=' . $serverKey,
                    'Content-Type: application/json',
                ];

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                // Disabling SSL Certificate support temporarly
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);

                // Execute post
                $result = curl_exec($ch);

                if ($result === FALSE) {
                    die('Curl failed: ' . curl_error($ch));
                }

                // Close connection
                curl_close($ch);

                // // FCM response
                // dd($result);
            }


            try {
                $this->successfullymessage(' Notification Send  Successfully ');
                return redirect()->back();
            } catch (\Exception $e) {
                $this->failmessage($e->getMessage());

                return redirect()->back('/about-us');
            }
        }
    }
}
