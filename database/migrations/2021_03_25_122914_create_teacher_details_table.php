<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lecture_name');
            $table->integer('gender_id');
            $table->integer('phone');
            $table->string('email');
            $table->string('address', 150);
            $table->integer('nationality_id');
            $table->date('dob');
            $table->integer('faculty_id');
            $table->integer('faculty_module_id');
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
        Schema::dropIfExists('teacher_details');
    }
}
