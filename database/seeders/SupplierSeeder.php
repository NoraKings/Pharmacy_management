<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Supplier::create([
            'name'=>'MEGA LIFE',
            'email' => 'mega@healthcare.com',
            'phone' => '08099445566',
            'address' => 'No. 5 Lagos Street'
        ]);
    }
}
