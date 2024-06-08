<?php

namespace App\Models;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class singleInvoice extends Model
{
    use HasFactory;

    protected  $guarded=[''];

    // public function doctorInvoice()
    // {
    //     return $this->belongsTo(Doctor::class,'doctor_id');
        
    // }

}
