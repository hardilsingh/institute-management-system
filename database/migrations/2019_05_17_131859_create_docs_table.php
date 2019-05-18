<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('books');
            $table->string('id_card');
            $table->string('certificate');
            $table->bigInteger('enrollment_id')->unsigned();
            $table->string('course_id');
            $table->string('course_id_2')->nullable();
            
            $table->foreign('enrollment_id')->references('id')->on('enrollments')->onDelete('cascade');

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
        Schema::dropIfExists('docs');
    }
}
