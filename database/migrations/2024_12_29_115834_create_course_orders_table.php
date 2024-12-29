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
        Schema::create('course_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('course_id');
            $table->decimal('price_en', 10, 2)->nullable();
            $table->decimal('price_bn', 10, 2)->nullable();
            $table->string('email');
            $table->string('phone_number');
            $table->string('country');
            $table->string('location');
            $table->string('payment_method');
            $table->string('status'); // pending, completed, failed, cancelled
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_orders');
    }
};
