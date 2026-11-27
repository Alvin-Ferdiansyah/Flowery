<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->string('wrapping_color')->nullable()->after('size');
            $table->string('ribbon_color')->nullable()->after('wrapping_color');
            $table->string('flower_tone')->nullable()->after('ribbon_color');
            $table->json('extra_addons')->nullable()->after('flower_tone');
        });
    }

    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropColumn([
                'wrapping_color',
                'ribbon_color',
                'flower_tone',
                'extra_addons',
            ]);
        });
    }
};
