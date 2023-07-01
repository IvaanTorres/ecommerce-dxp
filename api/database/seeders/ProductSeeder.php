<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Discount;
use App\Models\Product;
use App\Models\Review;
use App\Models\Star;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()
            ->afterMaking(function (Product $product) {
                // Give random brand
                $brand = Brand::inRandomOrder()->first();
                $product->brand()->associate($brand);

                // Give random discount
                $discount = Discount::inRandomOrder()->first();
                $product->discount()->associate($discount);

                $product->save();
            })
            ->count(200)
            ->create();
    }
}
