<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // generate data dengan format indo
        $faker = Faker::create('id_ID');
        // biar generated data tidak berubah
        $faker->seed(123);

        for ($i = 0; $i < 10; $i++) {
            DB::table('doctors')->insert([
                'name' => 'Dr. ' . $faker->name,
                'email' => $faker->unique()->safeEmail,
                'status' => $faker->randomElement(['active', 'inactive']),
                'consultation_fee' => $faker->numberBetween(80000, 200000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
