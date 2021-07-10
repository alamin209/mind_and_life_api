<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\WebApiResponse;
use App\Models\CouponCategory;
use App\Models\QuizType;
use App\Models\EventCategory;
use App\Models\Coupon;
use App\Libraries\AdRecursionHelper;
use App\Models\Advertisement;
use DB;
class AllCategoryController extends Controller
{
    /**
     * Display List  ALl Category of Coupon,Event,Quiz list
     * @group Category
     * @return \Illuminate\Http\Response
     * @response 200
     * {"status":"Success","message":"messages.success_show_all","code":200,"data":{"coupon_category":[{"id":2,"name":"test Coupon","image_path":"public\/coupon-category\/qtype_60bbdf25604961bnNO5Av4e.jpg","status":1,"created_at":"2021-06-05T20:31:33.000000Z","updated_at":"2021-06-05T20:31:33.000000Z","coupons":[{"id":2,"category_id":2,"heading":"男女装植衫額外8折優惠","image_path":"public\/coupon\/ar_60bc334712cc8cUixhWEnoG.png","description":"<p>free food<\/p>","offer_brand":"rich brand","start_date":"2021-07-04","expire_date":"2021-07-01","download_limit":193,"total_like":null,"total_bookmark":null,"total_download":1,"total_redeemed":0,"price":"30%","total_shared":0,"total_view":1,"published_date":"2021-07-06","status":1,"term_condition":"<p>free food<\/p>","created_at":"2021-06-06T02:30:31.000000Z","updated_at":"2021-06-25T15:09:25.000000Z","coupon_tag":[{"id":4,"coupon_id":2,"quiz_id":null,"event_id":null,"tag_name":"王醫生","status":"1","created_at":"2021-07-06T16:19:32.000000Z","updated_at":"2021-07-21T16:19:34.000000Z"},{"id":11,"coupon_id":2,"quiz_id":null,"event_id":null,"tag_name":"旺角","status":"1","created_at":"2021-07-06T16:19:32.000000Z","updated_at":"2021-07-21T16:19:34.000000Z"},{"id":14,"coupon_id":2,"quiz_id":null,"event_id":null,"tag_name":"王醫生","status":"1","created_at":"2021-07-06T16:19:32.000000Z","updated_at":"2021-07-21T16:19:34.000000Z"}]}]},{"id":1,"name":"test Coupon category","image_path":"public\/article-category\/qtype_60bbdeb2bad2bp9sKNdgLEQ.jpg","status":1,"created_at":"2021-06-05T20:29:38.000000Z","updated_at":"2021-06-05T20:29:38.000000Z","coupons":[{"id":1,"category_id":1,"heading":"special item    20% off","image_path":"public\/coupon\/ar_60d0cd40b7fd6zEVKgBEq9m.jpg","description":"<p>優惠詳情<\/p>\r\n<p>*優惠期有效期由2020年6月15至8月31日為止。 優惠只適用於香港居民。<\/p>\r\n<p>如有查詢,請電郵至 info@xxx.com.hk 或致電+8 1234 1234.<\/p>\r\n<p>如何使用<\/p>\r\n<p>於香港杜莎夫人蠟像館正門售票處購票時出示有效 香港身份證即可享有此優惠。<\/p>\r\n<p>商戶條款及細則<\/p>\r\n<p>優惠須受香港杜莎夫人蠟像館成人門票之條款及細則 約束。詳情請按此。<\/p>\r\n<p>&lt;詳情請按此參閱&gt;<\/p>\r\n<p>內容由商戶提供。<\/p>","offer_brand":"8923269","start_date":"2021-06-29","expire_date":"2021-07-29","download_limit":20,"total_like":null,"total_bookmark":null,"total_download":1,"total_redeemed":0,"price":"30%","total_shared":0,"total_view":1,"published_date":"2021-07-13","status":1,"term_condition":"<p>一般條款及細則<\/p>\r\n<p>X<\/p>\r\n<p>1. 除特別聲明外,優惠推廣日期由2020年6月15日 至9月30日為止。<\/p>\r\n<p>2. 本活動所有產品、服務、諮詢及建議均由參與 景點提供並全權負責。香港旅遊發展局並非該等產 品及\/或服務、諮詢及建議之提供者,亦不對該等 產品及\/或服務、諮詢及建議作出任何陳述或保<\/p>\r\n<p>3. 本優惠只適用於香港居民,有需要時,參與景 點可要求訪客出示有效香港身份證件以作確認。 4. 所有優惠不可兌換現金或换其他貨品或折<\/p>\r\n<p>扣,並不設退換。<\/p>\r\n<p>5. 除特別列明外,優惠不可與參與景點之任何其 他推廣優惠、折扣\/特價產品、公價產品、禮券\/ 現金券、積分計劃、參與景點內部優惠同時使用。<\/p>\r\n<p>6. 優惠數量有限,先到先得。<\/p>\r\n<p>7. 如指定之優惠產品售完,參與景點將提供其他 等值或更高價值的優惠。<\/p>\r\n<p>8. 優惠並不適用於參與景點之特定日期(如適<\/p>\r\n<p>用)。詳情請向參與景點查詢。 9. 每位合資格的優惠使用者每次惠顧只可享優惠<\/p>\r\n<p>。<\/p>\r\n<p>12<\/p>\r\n<p>如何使用<\/p>\r\n<p>於香港杜莎夫人蠟像館正門售票處購票時出示有效的 香港身份證即可享有此優惠。<\/p>\r\n<p>商戶條款及細則<\/p>\r\n<p>優惠須受香港杜莎夫人蠟像信成人門票之條款及細則 約束,詳情請按此<\/p>","created_at":"2021-06-06T02:29:31.000000Z","updated_at":"2021-06-22T23:24:34.000000Z","coupon_tag":[{"id":3,"coupon_id":1,"quiz_id":null,"event_id":null,"tag_name":"王醫生","status":"1","created_at":"2021-07-14T16:19:28.000000Z","updated_at":"2021-07-21T16:19:30.000000Z"}]}]},{"id":1,"is_google":1,"add_sense_link":"http:\/\/localhost\/hongkong\/public\/advertisement\/cp_signature_608bef218fb79RyfYKDrTlU.jpg","ad_image_path":null,"total_clicks":null,"website_link":null,"status":1,"created_at":"2021-06-02T20:13:08.000000Z","updated_at":"2021-06-02T20:13:08.000000Z","is_ad":true}],"quiz_category":[],"event_category":[]}}
     */

