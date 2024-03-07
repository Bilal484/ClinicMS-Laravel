<?php

namespace App\Http\Controllers;

use App\Medicine;
use Carbon\Carbon;
// use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
// use Illuminate\Contracts\Logging\Log;
use App\PatientMedicalRecord;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PatientMedicalRecordController extends Controller
{
    public function index()
    {
        $patientMedicalRecords = PatientMedicalRecord::paginate(5);

        return view('patient_medical_record.index', compact('patientMedicalRecords'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        return view('patient_medical_record.create');
    }




    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'DBR' => 'required',
            'father_name' => 'required',
            'roll_no' => 'required',
            'class' => 'required',
            'disease' => 'required',
            'medicine_name' => 'required',
            'medicine_description' => 'nullable',
            'given_medicine' => 'required|integer|min:1',
        ]);
    
        // If the validation fails, redirect back to the previous page with the validation errors and the input data
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // If the validation passes, find the medicine record
        $medicine = Medicine::where('medicine_name', $request->input('medicine_name'))->first();
    
        if ($medicine) {
            $givenMedicine = $request->input('given_medicine');
    
            // Check if enough medicine quantity is available
            if ($medicine->quantity >= $givenMedicine) {
                // Create a new patient medical record
                $patientMedicalRecord = new PatientMedicalRecord();
                $patientMedicalRecord->name = $request->input('name');
                $patientMedicalRecord->DBR = $request->input('DBR');
                $patientMedicalRecord->father_name = $request->input('father_name');
                $patientMedicalRecord->roll_no = $request->input('roll_no');
                $patientMedicalRecord->class = $request->input('class');
                $patientMedicalRecord->disease = $request->input('disease');
                $patientMedicalRecord->medicine_name = $request->input('medicine_name');
                $patientMedicalRecord->medicine_description = $request->input('medicine_description');
                $patientMedicalRecord->given_medicine = $givenMedicine;
                $patientMedicalRecord->save();
    
                // Update the medicine quantity and remain_medicine
                $medicine->quantity -= $givenMedicine;
                $medicine->remain_medicine = $medicine->quantity;
                $medicine->save();
    
                return redirect()->route('patient_medical_record.index')->with('success', 'Patient medical record created successfully');
            } else {
                return redirect()->back()->with('error', 'Not enough medicine quantity available');
            }
        } else {
            return redirect()->back()->with('error', 'The medicine does not exist. Please try again.');
        }
    }








    public function edit($id)
    {
        $patientMedicalRecord = PatientMedicalRecord::find($id);
        return view('patient_medical_record.edit', compact('patientMedicalRecord'));
    }

    public function show($id)
    {
        $patientMedicalRecord = PatientMedicalRecord::find($id);
        return view('patient_medical_record.show', compact('patientMedicalRecord'));
    }

    public function update(Request $request, $id)
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
            'remarks' => 'nullable',
            'date' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->route('patient_medical_record.index')
                ->withErrors($validator)
                ->withInput();
        }

        $patientMedicalRecord = PatientMedicalRecord::find($id);

        // Calculate the difference in given_medicine
        $givenMedicineDiff = $request->input('given_medicine') - $patientMedicalRecord->given_medicine;

        // Update the PatientMedicalRecord
        $patientMedicalRecord->update($request->all());

        // Update the Medicine table
        $medicine = Medicine::where('medicine_name', $request->input('medicine_name'))->first();
        if ($medicine) {
            $medicine->given_medicine += $givenMedicineDiff;
            $medicine->remain_medicine -= $givenMedicineDiff;
            $medicine->save();
        }

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
