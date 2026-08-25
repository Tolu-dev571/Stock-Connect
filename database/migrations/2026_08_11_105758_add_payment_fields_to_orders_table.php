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
        Schema::table('orders', function (Blueprint $table) {
            
        $table->string('payment_reference')->nullable()->after('total_price');
        $table->string('payment_status')->default('unpaid')->after('payment_reference');
        $table->text('payment_proof')->nullable()->after('payment_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {

             $table->dropColumn([
            'payment_reference',
            'payment_status',
            'payment_proof',
        ]);
        });
    }
};
