<?php

namespace Database\Seeders;

use App\Models\Drug;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
       // User::factory(10)->create();
          Drug::factory(10)->create();

        // Drug::create([
        //     'name' => "Aceclofenac",
        //     'category' => "NSAID",
        //     'Description' => "FENAC pain killer",
        //     'Supplier' => "MEGA Pharmaceuticals",
        //     'quantity' => 500,
        //     'price' => 2.33,
        //     'expiry_date' => "2026-11-31",
        // ]);
    }
}
