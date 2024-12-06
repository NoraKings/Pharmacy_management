<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function store(Request $request){
        $validated= $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'drug_id' => 'required|exists:drugs,id',
            'dosage' => 'required',
            'quantity' => 'required|integer|min:1',
            'instructions' => 'nullable',
        ]);

        Prescription::create($validated);

        return redirect()->route('patients.show', $request->patient_id)->with('success', 'Prescription added successfully!');
    }
}
