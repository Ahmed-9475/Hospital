<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('appointments')->delete();

        $Appointments = [
            ['name' => 'السبت'],
            ['name' => 'الأحد'],
            ['name' => 'الأثنين'],
            ['name' => 'الثلاثاء'],
            ['name' => 'الأربعاء'],
            ['name' => 'الخميس'],
            ['name' => 'الجمعه']
        ];
        
        foreach($Appointments as $appointments){
            Appointment::create($appointments);
        }
    }
}