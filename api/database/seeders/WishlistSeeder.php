<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WhishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wishlist::factory()
            ->count(1)
            ->has(
                Product::factory()
                    ->count(3)
            )
            ->create();
    }
}
