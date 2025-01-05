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
        Schema::create('book_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('book_id');
            $table->string('price_en')->nullable();
            $table->string('price_bn')->nullable();
            $table->string('order_total_en')->nullable();
            $table->string('order_total_bn')->nullable();
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
        Schema::dropIfExists('book_orders');
    }
};
