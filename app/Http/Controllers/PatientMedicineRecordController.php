<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PatientMedicalRecord;
use App\PatientMedicineRecord;

class PatientMedicineRecordController extends Controller
{

    public function index(Request $request)
    {
        // $dbr = $request->input('dbr'); // Assuming the input field is named 'dbr' in your form

        // $patientMedicineRecords = PatientMedicalRecord::where('DBR', $dbr)->get();

        return view('patient_medicine_record.index');
    }
}
