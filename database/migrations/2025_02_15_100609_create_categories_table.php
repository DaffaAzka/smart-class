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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Category name (e.g., "IPPD", "RK3588")
            $table->string(column: 'slug')->unique(); // SEO-friendly URL slug
            $table->text('description')->nullable(); // Optional description
            $table->string('image')->nullable(); // Optional image for the category
            $table->foreignId('parent_id')->nullable()->constrained('categories')->onDelete('cascade'); // Self-referencing for subcategories
            $table->integer('order')->default(0); // Sorting order
            // $table->enum('type', ['category', 'link', 'contact'])->default('category');
            // $table->string('url')->nullable(); // URL for link types
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
