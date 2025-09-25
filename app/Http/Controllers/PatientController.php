<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    //show all patients
    public function index(Request $request)
        {
            // Build the query dynamically
            $query = Patient::query();

            // If a patient_id is provided, filter results
            if ($request->filled('patient_id')) {
                $query->where('patient_id', $request->patient_id);
            }

            // Paginate results
            $patients = $query->paginate(10);

            // Keep search term in pagination links
            $patients->appends($request->only('patient_id'));

            return view('patients.index', compact('patients'));
        }


    //show single patient
    public function show($id){
        $patient = Patient::with(['invoices', 'prescriptions'])->where('patients_id', $id)->firstOrFail();
        
        return view('patients.show', compact('patient'));
    }

    public function create(){
        return view('patients.create');
    }
    //create a new patient
    public function store(Request $request){
        $validated = $request->validate([
            'patient_id' => 'required|unique:patients',
            'file_no' => 'nullable|unique:patients',
            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'type' => 'required|in:general,staff,amenity',
        ]);

        Patient::create($validated);

        session()->flash('success', 'Patient created successfully!');
        return redirect()->route('patients.index');
    }

    public function update(Request $request, Patient $patient){
        $validated = $request->validate([
            'patient_id' => 'required|unique:patients',
            'file_no' => 'nullable|unique:patients',
            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
             'type' => 'required|in:general,staff,amenity',
        ]);

        $patient = Patient::where('patient_id', $request->patient_id)->firstOrFail();
        $patient->update($validated);

        session()->flash('success', 'Patient updated successfully!');
        return redirect()->route('patients.index');
    }

    public function destroy(Patient $patient){
        $patient->delete();
        session()->flash('success', 'Patient deleted successfully!');
        return redirect()->route('patients.index');
    }
}
