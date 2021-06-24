<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRelationQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_relation_quizzes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->integer('count_attempt');
            $table->bigInteger('quiz_id');
            $table->float('total_point');
            $table->float('previous_point');
            $table->integer('quiz_share');
            $table->integer('total_answered');
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
        Schema::dropIfExists('user_relation_quizzes');
    }
}
