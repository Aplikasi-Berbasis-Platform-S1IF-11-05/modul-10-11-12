<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('image');
            $table->string('preparation_time')->nullable();
            $table->string('regional_origin')->nullable();
            $table->integer('calories')->nullable();
            $table->string('total_fat')->nullable();
            $table->string('protein')->nullable();
            $table->string('carbs')->nullable();
            $table->string('sodium')->nullable();
            $table->json('ingredients')->nullable();
            $table->json('allergens')->nullable();
            $table->text('method')->nullable();
            $table->text('serving_suggestion')->nullable();
            $table->decimal('rating', 2, 1)->default(5.0);
            $table->integer('review_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
