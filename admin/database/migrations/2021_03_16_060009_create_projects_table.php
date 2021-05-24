<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('client_id');
            // $table->bigInteger('vendor_id')->nullable();
            $table->bigInteger('fund_type_id');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->decimal('project_value', 12,2);
            $table->string('note')->nullable();
            $table->string('project_status'); // Not Started, In Progress, Halted, Abandoned, Completed
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('projects');
    }
}
