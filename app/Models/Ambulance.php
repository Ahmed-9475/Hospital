<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ambulance extends Model
{
    use HasFactory;
    use Translatable;
    // protected $guarded=[];
    protected $fillable=['status','car_number','car_model','car_year_made','car_type','driver_name','driver_license_number','driver_phone','notes'];
    public $translatedAttributes = ['driver_name','notes'];

}
