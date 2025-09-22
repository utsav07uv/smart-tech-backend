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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('slug')->unique();

            $table->longText('description')->nullable();

            $table->string('color')->nullable();
            $table->string('size')->nullable();

            $table->string('sku')->nullable();
            $table->string('model')->nullable();

            $table->unsignedBigInteger('stock')->default(0);

            $table->decimal('price', 10, 2);
            $table->unsignedTinyInteger('discount')->nullable(); 

            $table->string('image')->nullable();
            $table->json('images')->nullable();

            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('section_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->unsignedInteger('status')->default(0);
            $table->unsignedInteger('order');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
