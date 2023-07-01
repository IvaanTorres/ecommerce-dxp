<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()
            ->afterMaking(function (Category $category) {
                // Give random discount
                $discount = Discount::inRandomOrder()->first();
                $category->discount()->associate($discount); //* Associate is for belongsTo

                // Give random parent category
                $parent = Category::inRandomOrder()->first();
                $category->parent()->associate($parent);

                $category->save();
            })
            ->afterCreating(function (Category $category) {
                // Give random products
                $randomNbOfProducts = rand(0, 200);
                $products = Product::inRandomOrder()->take($randomNbOfProducts)->get();
                $category->products()->attach($products);
            })
            ->count(5)
            ->create();
    }
}
