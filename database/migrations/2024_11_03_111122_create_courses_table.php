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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_category_id');
            $table->foreignId('user_id');
            $table->foreignId('teacher_id');
            $table->string('title_en');
            $table->string('title_bn');
            $table->string('slug')->unique();
            $table->text('image');
            $table->string('video_url')->nullable();
            $table->text('content_en');
            $table->text('content_bn');
            $table->string('topic1_en')->nullable();
            $table->string('topic1_bn')->nullable();
            $table->string('topic2_en')->nullable();
            $table->string('topic2_bn')->nullable();
            $table->string('topic3_en')->nullable();
            $table->string('topic3_bn')->nullable();
            $table->string('topic4_en')->nullable();
            $table->string('topic4_bn')->nullable();
            $table->string('topic5_en')->nullable();
            $table->string('topic5_bn')->nullable();
            $table->string('topic6_en')->nullable();
            $table->string('topic6_bn')->nullable();
            $table->string('topic7_en')->nullable();
            $table->string('topic7_bn')->nullable();
            $table->string('topic8_en')->nullable();
            $table->string('topic8_bn')->nullable();
            $table->string('topic9_en')->nullable();
            $table->string('topic9_bn')->nullable();
            $table->string('topic10_en')->nullable();
            $table->string('topic10_bn')->nullable();
            $table->string('topic11_en')->nullable();
            $table->string('topic11_bn')->nullable();
            $table->string('topic12_en')->nullable();
            $table->string('topic12_bn')->nullable();
            $table->string('topic13_en')->nullable();
            $table->string('topic13_bn')->nullable();
            $table->string('topic14_en')->nullable();
            $table->string('topic14_bn')->nullable();
            $table->string('topic15_en')->nullable();
            $table->string('topic15_bn')->nullable();
            $table->text('image2')->nullable();
            $table->text('content2_en')->nullable();
            $table->text('content2_bn')->nullable();
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
            $table->text('feature1_en');
            $table->text('feature1_bn');
            $table->text('feature2_en');
            $table->text('feature2_bn');
            $table->text('feature3_en');
            $table->text('feature3_bn');
            $table->text('feature4_en');
            $table->text('feature4_bn');
            $table->text('feature5_en');
            $table->text('feature5_bn');
            $table->text('feature6_en');
            $table->text('feature6_bn');
            $table->text('feature7_en');
            $table->text('feature7_bn');
            $table->text('feature8_en');
            $table->text('feature8_bn');
            $table->text('feature9_en');
            $table->text('feature9_bn');
            $table->text('feature10_en');
            $table->text('feature10_bn');
            $table->text('price_en');
            $table->text('price_bn');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
