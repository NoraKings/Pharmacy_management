<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function patient(){

        return $this->belongsTo(Patient::class);
    }
    
    public function drugs()
        {
             return $this->belongsToMany(Drug::class)->withPivot('quantity')->withTimestamps();
        }

    //
}
