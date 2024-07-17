<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voucher extends Model
{
    protected $table = 'voucher';
    protected $primaryKey = 'voucher_id';
    use HasFactory;
}
