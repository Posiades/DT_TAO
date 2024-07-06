<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'Admin',
            'password' => Hash::make('8888'),
            'email' => 'c9smoothie1995@gmail.com',
            'full_name'=>'Nguyễn Ngọc Thạch',
            'address' => 'Thủ Đức, TP. HCM',
            'phone' => '0826010715',
            'role' => 1,
        ]);
    }
}
