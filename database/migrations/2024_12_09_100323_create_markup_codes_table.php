<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('markup_codes', function (Blueprint $table) {
            $table->id();
            $table->string('classification'); //OTC, POM etc
            $table->decimal('general_markup', 5, 2); //general and student percentate
            $table->decimal('staf_discount', 5, 2); //staff discount percentage
            $table->decimal('amenity_markup', 5, 2); //amenity increment percentage

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('markup_codes');
    }
};
