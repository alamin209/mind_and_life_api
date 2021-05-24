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
    // User Management Routes
    Route::apiResource('users', UserController::class)->except(['store']);

    // ================ Category list =======================/

    Route::get('category/list', [CategoryController::class, 'list']);

   // ================ Article list =======================/
    Route::get('article-user-log/list', [ArticleUserlogController::class, 'list']);
    Route::post('article-user-log/store', [ArticleUserlogController::class, 'store']);

   // ================ video list =======================/
    Route::get('video-user-log/list', [VideUserLogController::class, 'list']);
    Route::post('video-user-log/store', [VideUserLogController::class, 'store']);

    // =================== Advertisement  route =====================//
    Route::get('advertisement/list', [AdvertisementController::class, 'list']);
    Route::apiResource('advertisement-log', AdvertisementLogController::class,);
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
});



Route::get('/verified-only', function (Request $request) {
})->middleware('auth:api', 'verified');
