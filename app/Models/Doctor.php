<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;
    use Translatable; 

    public $translatedAttributes = ["name"];
    protected $fillable = ['name', 'email', 'email_verified_at', 'password','status', 'phone','price', "section_id"];

    /**
     * Get the doctors image.
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function appointmentDoctors(){
        
        return $this->belongsToMany(Appointment::class, "pivot_appointment_doctors");
    }

    // public function singleInvoices()
    // {
    //     return $this->hasMany(singleInvoice::class);
    // }


}