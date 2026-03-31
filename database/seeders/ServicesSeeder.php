<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            'name' => 'Konsultasi Dokter Online',
            'description' => 'Layanan konsultasi kesehatan secara online dengan dokter umum untuk membantu menjawab berbagai keluhan',
            'availability' => '2026-03-17 08:00:00',
            'category_id' => 1,
            'price' => 50000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
