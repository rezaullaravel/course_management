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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_bn');
            $table->text('image1');
            $table->text('image2');
            $table->text('image3');
            $table->text('image4');
            $table->string('title1_en');
            $table->string('title1_bn');
            $table->text('description1_en');
            $table->text('description1_bn');
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
            $table->string('title2_en');
            $table->string('title2_bn');
            $table->text('description2_en');
            $table->text('description2_bn');
            $table->string('footer_topic1_en')->nullable();
            $table->string('footer_topic1_bn')->nullable();
            $table->string('footer_topic2_en')->nullable();
            $table->string('footer_topic2_bn')->nullable();
            $table->string('footer_topic3_en')->nullable();
            $table->string('footer_topic3_bn')->nullable();
            $table->string('footer_topic4_en')->nullable();
            $table->string('footer_topic4_bn')->nullable();
            $table->string('footer_topic5_en')->nullable();
            $table->string('footer_topic5_bn')->nullable();
            $table->string('footer_topic6_en')->nullable();
            $table->string('footer_topic6_bn')->nullable();
            $table->string('footer_topic7_en')->nullable();
            $table->string('footer_topic7_bn')->nullable();
            $table->string('footer_topic8_en')->nullable();
            $table->string('footer_topic8_bn')->nullable();
            $table->string('footer_topic9_en')->nullable();
            $table->string('footer_topic9_bn')->nullable();
            $table->string('footer_topic10_en')->nullable();
            $table->string('footer_topic10_bn')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
