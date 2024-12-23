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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_bn');
            $table->text('logo');
            $table->text('description_en');
            $table->text('description_bn');
            $table->text('image');
            $table->string('name_en');
            $table->string('name_bn');
            $table->string('profession_en');
            $table->string('profession_bn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
