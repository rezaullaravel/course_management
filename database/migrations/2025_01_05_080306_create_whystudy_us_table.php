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
        Schema::create('whystudy_us', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title_en');
            $table->string('title_bn');
            $table->text('description_en');
            $table->text('description_bn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('whystudy_us');
    }
};
