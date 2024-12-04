<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory ;

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'price',
        'expiry_date'

    ];

    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }

    public function patients(){

        return $this->belongsToMany(Patient::class)->withPivot('quantity')->withTimestamps();
    }

    public function sales(){

        return $this->belongsToMany(Sale::class)->withPivot('quantity', 'type')->withTimestamps();
    }

    public function invoices(){

        return $this->belongsToMany(Invoice::class)->withPivot('quantity', 'price');
    }
    //
}
