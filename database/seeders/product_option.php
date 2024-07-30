<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class product_option extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_option')->insert([
            // Iphone 15 pro max
                ['product_id' => 1, 'storage' => '256GB', 'price_difference' => 32000000],
                ['product_id' => 1, 'storage' => '512GB', 'price_difference' => 36500000],
                ['product_id' => 1, 'storage' => '1TB', 'price_difference' => 45000000],

                ['product_id' => 2, 'storage' => '256GB', 'price_difference' => 32000000],
                ['product_id' => 2, 'storage' => '512GB', 'price_difference' => 36500000],
                ['product_id' => 2, 'storage' => '1TB', 'price_difference' => 45000000],

                ['product_id' => 3, 'storage' => '256GB', 'price_difference' => 32000000],
                ['product_id' => 3, 'storage' => '512GB', 'price_difference' => 36500000],
                ['product_id' => 3, 'storage' => '1TB', 'price_difference' => 45000000],

             // Iphone 15 Pro
                ['product_id' => 4, 'storage' => '256GB', 'price_difference' => 31500000],
                ['product_id' => 4, 'storage' => '512GB', 'price_difference' => 35990000],
                ['product_id' => 4, 'storage' => '1TB', 'price_difference' => 42900000],

                ['product_id' => 5, 'storage' => '256GB', 'price_difference' => 31500000],
                ['product_id' => 5, 'storage' => '512GB', 'price_difference' => 35990000],
                ['product_id' => 5, 'storage' => '1TB', 'price_difference' => 42900000],

                ['product_id' => 6, 'storage' => '256GB', 'price_difference' => 31500000],
                ['product_id' => 6, 'storage' => '512GB', 'price_difference' => 35990000],
                ['product_id' => 6, 'storage' => '1TB', 'price_difference' => 42900000],

            // Iphone 15 Plus
                ['product_id' => 7, 'storage' => '256GB', 'price_difference' => 28500000],
                ['product_id' => 7, 'storage' => '512GB', 'price_difference' => 31990000],

                ['product_id' => 8, 'storage' => '256GB', 'price_difference' => 28500000],
                ['product_id' => 8, 'storage' => '512GB', 'price_difference' => 31990000],

                ['product_id' => 9, 'storage' => '256GB', 'price_difference' => 28500000],
                ['product_id' => 9, 'storage' => '512GB', 'price_difference' => 31990000],

                ['product_id' => 10, 'storage' => '256GB', 'price_difference' => 28500000],
                ['product_id' => 10, 'storage' => '512GB', 'price_difference' => 31990000],

            // Iphone 15
                ['product_id' => 11, 'storage' => '256GB', 'price_difference' => 26500000],
                ['product_id' => 11, 'storage' => '512GB', 'price_difference' => 29590000],

                ['product_id' => 12, 'storage' => '256GB', 'price_difference' => 26500000],
                ['product_id' => 12, 'storage' => '512GB', 'price_difference' => 29590000],

                ['product_id' => 13, 'storage' => '256GB', 'price_difference' => 26500000],
                ['product_id' => 13, 'storage' => '512GB', 'price_difference' => 29590000],

            // Iphone 14 Pro Max
                ['product_id' => 14, 'storage' => '256GB', 'price_difference' => 29500000],
                ['product_id' => 14, 'storage' => '512GB', 'price_difference' => 35590000],
                ['product_id' => 14, 'storage' => '1TB', 'price_difference' => 41500000],
                
                ['product_id' => 15, 'storage' => '256GB', 'price_difference' => 29500000],
                ['product_id' => 15, 'storage' => '512GB', 'price_difference' => 35590000],
                ['product_id' => 15, 'storage' => '1TB', 'price_difference' => 41500000],
                
                ['product_id' => 16, 'storage' => '256GB', 'price_difference' => 29500000],
                ['product_id' => 16, 'storage' => '512GB', 'price_difference' => 35590000],
                ['product_id' => 16, 'storage' => '1TB', 'price_difference' => 41500000],

                ['product_id' => 17, 'storage' => '256GB', 'price_difference' => 29500000],
                ['product_id' => 17, 'storage' => '512GB', 'price_difference' => 35590000],
                ['product_id' => 17, 'storage' => '1TB', 'price_difference' => 41500000],

            // Iphone 14 Plus
                ['product_id' => 18, 'storage' => '256GB', 'price_difference' => 30500000],
                ['product_id' => 18, 'storage' => '512GB', 'price_difference' => 35090000],

                ['product_id' => 19, 'storage' => '256GB', 'price_difference' => 30500000],
                ['product_id' => 19, 'storage' => '512GB', 'price_difference' => 35090000],

                ['product_id' => 20, 'storage' => '256GB', 'price_difference' => 30500000],
                ['product_id' => 20, 'storage' => '512GB', 'price_difference' => 35090000],

                ['product_id' => 21, 'storage' => '256GB', 'price_difference' => 30500000],
                ['product_id' => 21, 'storage' => '512GB', 'price_difference' => 35090000],

                ['product_id' => 22, 'storage' => '256GB', 'price_difference' => 30500000],
                ['product_id' => 22, 'storage' => '512GB', 'price_difference' => 35090000],

            // Iphone 14 Pro
                ['product_id' => 23, 'storage' => '256GB', 'price_difference' => 27500000],
                ['product_id' => 23, 'storage' => '512GB', 'price_difference' => 33590000],
                ['product_id' => 23, 'storage' => '1TB', 'price_difference' => 39500000],

                ['product_id' => 24, 'storage' => '256GB', 'price_difference' => 27500000],
                ['product_id' => 24, 'storage' => '512GB', 'price_difference' => 33590000],
                ['product_id' => 24, 'storage' => '1TB', 'price_difference' => 39500000],

                ['product_id' => 25, 'storage' => '256GB', 'price_difference' => 27500000],
                ['product_id' => 25, 'storage' => '512GB', 'price_difference' => 33590000],
                ['product_id' => 25, 'storage' => '1TB', 'price_difference' => 39500000],

                ['product_id' => 26, 'storage' => '256GB', 'price_difference' => 27500000],
                ['product_id' => 26, 'storage' => '512GB', 'price_difference' => 33590000],
                ['product_id' => 26, 'storage' => '1TB', 'price_difference' => 39500000],

                ['product_id' => 27, 'storage' => '256GB', 'price_difference' => 27500000],
                ['product_id' => 27, 'storage' => '512GB', 'price_difference' => 33590000],
                ['product_id' => 27, 'storage' => '1TB', 'price_difference' => 39500000],

            // Iphone 14
                ['product_id' => 28, 'storage' => '256GB', 'price_difference' => 24500000],
                ['product_id' => 28, 'storage' => '512GB', 'price_difference' => 30590000],
                
                ['product_id' => 29, 'storage' => '256GB', 'price_difference' => 24500000],
                ['product_id' => 29, 'storage' => '512GB', 'price_difference' => 30590000],

                ['product_id' => 30, 'storage' => '256GB', 'price_difference' => 24500000],
                ['product_id' => 30, 'storage' => '512GB', 'price_difference' => 30590000],

                ['product_id' => 31, 'storage' => '256GB', 'price_difference' => 24500000],
                ['product_id' => 31, 'storage' => '512GB', 'price_difference' => 30590000],

                ['product_id' => 32, 'storage' => '256GB', 'price_difference' => 24500000],
                ['product_id' => 32, 'storage' => '512GB', 'price_difference' => 30590000],

            // Iphone 13 Pro Max
                ['product_id' => 33, 'storage' => '256GB', 'price_difference' => 25500000],
                ['product_id' => 33, 'storage' => '512GB', 'price_difference' => 31590000],
                ['product_id' => 33, 'storage' => '1TB', 'price_difference' => 37500000],

                ['product_id' => 34, 'storage' => '256GB', 'price_difference' => 25500000],
                ['product_id' => 34, 'storage' => '512GB', 'price_difference' => 31590000],
                ['product_id' => 34, 'storage' => '1TB', 'price_difference' => 37500000],

                ['product_id' => 35, 'storage' => '256GB', 'price_difference' => 25500000],
                ['product_id' => 35, 'storage' => '512GB', 'price_difference' => 31590000],
                ['product_id' => 35, 'storage' => '1TB', 'price_difference' => 37500000],

                ['product_id' => 36, 'storage' => '256GB', 'price_difference' => 25500000],
                ['product_id' => 36, 'storage' => '512GB', 'price_difference' => 31590000],
                ['product_id' => 36, 'storage' => '1TB', 'price_difference' => 37500000],

            // Iphone 13 Pro
                ['product_id' => 37, 'storage' => '256GB', 'price_difference' => 23500000],
                ['product_id' => 37, 'storage' => '512GB', 'price_difference' => 39590000],
                ['product_id' => 37, 'storage' => '1TB', 'price_difference' => 35500000],

                ['product_id' => 38, 'storage' => '256GB', 'price_difference' => 23500000],
                ['product_id' => 38, 'storage' => '512GB', 'price_difference' => 39590000],
                ['product_id' => 38, 'storage' => '1TB', 'price_difference' => 35500000],

                ['product_id' => 39, 'storage' => '256GB', 'price_difference' => 23500000],
                ['product_id' => 39, 'storage' => '512GB', 'price_difference' => 39590000],
                ['product_id' => 39, 'storage' => '1TB', 'price_difference' => 35500000],

                ['product_id' => 40, 'storage' => '256GB', 'price_difference' => 23500000],
                ['product_id' => 40, 'storage' => '512GB', 'price_difference' => 39590000],
                ['product_id' => 40, 'storage' => '1TB', 'price_difference' => 35500000],

            // Iphone 13
                ['product_id' => 41, 'storage' => '256GB', 'price_difference' => 20590000],
                ['product_id' => 41, 'storage' => '512GB', 'price_difference' => 25590000],

                ['product_id' => 42, 'storage' => '256GB', 'price_difference' => 20590000],
                ['product_id' => 42, 'storage' => '512GB', 'price_difference' => 25590000],
                
                ['product_id' => 43, 'storage' => '256GB', 'price_difference' => 20590000],
                ['product_id' => 43, 'storage' => '512GB', 'price_difference' => 25590000],

                ['product_id' => 44, 'storage' => '256GB', 'price_difference' => 20590000],
                ['product_id' => 44, 'storage' => '512GB', 'price_difference' => 25590000],

                ['product_id' => 45, 'storage' => '256GB', 'price_difference' => 20590000],
                ['product_id' => 45, 'storage' => '512GB', 'price_difference' => 25590000],

        ]);    
    }
}
