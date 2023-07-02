<?php

namespace App\GraphQL\Directives;

use App\Exceptions\GraphQLException;
use App\Models\Category;
use Exception;
use Nuwave\Lighthouse\Schema\Directives\BaseDirective;
use Nuwave\Lighthouse\Schema\Values\FieldValue;
use Nuwave\Lighthouse\Support\Contracts\FieldResolver;

/* -------------------------------------------------------------------------- */
/*        It fetches all unique brands that the category products have        */
/* -------------------------------------------------------------------------- */
final class AllBrandsByCategoryIdDirective extends BaseDirective implements FieldResolver
{
    // TODO implement the directive https://lighthouse-php.com/master/custom-directives/getting-started.html

    public static function definition(): string
    {
        return /** @lang GraphQL */ <<<'GRAPHQL'
directive @allBrandsByCategoryId on FIELD_DEFINITION
GRAPHQL;
    }

    /**
     * Set a field resolver on the FieldValue.
     *
     * This must call $fieldValue->setResolver() before returning
     * the FieldValue.
     *
     * @param  \Nuwave\Lighthouse\Schema\Values\FieldValue  $fieldValue
     * @return \Nuwave\Lighthouse\Schema\Values\FieldValue
     */
    public function resolveField(FieldValue $fieldValue)
    {
        $fieldValue->setResolver(function ($root, array $args) {
            $categoryId = $args['categoryId'];

            // Retrieve the category by ID
            $category = Category::find($categoryId);

            if(!$category) {
                // Throw a graphql error
                throw new GraphQLException('Category not found', 'Category');
            }
            // Return the brands associated with the category's products
            return $category->products->pluck('brand')->unique();
        });

        return $fieldValue;
    }
}
