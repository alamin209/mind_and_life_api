<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventCategory;
use App\Libraries\WebApiResponse;
class EventCategoryController extends Controller
{
/**
     * Display Event  type   List
     * @group Event
     * @return \Illuminate\Http\Response
     * @response 200
     * {"status":"Success","message":"messages.success_show_all","code":200,"data":[{"id":1,"name":"Event Category Example","image_path":"public\/event-category\/qtype_60bbdeb2bad2bp9sKNdgLEQ.jpg","status":1,"created_at":"2021-06-21T22:20:48.000000Z","updated_at":"2021-06-29T22:20:48.000000Z"}]}
     */

    public function list()
    {

        $event_category = EventCategory::Where('status',1)->get()->toArray();
        try {
            return WebApiResponse::success(200, $event_category, trans('messages.success_show_all'));

        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }
}
