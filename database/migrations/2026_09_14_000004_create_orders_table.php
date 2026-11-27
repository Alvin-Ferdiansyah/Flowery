<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('order_number')->unique();
            $table->string('customer_name');
            $table->string('phone');
            $table->text('address');
            $table->unsignedBigInteger('total');
            $table->enum('status', ['pending', 'confirmed', 'processing', 'completed', 'cancelled'])->default('pending');
            $table->enum('payment_status', ['pending', 'paid', 'failed', 'expired'])->default('pending');
            $table->string('payment_method')->nullable();
            $table->string('midtrans_order_id')->nullable();
            $table->text('midtrans_snap_token')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
