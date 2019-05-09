<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecieptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reciepts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('enrollment_id')->unsigned();
            $table->integer('total_fee');
            $table->integer('fee_manager_id');
            $table->integer('balance');
            $table->integer('discount');
            $table->integer('paid_fee');
            $table->date('due_date');
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
        Schema::dropIfExists('reciepts');
    }
}
