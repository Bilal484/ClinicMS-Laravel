<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientMedicalRecordsTabel extends Migration
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
            $table->date('DBR');
            $table->string('father_name');
            $table->string('roll_no');
            $table->string('class');
            $table->string('disease');
            $table->unsignedInteger('medicine_id'); // Use the same data type as the 'id' column in the 'medicines' table
            $table->text('medicine_description')->nullable();
            $table->integer('given_medicine');
            $table->timestamps();

            $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade');
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
