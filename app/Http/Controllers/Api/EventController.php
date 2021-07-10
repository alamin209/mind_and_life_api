<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Libraries\WebApiResponse;
class EventController extends Controller
{

   /**
     * Display   Event   list
     * @group Event
     * @return \Illuminate\Http\Response
     * @response 200
     *{"status":"Success","message":"messages.success_show_all","code":200,"data":[{"id":1,"name":"瑜伽x減壓」 心理健康工作坊","total_like":2,"total_bookmark":0,"total_view":0,"total_share":0,"total_sing_up":5,"seat_limit":20,"title":"瑜伽x減壓」 心理健康工作坊","event_category_id":1,"event_date":"2021-07-07","event_time":"7:30-8.30 PM","image_path":"public\/event-category\/qtype_60bbdeb2bad2bp9sKNdgLEQ.jpg","publish_date":"2021-07-13","event_details":"地點:九龍彌敦道570號基利商業大廈6樓全層\r\n(近油\r\n麻地港鐵站A2出口)\r\n出席者需戴上口罩方可參加","objection":"16歲以上,無嚴重傷患人士","payment_method_detail":"1. 填妥下方報名表格,並以 信用卡 或 Paypal帳戶付\r\n款;或\r\n2. 以銀行轉賬\/入數方式付款,請先按此或","status":1,"created_at":"2021-07-27T02:28:39.000000Z","updated_at":"2021-07-20T02:28:39.000000Z","event_category":{"id":1,"name":"最新活動","image_path":"public\/event-category\/qtype_60bbdeb2bad2bp9sKNdgLEQ.jpg","status":1,"created_at":"2021-06-21T22:20:48.000000Z","updated_at":"2021-06-29T22:20:48.000000Z"}}]}
     */

    public function list()
    {

        try {
            $category = Event::with('event_category')->where('status', 1)->get()->toArray();
            return WebApiResponse::success(200, $category, trans('messages.success_show_all'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }


}
