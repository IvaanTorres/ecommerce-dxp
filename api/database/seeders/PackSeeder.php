<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Pack;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pack::factory()
            ->count(50)
            ->afterMaking(function (Pack $pack) {                
                // Give a random product
                $product = Product::inRandomOrder()->first();
                $pack->product()->associate($product);

                // If the pack is in a cart, it can't be in an order
                $isPackOrdered = rand(0, 1);
                if ($isPackOrdered) {
                    // Give a random order
                    $order = Order::inRandomOrder()->first();
                    $pack->order()->associate($order);
                } else {
                    // Give a random cart
                    $cart = Cart::inRandomOrder()->first();
                    $pack->cart()->associate($cart);
                }
            })
            ->create();
    }
}
