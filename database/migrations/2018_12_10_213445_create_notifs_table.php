<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatenotifsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pers_create')->unsigned();
            $table->string('title')->default('Atentie');
            $table->text('body');
            $table->integer('modif_app', false, true);
            $table->integer('happy_team', false, true);
            $table->integer('work_team', false, true);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('pers_create')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notifs');
    }
}
