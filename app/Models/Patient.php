<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;
    use Translatable;

    protected $fillable=['name','Gender','Address','email','Date_Birth','Phone','Blood_Group'];
    public $translatedAttributes =['name', 'Address'];

}