    public function list(Request $request)
    {

        $queryParams = [
            'ss'         =>  $request->limit ?? 20,
            'sortBy'        =>  $request->sortBy ?? 'id',
            'orderBy'       =>  in_array($request->orderBy, ['ASC', 'DESC']) ? $request->orderBy : 'DESC',
        ];
        $whereClause = $request->whereClause ?? [];

        $advertises = Advertisement::inRandomOrder()->get()->toArray();
        $coupon_Category   =  CouponCategory::with('coupons', 'coupons.coupon_tag')
        ->where('status', 1)->orderBy($queryParams['sortBy'], $queryParams['orderBy'])
            ->where($whereClause)
            ->get()
            ->toArray();

            // $return = [];
            // $subCoupons  = array_chunk($coupon_Category, 5);
            // foreach ($subCoupons as $key => $value) {
            //     foreach ($value as $subKey => $subValue) {
            //         array_push($return, $subValue);
            //     }

            //     $ad_length = count($advertises);
            //     $ad = $advertises[AdRecursionHelper::recursion($key, $ad_length)];
            //     $ad['is_ad'] = true;
            //     array_push($return, $ad);
            // }

            // $coupon_Category = $return;




        $quiz_category       =  QuizType::with('quizzed', 'quizzed.quizzed_tag')->where('status', 1)
          ->orderBy($queryParams['sortBy'], $queryParams['orderBy'])
            ->where($whereClause)
            ->get()
            ->toArray();

            // $return_quiz = [];
            // $subQuizzed  = array_chunk($quiz_category, 5);

            // foreach ($subQuizzed as $key => $value) {
            //     foreach ($value as $subKey => $subValue) {
            //         array_push($return_quiz, $subValue);
            //     }

            //     $ad_length = count($advertises);
            //     $ad = $advertises[AdRecursionHelper::recursion($key, $ad_length)];
            //     $ad['is_ad'] = true;
            //     array_push($return, $ad);
            // }

            // $quiz_category = $return_quiz;



        $event_category     =  EventCategory::with('events', 'events.event_tag')->where('status', 1)
            ->orderBy($queryParams['sortBy'], $queryParams['orderBy'])
            ->where($whereClause)
            ->get()
            ->toArray();

            // $subvent  = array_chunk($event_category, 5);

            // $return_event = [];
            // foreach ($subvent as $key => $value) {
            //     foreach ($value as $subKey => $subValue) {
            //         array_push($return_event, $subValue);
            //     }

            //     $ad_length = count($advertises);
            //     $ad = $advertises[AdRecursionHelper::recursion($key, $ad_length)];
            //     $ad['is_ad'] = true;
            //     array_push($return, $ad);
            // }

            // $event_category = $return_event;




        $data = [
            'coupon_category'     => $coupon_Category,
            'quiz_category'       => $quiz_category,
            "event_category"      => $event_category

        ];
        try {
            return WebApiResponse::success(200, $data, trans('messages.success_show_all'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }

}
