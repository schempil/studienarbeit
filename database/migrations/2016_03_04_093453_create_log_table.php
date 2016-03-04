<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('device_id')->unsigned()->nullable();
            $table->integer('person_id')->unsigned()->nullable();
            $table->string('type')->nullable();
            $table->text('comment')->nullable();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('device_id')->references('id')->on('devices');
            $table->foreign('person_id')->references('id')->on('people');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('logs');
    }
}
