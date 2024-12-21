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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('user_id');
            $table->string('title_en');
            $table->string('title_bn');
            $table->string('slug');
            $table->string('image');
            $table->string('video_url')->nullable();
            $table->text('book_pdf_file');
            $table->string('description_en')->nullable();
            $table->string('description_bn')->nullable();
            $table->string('topic1_en')->nullable();
            $table->string('topic1_bn')->nullable();
            $table->text('description1_en')->nullable();
            $table->text('description1_bn')->nullable();
            $table->string('topic2_en')->nullable();
            $table->string('topic2_bn')->nullable();
            $table->text('description2_en')->nullable();
            $table->text('description2_bn')->nullable();
            $table->string('topic3_en')->nullable();
            $table->string('topic3_bn')->nullable();
            $table->text('description3_en')->nullable();
            $table->text('description3_bn')->nullable();
            $table->string('topic4_en')->nullable();
            $table->string('topic4_bn')->nullable();
            $table->text('description4_en')->nullable();
            $table->text('description4_bn')->nullable();
            $table->string('topic5_en')->nullable();
            $table->string('topic5_bn')->nullable();
            $table->text('description5_en')->nullable();
            $table->text('description5_bn')->nullable();
            $table->string('topic6_en')->nullable();
            $table->string('topic6_bn')->nullable();
            $table->text('description6_en')->nullable();
            $table->text('description6_bn')->nullable();
            $table->string('topic7_en')->nullable();
            $table->string('topic7_bn')->nullable();
            $table->text('description7_en')->nullable();
            $table->text('description7_bn')->nullable();
            $table->string('topic8_en')->nullable();
            $table->string('topic8_bn')->nullable();
            $table->text('description8_en')->nullable();
            $table->text('description8_bn')->nullable();
            $table->string('topic9_en')->nullable();
            $table->string('topic9_bn')->nullable();
            $table->text('description9_en')->nullable();
            $table->text('description9_bn')->nullable();
            $table->string('topic10_en')->nullable();
            $table->string('topic10_bn')->nullable();
            $table->text('description10_en')->nullable();
            $table->text('description10_bn')->nullable();
            $table->string('price_en');
            $table->string('price_bn');
            $table->string('paid_status')->default('paid');
            $table->string('another_image')->nullable();
            $table->text('another_description_en')->nullable();
            $table->text('another_description_bn')->nullable();
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
        Schema::dropIfExists('books');
    }
};
