<?php

namespace Database\Seeders;

use App\Models\Drug;
use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DrugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() 
    {
       $supplier = Supplier::first();

       Drug::create([
        'name' => 'paracetamol',
        'category' => 'NSAIDS',
        'description' => 'PACET',
        'quantity' => 2000,
        'price' => 50.00,
        'expiry_date' => '',
        'supplier_id' => $supplier->id,

       ]);
    }
}
