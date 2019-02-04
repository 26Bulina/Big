<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatezilecosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zilecos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nr_zile');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('user_id')->unsigned();
            $table->integer('tipconcediu_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tipconcediu_id')->references('id')->on('tipconcedius');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('zilecos');
    }
}
