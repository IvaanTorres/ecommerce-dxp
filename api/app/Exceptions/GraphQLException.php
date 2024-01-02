<?php

namespace App\Exceptions;

use Exception;
use GraphQL\Error\ClientAware;
use Throwable;

class GraphQLException extends Exception implements ClientAware {
    
    public function isClientSafe(): bool {
        return true;
    }

}
