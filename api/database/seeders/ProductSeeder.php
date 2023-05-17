<?php

namespace Database\Seeders;

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
        // TODO: Random nb of reviews

        // Product::factory()
        // ->count(10)
        // ->has(
        //     Review::factory()
        //         ->count(3)
        // )
        // ->sequence(fn ($sequence) => [
        //     'nb_reviews' => 3,
        // ])
        // ->create();
    }
}
