<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::factory()
            ->count(3)
            ->sequence(fn ($sequence) => [
                'name' => $sequence->index === 0 
                    ? 'admin' 
                    : ($sequence->index === 1 
                        ? 'user' 
                        : 'guest')
            ])
            ->create();
    }
}
