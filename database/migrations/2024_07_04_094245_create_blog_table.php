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
        Schema::create('blog', function (Blueprint $table) {
            $table->increments('blog_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('guest_id')->nullable();
            $table->string('title', 255);
            $table->text('content');
            $table->timestamp('post_date')->useCurrent();
            
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('guest_id')->references('guest_id')->on('guest'); // Corrected table name to 'guest'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
