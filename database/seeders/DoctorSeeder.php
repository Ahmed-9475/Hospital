<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    Doctor::factory()->count(5)->create();
    
    $appointment =Appointment::all();
    // foreach($doctors as $doctor){
    //   $appointment = Appointment::all()->random()->id;

    //   $doctor->appointmentDoctors()->attach($appointment);
    // }

    Doctor::all()->each(function ($doctor) use ($appointment){

      $doctor->appointmentDoctors()->attach($appointment->random()->id);
    });

    
    }
}