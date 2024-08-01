<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_option extends Model
{
    protected $table = 'product_option';
    protected $primaryKey = 'option_id';
    use HasFactory;
}
