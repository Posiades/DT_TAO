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
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        $this->call(users::class);
        $this->call(blog::class);
        $this->call(categories::class);
        $this->call(comments::class);
        $this->call(guest::class);
        $this->call(orders::class);
        $this->call(order_detail::class);
        $this->call(voucher::class);
        $this->call(product::class);
        $this->call(product_option::class);
        $this->call(purchase_history::class);

    }
}
