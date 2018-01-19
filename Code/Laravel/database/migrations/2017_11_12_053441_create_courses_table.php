<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('duration');
            $table->unsignedInteger('level');
            $table->string('location');
            $table->timestamps();
        });

        Schema::create('disciplines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('discipline');
            $table->timestamps();
        });

        Schema::create('course_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->unsigned();
            $table->integer('discipline_id')->unsigned();
            $table->integer('user_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // DB::table('course_details')->delete();
        // DB::table('courses')->delete();
        // DB::table('disciplines')->delete();
        Schema::dropIfExists('courses');
        Schema::dropIfExists('disciplines');
        Schema::dropIfExists('course_details');
    }
}
