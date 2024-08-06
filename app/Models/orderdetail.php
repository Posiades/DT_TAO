<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderdetail extends Model
{
    protected $table = 'order_detail';
    protected $primaryKey = 'order_detail_id';
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];
    use HasFactory;
}
