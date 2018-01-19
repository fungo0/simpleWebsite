<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->boolean('legit')->default(1);
        });

        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('nickname')->unique();
            $table->integer('age')->unsigned()->nullable();
            $table->string('gender');
            $table->string('DOB')->nullable();
            $table->string('mobile');
            $table->string('country');
            $table->string('icon')->default('XekkCOtG6mHDVx2qgh8ESWOC9uVSeTVNlmGS0UjI.jpeg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
        Schema::dropIfExists('user_profiles');
    }
}
