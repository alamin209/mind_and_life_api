<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('quiz_type_id');
            $table->longText('heading')->nullable();
            $table->longText('description')->nullable();
            $table->string('image_path')->nullable();
            $table->integer('total_view')->nullable();
            $table->integer('tota_share')->nullable();
            $table->integer('total_download')->nullable();
            $table->integer('total_point')->nullable();
            $table->integer('total_question')->nullable();
            $table->integer('total_min')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('question_ready')->default(1);
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
        Schema::dropIfExists('quizzes');
    }
}
