<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'file_no', 'email', 'phone', 'address', 'type'
        ];

   public function sales(){

    return $this->hasMany(Sale::class);
   }

   public function drugs(){

    return $this->belongsToMany(Drug::class)->withPivot('quantity')->withTimestamps();
   }

   public function invoices(){

    return $this->hasMany(Invoice::class)->where('type', 'patient');
   }
   
    //
}
