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
        'cost_price',
        'expiry_date',
        'markup_code_id',

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

    public function markupCode(){
        return $this->belongsTo((MarkupCode::class));
        
    }

    public function calculatePrice($userType){
        $costPrice = $this->cost_price;
        $markupCode = $this->markupCode;

        if(!$markupCode){
            return $costPrice; //default to cost price if markup does not exist
            
        }

        $generalPrice = $costPrice + ($costPrice * $markupCode->general_markup /100);

        switch(strtolower($userType)){
            case 'general':
                return $generalPrice;

            case 'student' :
                return $generalPrice;

            case 'staff' :
                $discount = $markupCode ->staff_discount;
                
                return $generalPrice - ($generalPrice * $discount /100);
            
            case 'amenity' :

                $additionalMarkup = $markupCode ->amenity_markup;

                return $generalPrice + ($generalPrice * $additionalMarkup /100);
            
            default:
                return $costPrice;
        }
    }
    //
}
