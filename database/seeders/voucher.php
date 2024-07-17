<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class voucher extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('voucher')->insert([
            'code' => 'dttao2024',
            'discount_amount' => 5000,
            'create_date'=> '2024-07-03',
            'expiry_date' => '2025-08-08',
            'quantity' => 99
        ]);
    }
}
