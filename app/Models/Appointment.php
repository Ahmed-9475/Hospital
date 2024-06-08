<?php

namespace App\Models;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;
    use Translatable;

    protected $fillable = ['name'];
    public $translatedAttributes = ['name'];

    public function doctors()
    {

        return $this->belongsToMany(Doctor::class, "pivot_appointment_doctors");
    }

}