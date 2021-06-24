<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Cache Clear
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
});


Route::get('notify-user','Usermanagement\UserController@notifyUser')->name('notify-user');

Route::get('/clear-permission-cache', function() {
    $exitCode = Artisan::call('permission:cache-reset');
    return 'Permission Cache Clear';
});

Route::get('/design/quotation', function () {
   // return redirect('/index');
   return view('design/quotation');
});
Route::get('/design/invoice', function () {
   // return redirect('/index');
   return view('design/invoice');
});

Route::get('/design/quotation', function () {
    // return redirect('/index');
    return view('design/quotation');
 });

Route::get('/', function () {
    return redirect('/index');
});

Auth::routes();

// Route::get('my-web', ['middleware' => ['checkIp'], function () {
Route::get('logout', 'QovexController@logout');

Route::get('pages-login', 'QovexController@index');
Route::get('pages-login-2', 'QovexController@index');
Route::get('pages-register', 'QovexController@index');
Route::get('pages-register-2', 'QovexController@index');
Route::get('pages-recoverpw', 'QovexController@index');
Route::get('pages-recoverpw-2', 'QovexController@index');
Route::get('pages-lock-screen', 'QovexController@index');
Route::get('pages-lock-screen-2', 'QovexController@index');
Route::get('pages-404', 'QovexController@index');
Route::get('pages-500', 'QovexController@index');
Route::get('pages-maintenance', 'QovexController@index');
Route::get('pages-maintenance', 'QovexController@index');
Route::get('pages-comingsoon', 'QovexController@index');
Route::post('login-status', 'QovexController@checkStatus');


 // You can also use auth middleware to prevent unauthenticated users
    Route::group(['middleware' => 'auth'], function () {




        Route::get('app-user','Usermanagement\UserController@appuser')->name('userlist.appuser');
        Route::resource('userlist','Usermanagement\UserController');

        Route::resource('quiz-type','Quiz\QuizTypeController');
        Route::resource('quiz','Quiz\QuizController');
        Route::resource('quiz-question','Quiz\QuizQuestionController');

        Route::resource('ip-addresslist','Ipaddress\IpAddressController');

        Route::resource('coupon-category','Category\CouponCategoryController');
        Route::resource('article-category','Category\ArticleCategoryController');
        Route::resource('video-category','Category\VideoCategoryController');



        Route::get('article/pending','Article\ArticleController@pending')->name('article.pending');
        Route::get('article/status/{id}','Article\ArticleController@status')->name('article.status');
        Route::resource('article','Article\ArticleController');
        Route::get('/article-image-delete', 'Article\ArticleController@articleImageDelete')->name('article-image.delete');

        Route::resource('advertisement','Advertisement\AdvertisementController');

        Route::get('video/status/{id}','Video\VideoController@status')->name('video.status');
        Route::get('video-pending','Video\VideoController@pending')->name('videos.pending');
        Route::resource('videos','Video\VideoController');

        Route::resource('coupon','Coupon\CouponController');
        Route::resource('point','Point\PointController');

        //=================occupation===========================//
        Route::resource('occupation','Occupation\OccupationController');


        ////////////////=================About US====================//////////
        Route::get('/about-us', 'Setting\SettingController@aboutus')->name('about-us');
        Route::get('/create-about-us', 'Setting\SettingController@createAboutUs')->name('createaboutus');
        Route::post('/store-about-us', 'Setting\SettingController@storeAboutUs')->name('store-about-us');
        Route::get('/show-about-us/{id}', 'Setting\SettingController@edit_about_us')->name('show-about-us');
        Route::post('/upadte-about-us/{id}', 'Setting\SettingController@updateAboutUs')->name('upadte-about-us');


           ////////////////=================Contact  US====================//////////
           Route::get('/contact-us', 'Setting\SettingController@contactUs')->name('contact-us');
           Route::get('/create-about-us', 'Setting\SettingController@createAboutUs')->name('createaboutus');
           Route::post('/store-about-us', 'Setting\SettingController@storeAboutUs')->name('store-about-us');
           Route::get('/show-about-us/{id}', 'Setting\SettingController@edit_about_us')->name('show-about-us');
           Route::post('/upadte-about-us/{id}', 'Setting\SettingController@updateAboutUs')->name('upadte-about-us');

        /////////////////=====================Event=======================///////////




        Route::resource('event','Event\EventController');



        //////////////////////////===============Notification ==================////////////////////////

        Route::resource('push-notifications',"Notification\NotificationController");

        Route::resource('permission','Permission\PermissionController');
        Route::resource('roles', 'Permission\RoleController');
        Route::resource('login-history','Usermanagement\LoginHistoryController');
        Route::get('/activity-history', 'Usermanagement\LoginHistoryController@allActivity')->name('activity-history');
        Route::get('{any}', 'QovexController@index');


    });
// }]);
