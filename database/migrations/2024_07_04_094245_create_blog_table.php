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
           $table->binary('image_banner');
           $table->string('title', 255);
           $table->string('image_main', 255);
           $table->text('content_1');
           $table->text('content_2');
           $table->string('image_sub1', 255);
           $table->string('image_sub2', 255);
           $table->string('slug', 255);
           $table->timestamp('updated_at')->useCurrent();
           $table->timestamp('created_at')->useCurrent();
           
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
