<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientMedicineRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_medicine_records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('DBR');
            $table->string('name');
            $table->string('disease');
            $table->string('medicine_name');
            $table->text('medicine_description');
            $table->integer('given_medicine');
            $table->date('date');
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
        Schema::dropIfExists('patient_medicine_records');
    }
}
