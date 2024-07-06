<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'IPHONE'],
            ['name' => 'MAC'],
            ['name' => 'IPAD'],
            ['name' => 'WATCH'],
            ['name' => 'AIRPODS'],
        ]);
    }

    
}
