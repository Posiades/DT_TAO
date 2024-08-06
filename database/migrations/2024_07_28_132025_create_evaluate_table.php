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
        Schema::create('evaluate', function (Blueprint $table) {
            $table->increments('evaluate_id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('user_id');
            $table->string('content');
            $table->integer('start');
            $table->timestamps();
            
            $table->foreign('product_id')->references('product_id')->on('product');
            $table->foreign('user_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluate');
    }
};
