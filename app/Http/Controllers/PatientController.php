<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    //show all patients
    public function index(){
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    //show single patient
    public function show($id){
        $patient = Patient::with(['invoices', 'prescriptions'])->where('patients_id', $id)->firstOrFail();
        
        return view('patients.show', compact('patient'));
    }

    //create a new patient
    public function store(Request $request){
        $validated = $request->validate([
            'patient_id' => 'required|unique:patients',
            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'address' => 'nullable'
        ]);

        Patient::create($validated);

        return redirect()->route('patients.index')->with('success', 'Patient added successfully');
    }
}
