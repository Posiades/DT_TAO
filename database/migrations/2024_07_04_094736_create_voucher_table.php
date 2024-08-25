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
            $table->increments('voucher_id');              
            $table->string('code', 50)->unique();           
            $table->decimal('discount_amount', 10, 2);      
            $table->date('create_date');                    
            $table->date('expiry_date');                    
            $table->integer('quantity');                    
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();                          
            
            
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
