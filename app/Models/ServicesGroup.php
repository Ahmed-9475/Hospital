<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServicesGroup extends Model
{
    use HasFactory;
    use Translatable; 

    protected $fillable=['name', 'notes','Total_before_discount','discount_value','Total_after_discount','tax_rate','Total_with_tax'];
    public $translatedAttributes =['name', 'notes'];

}
