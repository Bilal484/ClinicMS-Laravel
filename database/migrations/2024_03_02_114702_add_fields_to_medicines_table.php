<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicines', function (Blueprint $table) {
            //
            Schema::table('medicines', function (Blueprint $table) {
                $table->date('expire_date')->nullable();
                $table->decimal('price', 8, 2)->nullable();
                $table->date('issue_date')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicines', function (Blueprint $table) {
            //
            $table->dropColumn('expire_date');
            $table->dropColumn('price');
            $table->dropColumn('issue_date');
        });
    }
}
