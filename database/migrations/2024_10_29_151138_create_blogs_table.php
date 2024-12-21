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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_category_id');
            $table->foreignId('user_id');
            $table->string('title_en');
            $table->string('title_bn');
            $table->string('slug')->unique();
            $table->text('image');
            $table->text('content_en');
            $table->text('content_bn');
            $table->text('image2')->nullable();
            $table->string('title2_en')->nullable();
            $table->string('title2_bn')->nullable();
            $table->text('content2_en')->nullable();
            $table->text('content2_bn')->nullable();
            $table->string('topic1_en')->nullable();
            $table->string('topic1_bn')->nullable();
            $table->string('topic2_en')->nullable();
            $table->string('topic2_bn')->nullable();
            $table->string('topic3_en')->nullable();
            $table->string('topic3_bn')->nullable();
            $table->string('topic4_en')->nullable();
            $table->string('topic4_bn')->nullable();
            $table->text('image3')->nullable();
            $table->string('title3_en')->nullable();
            $table->string('title3_bn')->nullable();
            $table->text('content3_en')->nullable();
            $table->text('content3_bn')->nullable();
            $table->string('footer_topic1_en')->nullable();
            $table->string('footer_topic1_bn')->nullable();
            $table->string('footer_topic2_en')->nullable();
            $table->string('footer_topic2_bn')->nullable();
            $table->string('footer_topic3_en')->nullable();
            $table->string('footer_topic3_bn')->nullable();
            $table->text('conclusiton_en')->nullable();
            $table->text('conclusiton_bn')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
