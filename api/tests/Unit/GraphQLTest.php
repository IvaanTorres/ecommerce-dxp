<?php

namespace Tests\Unit;

use Tests\TestCase;

class GraphQLTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testQueriesPosts(): void
    {
        $this->markTestSkipped('must be revisited.');

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
