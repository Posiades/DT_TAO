<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $fillable = ['user_id','order_code','guest_id', 'order_date', 'status','total_price'];

    public function user(){
    return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    
    use HasFactory;
}
