<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\VideUserLogController;
use App\Http\Controllers\Api\AdvertisementController;
use App\Http\Controllers\Api\AdvertisementLogController;
use App\Http\Controllers\Api\ArticleUserlogController;
use App\Http\Controllers\Api\VerificationController;
use App\Http\Controllers\Api\ResetPasswordController;
use App\Http\Controllers\UserManagement\UserController;
use App\Http\Controllers\UserManagement\SalaryController;
use App\Http\Controllers\UserManagement\IndustryController;
use App\Http\Controllers\Api\VideController;
use App\Http\Controllers\Api\ArticleTagController;
use App\Http\Controllers\Api\OccupationController;
use App\Http\Controllers\Api\CouponCategoryController;
use App\Http\Controllers\Api\CouponController;
use App\Http\Controllers\Api\QuizTypeController;
use App\Http\Controllers\Api\QuizController;
use App\Http\Controllers\Api\PointController;
use App\Http\Controllers\Api\CouponUserlogController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\DeviceController;
use App\Http\Controllers\Api\UserQuizLogController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\AllCategoryController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\EventCategoryController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login']);
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('me', [AuthController::class, 'user']);
    Route::post('logout', [AuthController::class, 'logOut']);

    // Route::post('/change', [AuthController::class, 'login']);
    Route::post('change-password', [AuthController::class, 'changePassword'])->name('changePassword');

    // ===============User Management Routes=========================
    Route::post('video-user-log/store', [VideUserLogController::class, 'store']);
    Route::post('user-occupation', [UserController::class, 'user_occupation']);
    Route::apiResource('users', UserController::class)->except(['store']);


    // ================ Category list =======================/
    Route::post('user-category-log', [CategoryController::class, 'user_category_log']);



     // ================ Article list =======================/
     Route::get('article-user-log/list', [ArticleUserlogController::class, 'list']);
     Route::post('article-user-log/store', [ArticleUserlogController::class, 'store']);

      Route::get('article-user-bookmark-log/list', [ArticleUserlogController::class, 'book_mark_list']);

      Route::get('video-user-bookmark-log/list', [VideUserLogController::class, 'book_mark_list']);


    // ================ video list =======================/
    Route::get('video-user-log/list', [VideUserLogController::class, 'list']);
    Route::post('video-user-log/store', [VideUserLogController::class, 'store']);

    // =================== Advertisement  route =====================//
    Route::get('advertisement/list', [AdvertisementController::class, 'list']);
    Route::apiResource('advertisement-log', AdvertisementLogController::class);

    // =================== Coupon User log  route =====================//

    Route::apiResource('coupon-user-log', CouponUserlogController::class);



    // =================== article  Comment =====================//
    Route::apiResource('comments', CommentController::class);

    // =================== User Quiz   Comment =====================//
    Route::get('user-quiz-log', [UserQuizLogController::class, 'index']);
    Route::post('user-quiz-log', [UserQuizLogController::class, 'store']);

     ////////////..............User Notification List..............////////////////////////
     Route::get('use-notifications/list', [ NotificationController::class, 'list']);
     Route::post('use-notifications-log/{id}', [ NotificationController::class, 'update']);


});

Route::group(['middleware' => 'api'], function () {

    Route::post('user/store', [UserController::class, 'store'])->name('users.store');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
    Route::post('/password/reset', [ResetPasswordController::class, 'reset']);
    Route::post('/verify_token/{hash}', [ResetPasswordController::class, 'verify_token']);
    Route::get('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');

    // =================== Salary  route =====================//
    Route::get('salary/list', [SalaryController::class, 'list']);
    Route::apiResource('salary', SalaryController::class);

    // =================== Industry  route =====================//
    Route::get('industry/list', [IndustryController::class, 'list']);
    Route::apiResource('industry', IndustryController::class);


    Route::get('coupon-category/list', [CouponCategory::class, 'list']);

    // =================== Category  route =====================//

    Route::get('category/list', [CategoryController::class, 'list']);
    Route::get('all-category/list', [CategoryController::class, 'article_video_category']);

    // =================== article  route =====================//
    Route::get('article/list', [ArticleController::class, 'list']);
    Route::get('all_article/list', [ArticleController::class, 'video_article_list']);
    Route::apiResource('article', ArticleController::class);




    // =================== video  route =====================//
    Route::get('videos/list', [VideController::class, 'list']);
    Route::apiResource('videos', VideController::class);

    // =================== video Tag  route =====================//
    Route::get('article-tag/list', [ArticleTagController::class, 'article_list']);
    Route::get('video-tag/list', [ArticleTagController::class, 'video_list']);
    Route::get('article-video-tag/list', [ArticleTagController::class, 'video_article_tag_list']);


    //======================= Coupon ======================//
    Route::get('coupon-category/list', [CouponCategoryController::class, 'list']);

    //======================= Occupation ======================//
    Route::get('occupation/list', [OccupationController::class, 'list']);


    //======================= coupon ======================//



    Route::get('coupon/list', [CouponController::class, 'list']);


    //======================= quiz ======================//
    Route::get('quiz-type/list', [QuizTypeController::class, 'list']);

    Route::get('quiz/list', [QuizController::class, 'list']);

    Route::get('questions/list', [QuizController::class, 'list']);

    Route::get('questions/list/{id}', [QuizController::class, 'quiz_questions']);

    Route::get('point/list', [PointController::class, 'list']);

    //..............divide token.........................//

    Route::post('device', [DeviceController::class, 'store']);

    Route::get('device/list', [DeviceController::class, 'list']);


    //////////.................about Us................//////////
    Route::get('about-us', [SettingController::class, 'aboutUs']);

    ///////////////////................all Category=>coupon,Event,Quiz............//////////
    Route::get('coupon-event-quiz-category/list', [AllCategoryController::class, 'list']);

    ////////////..............Event Category..............////////////////////////
    Route::get('event-category/list', [EventCategoryController::class, 'list']);

     ////////////..............User Coupon download ..............////////////////////////

     Route::get('user-coupon_download/{id}', [CouponController::class, 'download_coupon']);


});



Route::get('/verified-only', function (Request $request) {
})->middleware('auth:api', 'verified');
