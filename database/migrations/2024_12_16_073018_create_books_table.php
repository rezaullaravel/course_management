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
            $table->string('title');
            $table->string('slug');
            $table->string('image');
            $table->text('book_pdf_file');
            $table->string('description')->nullable();
            $table->string('topic1')->nullable();
            $table->text('description1')->nullable();
            $table->string('topic2')->nullable();
            $table->text('description2')->nullable();
            $table->string('topic3')->nullable();
            $table->text('description3')->nullable();
            $table->string('topic4')->nullable();
            $table->text('description4')->nullable();
            $table->string('topic5')->nullable();
            $table->text('description5')->nullable();
            $table->string('price');
            $table->string('paid_status')->default('free');
            $table->string('another_image')->nullable();
            $table->text('another_description')->nullable();
            $table->string('another_topic1')->nullable();
            $table->string('another_topic2')->nullable();
            $table->string('another_topic3')->nullable();
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
