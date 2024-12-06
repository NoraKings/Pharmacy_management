<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'drug_id', 'dosage', 'quantity', 'instructions' ];

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function drug(){
        return $this->belongTo(Drug::class);
    }
}
