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
        Schema::create('order_detail', function (Blueprint $table) {
            $table->increments('order_detail_id');
            $table->integer('order_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->foreign('order_id')->references('order_id')->on('orders');
            $table->foreign('product_id')->references('product_id')->on('product'); 
            $table->integer('quantity');
            $table->decimal('price', 16, 2);
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_detail');
    }
};
