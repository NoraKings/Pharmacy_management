<?php

namespace App\Http\Controllers;
use App\Models\Drug;
use App\Models\MarkupCode;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    //show all drugs
    public function index (){
        $drugs = Drug::paginate(5);

        return view('drugs.index', compact('drugs'));
    }
    // Show single drug
    public function show($id){
        $drug = Drug::with('markupCode')->findOrFail($id); //find drug or throw a 404 error

        
        return view('drugs.show', [
            'drug' => $drug,
            'prices' => [
                'general' => $drug->calculatePrice('general'),
                'staff' => $drug->calculatePrice('staff'),
                'amenity' => $drug->calculatePrice('amenity'),
                'student' => $drug->calculatePrice('student'),
            ],
        ]);
    }

    //create a drug
    public function create() {

        $markupCodes = MarkupCode::all(); //fetch all markupcodes
        return view('drugs.create', compact('markupCodes'));
    }

    //store a newly created drug
    public function store(Request $request){
        $validated = $request ->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'supplier' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'cost_price' => 'required|numeric|min:0',
            'expiry_date' => 'required|date',

        ]);

        Drug::create($validated);

        return redirect()->route('drug.index')->with('success', 'Drug added successfully');
    }

    //show form for editing a drug
    public function edit($id){
       
        $drug = Drug::findOrFail($id); //find drug
        $markupCodes = MarkupCode::all(); //fetch all markupcodes
        return view('drugs.edit', compact('drug'), compact('markupCodes'));
    }

    //update a drug from storage
    public function update(Request $request, $id){
        $validated = $request ->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'supplier' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'expiry_date' => 'required|date',

        ]);
        
        $drug = Drug::findOrFail($id);
        //update validated data for drug
        $drug->update($validated);

        return redirect()->route('drugs.index')->with('success', 'Drug updated successfully');
    }

    //remove a drug from storage
    public function destroy($id){
        $drug = Drug::findOrFail($id);
        $drug ->delete(); //delete drug

        return redirect()->route('drugs.index')->with('success', 'Drug deleted successfully');
    }
}
