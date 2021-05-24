<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('category_id');
            $table->string('title');
            $table->text('description');
            $table->integer('total_like')->nullable();
            $table->integer('total_bookmark')->nullable();
            $table->integer('total_share')->nullable();
            $table->integer('total_view')->nullable();
            $table->date('post_date');
            $table->text('image_path');
            $table->string('status')->comment('draft,pending,approved');
            $table->tinyInteger('published')->default(1);
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
        Schema::dropIfExists('articles');
    }
}
