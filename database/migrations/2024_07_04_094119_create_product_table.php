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
        Schema::create('product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->unsignedInteger('category_id');
            $table->string('name', 255);
            $table->text('configtion');
            $table->text('description');
            $table->string('image', 255);
            $table->string('storage')->nullable();
            $table->string('color', 225)->nullable();
            $table->decimal('price', 12, 2);
            $table->string('slug', 255)->unique();
            $table->integer('quantity')->default(0);
            $table->enum('status', ['Còn Hàng', 'Hết Hàng', 'Chờ Hàng Về'])->default('Còn Hàng');
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
            $table->foreign('category_id')->references('category_id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
