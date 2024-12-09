<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkupCode extends Model
{
    use HasFactory;

    protected $fillable = ['classification', 'general_markup', 'staf_discount', 'amenity_markup'];

    public function drugs(){
        return $this->hasMany(Drug::class);
    }
}
