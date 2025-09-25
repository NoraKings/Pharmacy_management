<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Models\TransferRequest;

use Illuminate\Http\Request;

class TransferController extends Controller
{
    //show create transfer request form
    public function create(){
        $drugs = Drug::all();
        return view('transfers.create', compact('drugs'));
    }

    //store new transfer request
    public function store(Request $request){
         if (!\Illuminate\Support\Facades\Auth::check()) {
        return redirect()->route('login')->with('error', 'You must be logged in to request a transfer.');
    }
        
        $validated = $request ->validate([
            'drug_id' => 'required|exists:drugs,id',
            'quantity' => 'required|integer|min:1',
            'brand' => 'nullable|string|max:255',
            'expiry_date' => 'nullable|date'
        ]);

        $drug = Drug::findOrFail($validated['drug_id']);

        if($drug->quantity < $validated['quantity']) {
            return back()->withErrors(['quantity' => 'Not enough stock in store']);
        }

        TransferRequest::create([
            'drug_id' => $drug->id,
            'name' => $drug->name,
            'brand' => $validated['brand'],
            'quantity' => $validated['quantity'],
            'expiry_date' => $validated['expiry_date'],
            'requested_by' => auth()->id,
            'status' => 'pending',
        ]);

        return redirect()->route('transfers.pending')->with('success', 'Transfer request submitted successfully!');
    }

    //shwo pending requests(for dispensary manager)
    public function pending(){
        $requests = TransferRequest::where('status', 'pending')->get();
        return view('transfers.pending', compact('requests'));
    }
}
