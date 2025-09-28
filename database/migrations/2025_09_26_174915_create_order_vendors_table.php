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
        Schema::create('order_vendors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id'); 
            $table->unsignedBigInteger('vendor_id'); 
            $table->decimal('subtotal', 10, 2); 
            $table->decimal('discount_amount', 10, 2)->default(0);
            $table->decimal('gst', 10, 2)->default(0);
            $table->decimal('shipping_cost', 10, 2)->default(0);
            $table->decimal('total', 10, 2); 
            $table->string('status');
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_vendors');
    }
};
