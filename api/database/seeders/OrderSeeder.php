<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::factory()
            ->count(50)
            ->afterMaking(function (Order $order) {
                // Give a random user
                $user = User::inRandomOrder()->first();
                $order->user()->associate($user);
            })
            ->create();
    }
}
