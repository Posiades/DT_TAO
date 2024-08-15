<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(users::class);
        $this->call(blog::class);
        $this->call(categories::class);
        $this->call(guest::class);
        $this->call(orders::class);
        $this->call(order_detail::class);
        $this->call(voucher::class);
        $this->call(product::class);
    }
}
