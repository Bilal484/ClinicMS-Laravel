<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientMedicalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_medical_records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('DBR');
            $table->string('father_name');
            $table->string('roll_no');
            $table->string('class');
            $table->string('disease');
            $table->string('medicine_name');
            $table->text('medicine_description')->nullable();
            $table->integer('given_medicine');
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
        Schema::dropIfExists('patient_medical_records');
    }
}
