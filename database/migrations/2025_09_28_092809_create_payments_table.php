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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_vendor_id'); 
            $table->unsignedBigInteger('user_id');  
            $table->string('order_number'); 
            $table->string('method');
            $table->decimal('amount', 10, 2);
            $table->string('currency', 10)->default('AUD');
            $table->string('transaction_id')->nullable();
            $table->json('meta')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
