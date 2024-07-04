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
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('comment_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('guest_id')->nullable();
            $table->unsignedInteger('product_id');
            $table->text('comment_text');
            $table->timestamp('comment_date')->useCurrent();

            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('guest_id')->references('guest_id')->on('guest');
            $table->foreign('product_id')->references('product_id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
