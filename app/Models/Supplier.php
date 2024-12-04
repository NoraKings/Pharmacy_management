<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'address'
    ];

   public function drugs(){
    return $this->hasMany(Drug::class);
   }

   public function invoices(){

    return $this->hasMany(Invoice::class);
   }
    //
}
