<?php

namespace App\Exceptions;

use Exception;
use GraphQL\Error\ClientAware;
use Throwable;

class GraphQLException extends Exception implements ClientAware {

    private $category;

    public function __construct(string $message = "", string $category = 'custom') {
        parent::__construct($message);
        $this->category = $category;
    }
    
    public function isClientSafe(): bool {
        return true;
    }

    public function getCategory(): string {
        return $this->category;
    }

}
