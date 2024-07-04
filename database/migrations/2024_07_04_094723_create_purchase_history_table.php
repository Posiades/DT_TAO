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
        Schema::create('purchase_history', function (Blueprint $table) {
            $table->increments('history_id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('guest_id')->unsigned()->nullable();
            $table->integer('order_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('guest_id')->references('guest_id')->on('guest');
            $table->foreign('order_id')->references('order_id')->on('orders');
            $table->timestamp('purchase_date')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_history');
    }
};
