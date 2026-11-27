<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('email')->nullable()->after('phone');
            $table->string('city')->nullable()->after('address');
            $table->string('postal_code', 10)->nullable()->after('city');
            $table->string('shipping_method')->nullable()->after('postal_code');
            $table->unsignedBigInteger('shipping_cost')->default(0)->after('shipping_method');
            $table->date('delivery_date')->nullable()->after('shipping_cost');
            $table->string('delivery_time')->nullable()->after('delivery_date');
            $table->text('notes')->nullable()->after('delivery_time');
            $table->string('tracking_number')->nullable()->after('payment_method');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'email',
                'city',
                'postal_code',
                'shipping_method',
                'shipping_cost',
                'delivery_date',
                'delivery_time',
                'notes',
                'tracking_number',
            ]);
        });
    }
};
