<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Gender;
use App\Models\Product;
use App\Models\Review;
use App\Models\Role;
use App\Models\User;
use App\Models\Whishlist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(3)
            // TODO: Check
            ->for(
                Role::factory()
            )
            ->for(
                Gender::factory()
            )
            ->has(
                Cart::factory()
                    ->count(1)
            )
            ->has(
                Whishlist::factory()
                    ->count(1)
            )
            ->create();
    }
}
