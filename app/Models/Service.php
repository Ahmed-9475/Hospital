<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Service extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable; 

    protected $fillable=['name', 'description','price','status'];
    public $translatedAttributes =['name', 'description'];

}
