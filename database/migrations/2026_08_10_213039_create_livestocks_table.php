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
        Schema::create('livestocks', function (Blueprint $table) {
           $table->id();
    $table->string('name');
    $table->string('category');
    $table->string('breed')->nullable();
    $table->text('description')->nullable();
    $table->decimal('price', 12, 2);
    $table->integer('quantity')->default(0);
    $table->string('age')->nullable();
    $table->decimal('weight', 8, 2)->nullable();
    $table->string('image')->nullable();
    $table->enum('status', ['available', 'sold_out'])->default('available');
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livestocks');
    }
};
