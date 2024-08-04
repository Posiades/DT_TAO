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
        Schema::create('voucher', function (Blueprint $table) {
            $table->increments('voucher_id');               // Khóa chính, tự động tăng
            $table->string('code', 50)->unique();           // Mã voucher, duy nhất
            $table->decimal('discount_amount', 10, 2);      // Giá trị giảm giá
            $table->date('create_date');                    // Ngày tạo
            $table->date('expiry_date');                    // Ngày hết hạn
            $table->integer('quantity');                    // Số lượng voucher
            $table->integer('times_used')->default(0);      // Số lần đã sử dụng, mặc định là 0
            $table->enum('status', ['active', 'inactive'])->default('active');  // Trạng thái của voucher, mặc định là 'active'
            $table->unsignedInteger('product_id')->nullable();  // Khóa ngoại liên kết với bảng products, có thể NULL
            $table->unsignedInteger('user_id')->nullable();     // Khóa ngoại liên kết với bảng users, có thể NULL
            $table->timestamps();                               // Tạo cột created_at và updated_at

            // Thiết lập khóa ngoại
            $table->foreign('product_id')->references('product_id')->on('product');
            $table->foreign('user_id')->references('user_id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voucher');
    }
};
