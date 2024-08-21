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
            ['name' => 'IPHONE', 'slug' => 'iphone'],
            ['name' => 'MAC', 'slug' => 'mac'],
            ['name' => 'IPAD', 'slug' => 'ipad'],
            ['name' => 'WATCH', 'slug' => 'watch'],
            ['name' => 'AIRPODS', 'slug' => 'airpods'],
        ]);
    }

    
}
