<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\WebApiResponse;
use App\Models\AboutUs;
use App\Models\Permission;
use DB;
class SettingController extends Controller
{



     /**
     * Display  About Us
     * @group Setting
     * @return \Illuminate\Http\Response
     * @response 200
     *{"status":"Success","message":"messages.success_show_all","code":200,"data":[{"id":4,"title":"心活誌 Mind & Life","description":"<p>《Mind &amp; Life 心活誌》<\/p>\r\n<p>《Mind &amp; Life 心活誌》是香港首本以心理學為主題的生活 月刊,由心活傳媒集團出版,於2014年11月3日創刊,並發展 成為將生活文化及心理資訊结合的媒體品牌。<\/p>\r\n<p>《Mind &amp; Life 心活誌》,透過月刊、影片頻道,以及專題 活動,以心理學角度剖析生活大小事,助都市人正視「心理<\/p>\r\n<p>亞健康」,在浮華中重遇身心靈的綠洲。<\/p>\r\n<p>每月港鐵站派發<\/p>\r\n<p>每月首個星期五,下午5:00至8:00,亦會於以下地點派發<\/p>\r\n<p>(如遇公眾假期則順延一星期)<\/p>\r\n<p>香港:銅鑼灣(港鐵站D出口,崇光百貨正門外)<\/p>\r\n<p>、中環<\/p>\r\n<p>(港鐵站A出口來往交易廣場天橋)<\/p>\r\n<p>九龍:旺角(港鐵站B3出口來往新世紀廣場天橋)、紅磡 (港鐵站D出口來往尖東天橋)<\/p>\r\n<p>新界:沙田(港鐵站B出口,近公共運輸交匯處)<\/p>\r\n<p>取開點\/睇驗點<\/p>\r\n<p>《Mind &amp; Life 心活誌》於每月3日出版,<\/p>","term_condition":null,"image_path":"public\/settings\/about_60ca4fbf3c382P59k2aiNN2.jpg","created_at":"2021-06-16T19:23:43.000000Z","updated_at":"2021-06-16T19:42:55.000000Z"}]}
     */

    public function all_about_us( Request $request )
    {

        $language = 'zh-ch';

        if ($request->language == 'en') {
            $language = 'en';
        }

        if ($request->language == 'zh-tw') {
            $language = 'zh-tw';
        }

     $about = Permission::where('name','about-us')->first();

    return $about->language_json[0]['list_si'];

    //    //$about_decoded= json_decode($about ,true);
    //     return $about_decoded = $array = (array) $about ;


    //         foreach($about_decoded[0] as $vale){
    //             echo $vale[0];
    //             //echo();
    //         }

        // try {

        //     return WebApiResponse::success(200, $aboutus, trans('messages.success_show_all'));
        // } catch (\Throwable $th) {
        //     return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        // }
    }


    /**
     * Display  About Us
     * @group Setting
     * @return \Illuminate\Http\Response
     * @response 200
     *{"status":"Success","message":"messages.success_show_all","code":200,"data":[{"id":4,"title":"心活誌 Mind & Life","description":"<p>《Mind &amp; Life 心活誌》<\/p>\r\n<p>《Mind &amp; Life 心活誌》是香港首本以心理學為主題的生活 月刊,由心活傳媒集團出版,於2014年11月3日創刊,並發展 成為將生活文化及心理資訊结合的媒體品牌。<\/p>\r\n<p>《Mind &amp; Life 心活誌》,透過月刊、影片頻道,以及專題 活動,以心理學角度剖析生活大小事,助都市人正視「心理<\/p>\r\n<p>亞健康」,在浮華中重遇身心靈的綠洲。<\/p>\r\n<p>每月港鐵站派發<\/p>\r\n<p>每月首個星期五,下午5:00至8:00,亦會於以下地點派發<\/p>\r\n<p>(如遇公眾假期則順延一星期)<\/p>\r\n<p>香港:銅鑼灣(港鐵站D出口,崇光百貨正門外)<\/p>\r\n<p>、中環<\/p>\r\n<p>(港鐵站A出口來往交易廣場天橋)<\/p>\r\n<p>九龍:旺角(港鐵站B3出口來往新世紀廣場天橋)、紅磡 (港鐵站D出口來往尖東天橋)<\/p>\r\n<p>新界:沙田(港鐵站B出口,近公共運輸交匯處)<\/p>\r\n<p>取開點\/睇驗點<\/p>\r\n<p>《Mind &amp; Life 心活誌》於每月3日出版,<\/p>","term_condition":null,"image_path":"public\/settings\/about_60ca4fbf3c382P59k2aiNN2.jpg","created_at":"2021-06-16T19:23:43.000000Z","updated_at":"2021-06-16T19:42:55.000000Z"}]}
     */

    public function aboutUs()
    {



        try {
            $aboutus = AboutUs::get();
            return WebApiResponse::success(200, $aboutus, trans('messages.success_show_all'));
        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [], trans('messages.faild_show_all'));
        }
    }


}
