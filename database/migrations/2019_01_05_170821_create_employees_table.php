<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('taked')->default(0);
            $table->string('first_name', 25);
            $table->string('last_name', 25);
            $table->integer('cnp');
            $table->integer('admin')->default(0);
            $table->text('address');
            $table->integer('personal_phone');
            $table->string('personal_email');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('superior_id');
            $table->string('photo');
            $table->integer('hours_norm')->default(8);

            $table->integer('job')->unsigned();
            $table->foreign('job')->references('id')->on('jobs');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}
