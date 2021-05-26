<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id');
            $table->string('heading');
            $table->longText('image_path');
            $table->longText('description');
            $table->string('offer_brand');
            $table->date('expire_date');
            $table->integer('download_limit');
            $table->integer('total_download');
            $table->float('price');
            $table->longText('term_condition');
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
        Schema::dropIfExists('coupons');
    }
}
