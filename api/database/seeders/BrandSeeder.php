<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::factory()
            ->count(5)
            // TODO: Check how to condition 50% of the brands to have a discount
            // TODO: Check how to make it random
            ->for(
                Discount::factory()
            )
            ->has(
                Category::factory()
                    // TODO: Check how to condition 50% of the brands to have a discount
                    // TODO: Check how to make it random
                    ->for(
                        Discount::factory()
                    )
                    ->has(
                        Product::factory()
                            ->count(10)
                            // TODO: Check how to condition 50% of the brands to have a discount
                            // TODO: Check how to make it random
                            ->for(
                                Discount::factory()
                            )
                            ->has(
                                Review::factory()
                                    ->count(3)
                            )
                            ->sequence(fn ($sequence) => [
                                'nb_reviews' => 3,
                            ])
                    )
                    ->count(5)
            )
            ->create();
            // ->each(function ($brand) {
            //     $brand->discount()->save(
            //         Discount::factory()->count(1)
            //     );
            // });
    }
}
