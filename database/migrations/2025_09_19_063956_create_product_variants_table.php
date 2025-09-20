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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();

            $table->string('sku')->nullable();

            $table->decimal('price', 10, 2)->nullable();
            $table->unsignedBigInteger('stock')->default(0);

            $table->string('image')->nullable();

             $table->unsignedInteger('status')->default(1);
            $table->unsignedInteger('order');

            $table->timestamps();

            $table->unique(['product_id', 'color', 'size']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
