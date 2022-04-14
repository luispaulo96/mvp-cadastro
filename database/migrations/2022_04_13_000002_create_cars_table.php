<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_cars', function (Blueprint $table) {
            $table->id('pk_cars');

            $table->string('ds_model', 100);
            $table->integer('nu_year');
            $table->string('ds_color', 50);
            $table->unsignedBigInteger('fk_users');

            $table->foreign('fk_users')->references('pk_users')->on('tb_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_cars');
    }
}
