<?php

namespace App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Database\Eloquent\Model;

class PatientMedicalRecordController extends Controller
{
    //
    public function index()
    {
        $patientMedicalRecords = PatientMedicalRecord::latest()->paginate(5);
        return view('patient_medical_record.index', compact('patientMedicalRecords'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('patient_medical_record.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'DBR' => 'required',
            'father_name' => 'required',
            'roll_no' => 'required',
            'class' => 'required',
            'disease' => 'required',
            'medicine_name' => 'required',
            'medicine_description' => 'required',
            'given_medicine' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('patient_medical_record.index')
                ->withErrors($validator)
                ->withInput();
        }

        PatientMedicalRecord::create($request->all());

        return redirect()->route('patient_medical_record.index')
            ->with('success', 'Patient medical record created successfully');
    }

    public function edit($id)
    {
        $patientMedicalRecord = PatientMedicalRecord::find($id);
        return view('patient_medical_record.edit', compact('patientMedicalRecord'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
            'DBR' => 'required',
            'father_name' => 'required',
            'roll_no' => 'required',
            'class' => 'required',
            'disease' => 'required',
            'medicine_name' => 'required',
            'medicine_description' => 'required',
            'given_medicine' => 'required',
        ]);

        PatientMedicalRecord::find($id)->update($request->all());

        return redirect()->route('patient_medical_record.index')
            ->with('success', 'Patient medical record updated successfully');
    }

    public function destroy($id)
    {
        PatientMedicalRecord::find($id)->delete();

        return redirect()->route('patient_medical_record.index')
            ->with('success', 'Patient medical record deleted successfully');
    }
}
