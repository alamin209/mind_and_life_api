<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('category_id');
            $table->string('title');
            $table->string('type');
            $table->integer('total_download')->nullable();
            $table->boolean('is_lock')->nullable();
            $table->boolean('is_lock')->nullable();
            $table->text('video_path')->nullable();
            $table->text('youtube_link')->nullable();
            $table->integer('total_like')->nullable();
            $table->integer('total_bookmark')->nullable();
            $table->integer('total_share')->nullable();
            $table->integer('total_view')->nullable();
            $table->date('post_date')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('is_published')->default(0)->nullable();
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
        Schema::dropIfExists('videos');
    }
}
