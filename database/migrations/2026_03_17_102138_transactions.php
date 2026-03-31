<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade');
            $table->string('transaction_code')->unique();
            // tidak semua transaksi butuh schedule
            $table->datetime('schedule_time')->nullable();
            $table->decimal('consultation_fee', 12, 2);
            $table->decimal('admin_fee', 12, 2);
            $table->decimal('total_price', 12, 2);
            $table->enum('payment_method', ['transfer', 'ewallet', 'cash'])->default('transfer');
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
            $table->enum('transaction_status', ['waiting', 'ongoing', 'completed', 'cancelled'])->default('waiting');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
