<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceTranslation extends Model
{
    use HasFactory;

    public $translatedAttributes =['name', 'notes'];
    public $timestamps = false;
    
}
