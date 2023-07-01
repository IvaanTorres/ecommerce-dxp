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
            // Discount 
            ->afterMaking(function (Brand $brand) {
                $discount = Discount::inRandomOrder()->first();
                $brand->discount()->associate($discount);
                
                $brand->save();
            })
            ->create();
    }
}
