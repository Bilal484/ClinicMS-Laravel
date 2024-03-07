<?php

namespace App\Http\Controllers;

use App\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MedicineController extends Controller
{
    /**
     * descriptionplay a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines = Medicine::paginate(5);

        return view('medicine.index', compact('medicines'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicine.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'medicine_name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'expire_date' => 'required|date',
            'price' => 'required|numeric',
            'issue_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->route('medicine.index')
                ->withErrors($validator)
                ->withInput();
        }

        // Check if the medicine is already stored
        $medicine = Medicine::where('medicine_name', $request->input('medicine_name'))->first();

        if (!$medicine) {
            // If the medicine is not found, create a new record
            $medicine = new Medicine();
            $medicine->medicine_name = $request->input('medicine_name');
            $medicine->description = $request->input('description');
            $medicine->quantity = $request->input('quantity');
            $medicine->expire_date = $request->input('expire_date');
            $medicine->price = $request->input('price');
            $medicine->issue_date = $request->input('issue_date');
            $medicine->save();
        }

        return redirect()->route('medicine.index')
            ->with('success', 'Medicine created successfully');
    }




    /**
     * descriptionplay the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medicines = Medicine::find($id);
        return view('medicine.show', compact('medicines'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $medicines = Medicine::find($id);
        return view('medicine.edit', compact('medicines'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'medicine_name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'expire_date' => 'required|date',
            'price' => 'required|numeric',
            'issue_date' => 'required|date',
            'given_medicine' => 'required',
            'remain_medicine' => 'required',
        ]);

        // Calculate the difference in remain_medicine
        $remainMedicineDiff = $request->input('quantity') - $request->input('given_medicine');

        Medicine::find($id)->update([
            'medicine_name' => $request->input('medicine_name'),
            'description' => $request->input('description'),
            'quantity' => $request->input('quantity'),
            'expire_date' => $request->input('expire_date'),
            'price' => $request->input('price'),
            'issue_date' => $request->input('issue_date'),
            'given_medicine' => $request->input('given_medicine'),
            'remain_medicine' => $remainMedicineDiff,
        ]);

        return redirect()->route('medicine.index')
            ->with('success', 'Medicine updated successfully');
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Medicine::find($id)->delete();

        return redirect()->route('medicine.index')
            ->with('success', 'Medicine deleted successfully');
    }
}
