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

        Route::resource('category','Category\CategoryController');
        Route::resource('article-category','Category\ArticleCategoryController');
        Route::resource('video-category','Category\VideoCategoryController');



        Route::get('article/pending','Article\ArticleController@pending')->name('article.pending');
        Route::get('article/status/{id}','Article\ArticleController@status')->name('article.status');
        Route::resource('article','Article\ArticleController');
        Route::get('/article-image-delete', 'Article\ArticleController@articleImageDelete')->name('article-image.delete');

        Route::resource('advertisement','Advertisement\AdvertisementController');

        Route::get('video-pending','Video\VideoController@pending')->name('videos.pending');
        Route::resource('videos','Video\VideoController');

        Route::resource('coupon','Coupon\CouponController');
        Route::resource('point','Point\PointController');


        Route::resource('permission','Permission\PermissionController');
        Route::resource('roles', 'Permission\\RoleController');
        Route::resource('login-history','Usermanagement\LoginHistoryController');
        Route::get('/activity-history', 'Usermanagement\LoginHistoryController@allActivity')->name('activity-history');
        Route::get('{any}', 'QovexController@index');


    });
// }]);
