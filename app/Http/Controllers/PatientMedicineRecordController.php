<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PatientMedicalRecord;
use App\PatientMedicineRecord;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;

class PatientMedicineRecordController extends Controller
{


    public function index()
    {
        $patientMedicineRecords = PatientMedicineRecord::all();
        return view('patient_medicine_record.index', compact('patientMedicineRecords'));
    }




    public function show($dbr)
    {
        // Assuming you want to fetch the patient medicine record based on the DBR
        $patientMedicineRecord = PatientMedicineRecord::where('DBR', $dbr)->get();

        return view('patient_medicine_record.show', compact('patientMedicineRecord'));
    }


    // for pdf

    public function downloadPdf($dbr)
    {
        // Assuming you fetch the patient medicine record data here
        $patientMedicineRecord = PatientMedicineRecord::where('DBR', $dbr)->get();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $html = View::make('patient_medicine_record.pdf', compact('patientMedicineRecord'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream('patient_medicine_record.pdf');
    }
}
