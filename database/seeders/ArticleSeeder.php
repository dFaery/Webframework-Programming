<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articles')->insert([
            [
                'doctor_id' => 1,
                'title' => 'Tips Menjaga Kesehatan Jantung Sejak Dini',
                'content' => 'Kesehatan jantung merupakan salah satu aspek penting dalam menjaga kualitas hidup. Untuk menjaga kesehatan jantung sejak dini, penting untuk menerapkan pola hidup sehat seperti mengonsumsi makanan bergizi seimbang, mengurangi makanan berlemak tinggi, serta rutin berolahraga minimal 30 menit setiap hari. Selain itu, hindari kebiasaan merokok dan konsumsi alkohol berlebihan. Pemeriksaan kesehatan secara rutin juga sangat disarankan untuk mendeteksi dini adanya gangguan pada jantung.',
                'status' => 'published',
                'views_count' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'doctor_id' => 2,
                'title' => 'Cara Mengatasi Jerawat Secara Alami dan Aman',
                'content' => 'Jerawat merupakan masalah kulit yang umum dialami oleh banyak orang, terutama remaja. Untuk mengatasinya secara alami, Anda dapat menggunakan bahan seperti lidah buaya, madu, dan tea tree oil yang memiliki sifat anti-inflamasi dan antibakteri. Selain itu, penting untuk menjaga kebersihan wajah dengan mencuci muka secara teratur dan menghindari penggunaan produk yang dapat menyumbat pori-pori. Pola makan yang sehat dan cukup minum air putih juga membantu menjaga kesehatan kulit dari dalam.',
                'status' => 'published',
                'views_count' => 95,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'doctor_id' => 3,
                'title' => 'Pentingnya Pola Tidur Sehat untuk Kesehatan Tubuh',
                'content' => 'Tidur yang cukup dan berkualitas memiliki peran penting dalam menjaga kesehatan tubuh secara keseluruhan. Kurang tidur dapat menyebabkan penurunan daya tahan tubuh, gangguan konsentrasi, serta meningkatkan risiko berbagai penyakit kronis. Disarankan untuk tidur selama 7-8 jam setiap malam dan menjaga konsistensi waktu tidur. Hindari penggunaan gadget sebelum tidur dan ciptakan lingkungan tidur yang nyaman agar kualitas tidur lebih optimal.',
                'status' => 'published',
                'views_count' => 80,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'doctor_id' => 6,
                'title' => 'Cara Mengelola Stres untuk Menjaga Kesehatan Mental',
                'content' => 'Stres adalah bagian dari kehidupan sehari-hari, namun jika tidak dikelola dengan baik dapat berdampak negatif pada kesehatan mental dan fisik. Beberapa cara yang dapat dilakukan untuk mengelola stres antara lain dengan berolahraga, meditasi, melakukan hobi yang disukai, serta berbicara dengan orang terdekat. Mengatur waktu dengan baik dan tidak memaksakan diri juga penting untuk menjaga keseimbangan hidup. Jika stres berlanjut, sebaiknya konsultasikan dengan tenaga profesional.',
                'status' => 'draft',
                'views_count' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'doctor_id' => 7,
                'title' => 'Manfaat Konsumsi Air Putih yang Cukup Setiap Hari',
                'content' => 'Air putih memiliki peran penting dalam menjaga fungsi tubuh, mulai dari membantu proses pencernaan hingga menjaga keseimbangan cairan tubuh. Kekurangan cairan dapat menyebabkan dehidrasi yang berdampak pada kesehatan. Disarankan untuk mengonsumsi minimal 8 gelas air putih per hari, atau lebih tergantung aktivitas. Selain itu, air putih juga membantu menjaga kesehatan kulit dan meningkatkan energi dalam menjalani aktivitas sehari-hari.',
                'status' => 'published',
                'views_count' => 70,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
