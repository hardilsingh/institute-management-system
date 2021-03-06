<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeeManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_managers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('enrollment_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->integer('total_fee')->nullable();
            $table->integer('paid_fee')->nullable();
            $table->integer('balance')->nullable();
            $table->integer('discounted_fee')->nullable();
            $table->integer('discount')->nullable();
            $table->date('due_date')->nullable();
            $table->timestamps();


            $table->foreign('enrollment_id')->references('id')->on('enrollments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fee_managers');
    }
}
