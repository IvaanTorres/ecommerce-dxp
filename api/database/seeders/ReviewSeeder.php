<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::factory()
            ->count(50)
            ->afterMaking(function (Review $review) {
                // Give random product
                $product = Product::inRandomOrder()->first();
                $review->product()->associate($product);

                //Give random user
                $user = User::inRandomOrder()->first();
                $review->user()->associate($user);

                $review->save();
            })
            ->create();
    }
}
