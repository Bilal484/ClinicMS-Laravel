<?php

namespace App\Http\Controllers;

use App\Medicine;
use App\Models\Patient;
use App\PatientMedicine;
use Illuminate\Http\Request;

class PatientMedicineController extends Controller
{
    public function index()
    {
        $patientmedicines = PatientMedicine::with(['patient', 'medicine'])->latest()->paginate(5);

        return view('patientmedicines.index', compact('patientmedicines'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('patientmedicines.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required',
            'medicine_id' => 'required',
            'quantity_taken' => 'required',
            'time_taken' => 'required',
        ]);

        // Check if the patient already has data for the selected medicine
        $existingEntry = PatientMedicine::where('patient_id', $request->patient_id)
            ->where('medicine_id', $request->medicine_id)
            ->exists();

        if ($existingEntry) {
            return redirect()->back()->with('error', 'Patient already has data for this medicine.');
        }

        $medicine = Medicine::find($request->medicine_id);

        if ($medicine->quantity < $request->quantity_taken) {
            return redirect()->back()->with('error', 'Not enough medicine in stock.');
        }

        $medicine->quantity -= $request->quantity_taken;
        $medicine->save();

        PatientMedicine::create($request->all());

        return redirect()->route('patientmedicines.index')
            ->with('success', 'Data created successfully');
    }


    public function show($id)
    {
        $patientmedicine = PatientMedicine::with(['patient', 'medicine'])->find($id);
        return view('patientmedicines.show', compact('patientmedicine'));
    }

    public function edit($id)
    {
        $patientmedicine = PatientMedicine::find($id);
        return view('patientmedicines.edit', compact('patientmedicine'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required',
            'medicine_id' => 'required',
            'quantity_taken' => 'required',
            'time_taken' => 'required',
        ]);

        $medicine = Medicine::find($request->medicine_id);

        if ($medicine->quantity < $request->quantity_taken) {
            return redirect()->back()->with('error', 'Not enough medicine in stock.');
        }

        $medicine->quantity -= $request->quantity_taken;
        $medicine->save();

        PatientMedicine::find($id)->update($request->all());

        return redirect()->route('patientmedicines.index')
            ->with('success', 'Data updated successfully');
    }

    public function destroy($id)
    {
        PatientMedicine::find($id)->delete();

        return redirect()->route('patientmedicines.index')
            ->with('success', 'Data deleted successfully');
    }
}
