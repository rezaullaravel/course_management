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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_bn');
            $table->text('description_en');
            $table->text('description_bn');
            $table->string('price_en');
            $table->string('price_bn');
            $table->text('feature1_en')->nullable();
            $table->text('feature1_bn')->nullable();
            $table->text('feature2_en')->nullable();
            $table->text('feature2_bn')->nullable();
            $table->text('feature3_en')->nullable();
            $table->text('feature3_bn')->nullable();
            $table->text('feature4_en')->nullable();
            $table->text('feature4_bn')->nullable();
            $table->text('feature5_en')->nullable();
            $table->text('feature5_bn')->nullable();
            $table->text('feature6_en')->nullable();
            $table->text('feature6_bn')->nullable();
            $table->text('feature7_en')->nullable();
            $table->text('feature7_bn')->nullable();
            $table->text('feature8_en')->nullable();
            $table->text('feature8_bn')->nullable();
            $table->text('feature9_en')->nullable();
            $table->text('feature9_bn')->nullable();
            $table->text('feature10_en')->nullable();
            $table->text('feature10_bn')->nullable();
            $table->text('feature1_status');
            $table->text('feature2_status');
            $table->text('feature3_status');
            $table->text('feature4_status');
            $table->text('feature5_status');
            $table->text('feature6_status');
            $table->text('feature7_status');
            $table->text('feature8_status');
            $table->text('feature9_status');
            $table->text('feature10_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
