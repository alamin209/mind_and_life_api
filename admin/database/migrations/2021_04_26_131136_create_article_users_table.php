<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_users', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('user_id');
            $table->bigInteger('article_id')->nullable();
            $table->BigInteger('video_id')->nullable();
            $table->integer('user_like')->nullable();
            $table->integer('user_bookmark')->nullable();
            $table->integer('user_share')->nullable();
            $table->boolean('is_read')->default(0);
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
        Schema::dropIfExists('article_users');
    }
}
