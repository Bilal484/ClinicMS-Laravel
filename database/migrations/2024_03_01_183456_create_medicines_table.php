<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('medicines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('medicine_name');
            $table->text('description');
            $table->integer('quantity');
            $table->integer('given_medicine')->default(0);
            $table->integer('remain_medicine')->default(0);
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
        //
        Schema::dropIfExists('medicines');
    }
}
