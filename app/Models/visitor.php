<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visitor extends Model
{
    protected $table = 'visitor';


    protected $fillable = [
        'ip_address',
        'location',
        'visited_at',
    ];

    protected $dates = ['visited_at'];
    
    use HasFactory;
}
