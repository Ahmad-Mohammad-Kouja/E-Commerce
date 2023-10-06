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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('store_id')->constrained();
            $table->foreignId('address_id')->constrained();
            $table->foreignId('payment_id')->constrained();
            $table->enum('order_status',['in-progress', 'delivered']);
            $table->enum('payment_status',['paid', 'unpaid']);
            $table->enum('delivery_type',[ 'pickup','delivery']);
            $table->date('time_delivery');
            $table->string('current_location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
