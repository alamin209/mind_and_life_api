<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->string('profile_pic')->nullable();
            $table->string('sex')->nullable();
            $table->bigInteger('industry_id')->nullable();
            $table->bigInteger('salary_range_id')->nullable();
            $table->bigInteger('salary_range_id')->nullable();
            $table->string('referral_code')->nullable();
            $table->string('user_type')->nullable();
            $table->string('is_api')->nullable();
            $table->bigInteger('occupation_id');
            $table->tinyInteger('status')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
