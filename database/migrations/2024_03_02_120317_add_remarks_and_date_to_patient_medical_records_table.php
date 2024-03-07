<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRemarksAndDateToPatientMedicalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_medical_records', function (Blueprint $table) {
            //
            $table->string('remarks')->nullable();
            $table->date('date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_medical_records', function (Blueprint $table) {
            //
            $table->dropColumn('remarks');
            $table->dropColumn('date');
        });
    }
}
