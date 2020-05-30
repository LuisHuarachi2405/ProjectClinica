<?php

use Illuminate\Database\Seeder;
use App\Patient;

class PatientSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0 ; $i<50; $i++){
            Patient::create(
                [
                    'name' => "Patient$i",
                    'lastname' => "PatientLast$i",
                    'address' => "years$i",
                    'district' => "distric$i",
                    'reference' => "Referenica$i",
                    'priority' => 2,
                    'doctor' => "Doctor P.$i",
                    'user_id' => $i,
                    'user_delivery_id' => $i,
                    'state_patient_id' => $i,
                    'type_patient_id' => $i,
                    
                    'insurance' => "insurance$i",
                    'cellphone' => "98687$i",
                    'state' => 1,

                ]
                );
        }
    }
}
