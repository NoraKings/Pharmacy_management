<?php

namespace App\Http\Controllers;
use App\Models\Drug;
use App\Models\MarkupCode;
use App\Models\Supplier;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    //show all drugs
    public function index(Request $request)
    {
        // Build the query dynamically
        $query = Drug::query();

        // If a drug_id is provided, filter results
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

            // Paginate results
            $drugs = $query->paginate(10);

            // Keep search term in pagination links
            $drugs->appends($request->only('name'));

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
        $suppliers = Supplier::all();
        return view('drugs.create', compact('markupCodes'), compact('suppliers'));
    }

    //store a newly created drug
    public function store(Request $request){
        $validated = $request ->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|integer|min:1',
            'cost_price' => 'required|numeric|min:0',
            'markup_code_id'=> 'required|exists:markup_codes,id',
            'expiry_date' => 'required|date',

        ]);

        Drug::create($validated);

        session()->flash('success', 'Drug created successfully!');
        return redirect()->route('drugs.index');
    }

    //show form for editing a drug
    public function edit($id){
       
        $drug = Drug::with('supplier')->findOrFail($id); //find drug
        $suppliers = Supplier::all();
        $markupCodes = MarkupCode::all(); //fetch all markupcodes
        return view('drugs.edit', compact('drug'), compact('markupCodes'), compact('suppliers'));
    }

    //update a drug from storage
    public function update(Request $request, $id){
        $validated = $request ->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'supplier' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'cost_price' => 'required|numeric|min:0',
            'expiry_date' => 'required|date',

        ]);
        
        $drug = Drug::findOrFail($id);
        //update validated data for drug
        $drug->update($validated);

        session()->flash('success', 'Drug updated successfully!');
        return redirect()->route('drugs.index');
    }

    //remove a drug from storage
    public function destroy($id){
        $drug = Drug::findOrFail($id);
        $drug ->delete(); //delete drug

        session()->flash('success', 'Drug deleted successfully!');
        return redirect()->route('drugs.index');
    }
}
