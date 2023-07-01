<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            // Acocounting side
            RoleSeeder::class,
            GenderSeeder::class,
            DiscountCodeSeeder::class,
            UserSeeder::class,

            // Front Office side
            DiscountSeeder::class,
            BrandSeeder::class,
            ProductSeeder::class,
            ReviewSeeder::class,
            CategorySeeder::class,
            OrderSeeder::class,
            PackSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Product::factory(10)
        // ->sequence(fn ($sequence) =>
        //     [
        //         'name' => 'Product '.$sequence->index + 1,
        //         'description' => 'Description '.$sequence->index + 1,
        //         'price' => 10.00,
        //         'stock' => 10,
        //         'nb_stars_id' => 1,
        //         'nb_reviews' => 0,
        //         'brand_id' => 1,
        //         'discount_id' => 1,
        //         'weight' => 10,
        //         'final_price' => 10.00,
        //         'ref' => 'REF'.$sequence->index + 1,
        //     ])
        // ->create();
    }
}
