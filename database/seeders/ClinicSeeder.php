<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clinics')->insert([
            'name' => 'Clinic 1',
            'email' => 'clinic_admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
