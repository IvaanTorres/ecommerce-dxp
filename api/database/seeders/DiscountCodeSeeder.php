<?php

namespace Database\Seeders;

use App\Models\DiscountCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DiscountCode::factory()
            ->count(100)
            ->create();
    }
}
