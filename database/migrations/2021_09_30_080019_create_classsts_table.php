<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classsts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('teacher_id');
            $table->string('student_id');
            $table->string('subject');
            $table->integer('starttime');
            $table->integer('endtime');
            $table->string('date');
            $table->string('status');
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
        Schema::dropIfExists('classsts');
    }
}
