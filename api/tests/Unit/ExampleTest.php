<?php

namespace Tests\Unit;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Product;
use Tests\TestCase;

class Test23 extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testQueriesPosts(): void
    {

        // $product = Product::factory()->create();

        $products = $this->graphQL(
            /** @lang GraphQL */
            '
            {
                products {
                    id
                    name
                }
            }
            '
        );

        $products->assertJson([
            'data' => [
                'products' => [
                    [
                        'id' => 1,
                        'name' => "Product 1",
                    ],
                ],
            ],
        ]);
    }
}
