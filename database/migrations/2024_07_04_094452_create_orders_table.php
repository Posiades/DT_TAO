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
            $table->increments('order_id');
            $table->string('order_code')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('guest_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('guest_id')->references('guest_id')->on('guest');
            $table->timestamp('order_date')->useCurrent();
            $table->enum('status', ['Chưa Thanh Toán', 'Đã Thanh Toán',])->default('Chưa Thanh Toán');
            $table->string('vnp_transaction_id')->nullable();
            $table->decimal('total_price', 10, 2)->nullable();
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
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
