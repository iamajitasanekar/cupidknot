<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'expected_income',
        'multi_occupation',
        'multi_family_type',
        'multi_manglik'
    ];

    protected $casts =[
        'multi_occupation' => 'array',
        'multi_family_type' => 'array',
        'multi_manglik' => 'array'
    ];

    public function setExpectedIncomeAttribute($value)
    {
        $this->attributes['expected_income'] = str_replace('₹','',$value);
    }

    // public function setMultiOccupationAttribute($value)
    // {
    //     $this->attributes['multi_occupation'] = json_encode($value);
        
    // }
    // public function setMultiFamilyTypeAttribute($value)
    // {
    //     $this->attributes['multi_family_type'] = json_encode($value);
        
    // }
    // public function setMultiManglikAttribute($value)
    // {
    //     $this->attributes['multi_manglik'] = json_encode($value);
        
    // }
  
    // /**
    //  * Get the occupa
    //  *
    //  */
    // public function getMultiOccupationAttribute($value)
    // {
    //     return $this->attributes['multi_occupation'] = json_decode($value);
    // }

    // public function getMultiFamilyTypeAttribute($value)
    // {
    //    return $this->attributes['multi_family_type'] = json_decode($value);
        
    // }
    // public function getMultiManglikAttribute($value)
    // {
    //     return $this->attributes['multi_manglik'] = json_decode($value);
        
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
