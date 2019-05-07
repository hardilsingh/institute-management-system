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
            $table->integer('total_fee');
            $table->integer('paid_fee');
            $table->integer('balance');
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
