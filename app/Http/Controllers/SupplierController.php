<?php

namespace App\Http\Controllers;
use App\Models\Supplier;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
        {
            // Build the query dynamically
            $query = Supplier::query();

            // If a company name is provided, filter results
            if ($request->filled('company')) {
                $query->where('company', 'like', '%' . $request->company . '%');
                }
            // Paginate results

            $suppliers = $query->paginate(10);

            // Keep search term in pagination links
            $suppliers->appends($request->only('company'));

            return view('suppliers.index', compact('suppliers'));
        }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suppliers.create'); // Return the view to create a new supplier
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'company' => 'nullable'
        ]);

        Supplier::create($validated);

        return redirect()->route('suppliers.index')->with('success', 'Supplier added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = Supplier::findOrFail($id); // Fetch the supplier or throw a 404 error
        return view('suppliers.show', compact('supplier')); // Return the view with the supplier data
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('suppliers.edit', [
            'supplier' => Supplier::findOrFail($id) // Fetch the supplier to edit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'company' => 'nullable'
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update($validated);

        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully');
    }
}
