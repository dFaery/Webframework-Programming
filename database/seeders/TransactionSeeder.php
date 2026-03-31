<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TransactionSeeder extends Seeder
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

        $userIds = DB::table('users')->pluck('id');
        $doctorIds = DB::table('doctors')->pluck('id');

        for ($i = 0; $i < 5; $i++) {

            $consultationFee = $faker->numberBetween(80000, 200000);
            $adminFee = 5000;

            DB::table('transactions')->insert([
                'user_id' => $faker->randomElement($userIds),
                'doctor_id' => $faker->randomElement($doctorIds),
                'transaction_code' => 'TRX-' . strtoupper($faker->bothify('####')),
                // kadang ada schedule, kadang tidak
                'schedule_time' => $faker->optional()->dateTimeBetween('now', '+3 days'),
                'consultation_fee' => $consultationFee,
                'admin_fee' => $adminFee,
                'total_price' => $consultationFee + $adminFee,
                'payment_method' => $faker->randomElement(['transfer', 'ewallet', 'cash']),
                'payment_status' => $faker->randomElement(['pending', 'paid', 'failed']),
                'transaction_status' => $faker->randomElement(['waiting', 'ongoing', 'completed', 'cancelled']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
