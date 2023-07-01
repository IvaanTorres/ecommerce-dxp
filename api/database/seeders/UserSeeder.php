<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\DiscountCode;
use App\Models\Gender;
use App\Models\Product;
use App\Models\Review;
use App\Models\Role;
use App\Models\User;
use App\Models\Whishlist;
use App\Models\Wishlist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(10)
            ->afterMaking(function (User $user) {
                // Give a random role
                $role = Role::inRandomOrder()->first();
                $user->role()->associate($role);
                
                // Give a random gender
                $gender = Gender::inRandomOrder()->first();
                $user->gender()->associate($gender);

                $user->save();
            })
            ->has(
                Cart::factory()
                    ->count(1)
                    ->afterMaking(function (Cart $cart) {
                        // Give random discount code
                        $randomNbOfDiscountCodes = rand(0, 1);

                        if ($randomNbOfDiscountCodes === 1) {
                            $discountCode = DiscountCode::inRandomOrder()->first();
                            $cart->discountCode()->associate($discountCode);
    
                            $cart->save();
                        }
                    })
            )
            ->has(
                Wishlist::factory()
                    ->count(1)
            )
            ->create();
    }
}
