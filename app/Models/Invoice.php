<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id', 'customer_id', 'type', 'total_amount'
    ];

    public function supplier(){

        return $this->belongsTo(Supplier::class);
    }

    public function patient(){

        return $this->belongsTo(Patient::class);
    }
    //
}
