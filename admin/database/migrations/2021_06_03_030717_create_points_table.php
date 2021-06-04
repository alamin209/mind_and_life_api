<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->float('referral_point')->nullable()->default(0);
            $table->float('article_share__point')->nullable()->default(0);
            $table->float('article_like_point')->nullable()->default(0);
            $table->float('article_bookmark_point')->nullable()->default(0);
            $table->float('article_read_point')->nullable()->default(0);
            $table->float('share_video_point')->nullable()->default(0);
            $table->float('video_like_point')->nullable()->default(0);
            $table->float('video_bookmark_point')->nullable()->default(0);
            $table->float('video_watch_point')->nullable()->default(0);
            $table->float('share_coupon_point')->nullable()->default(0);
            $table->float('download__coupon_point')->nullable()->default(0);
            $table->float('redeem_coupon_point')->nullable()->default(0);
            $table->float('share_quiz_point')->nullable()->default(0);
            $table->float('doing_quiz_point')->nullable()->default(0);
            $table->float('quiz_point')->nullable()->default(0);
            $table->float('daily_login_point')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('points');
    }
}
