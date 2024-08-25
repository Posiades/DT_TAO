<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voucher extends Model
{
    protected $table = 'voucher';
    protected $primaryKey = 'voucher_id';
    protected $fillable = [
        'code', 'discount_amount', 'create_date', 'expiry_date', 'quantity',
        'product_id', 'user_id', 'category_id'
    ];
    use HasFactory;
}
