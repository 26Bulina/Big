<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatetasksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->text('body');
            $table->integer('pers_create')->unsigned();
            $table->integer('pers_assign')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->integer('priority_id')->unsigned();
            $table->integer('repository_id')->unsigned();
            $table->string('fisier');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('pers_create')->references('id')->on('users');
            $table->foreign('pers_assign')->references('id')->on('users');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('priority_id')->references('id')->on('priorities');
            $table->foreign('repository_id')->references('id')->on('repositories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}
