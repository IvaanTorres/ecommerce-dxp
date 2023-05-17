<?php

namespace Database\Seeders;

use App\Models\Star;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Star::factory()
            ->count(6)
            ->sequence(fn ($sequence) => [
                'value' => $sequence->index
            ])
            ->create();
    }
}
