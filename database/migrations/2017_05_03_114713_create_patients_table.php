<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('DBR');
            $table->string('first_name');
            $table->string('father_name');
            $table->integer('age');
            $table->string('class');
            $table->string('any_disease')->nullable();
            $table->enum('gender', array('Male', 'Female', 'Other'));
            $table->string('issue_date')->nullable();
            $table->string('location')->nullable();
            $table->enum('blood_group', array('A+', 'A-', 'B+', 'AB+', 'AB-', 'B-', 'O+', 'O-'))->nullable();
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
        Schema::dropIfExists('patients');
    }
}
