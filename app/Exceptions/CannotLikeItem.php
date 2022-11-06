<?php 

namespace App\Exceptions; 

use Exception;

class CannotLikeItem extends Exception
{
    public static function alreadyLiked(string $item): self {
        return new self("The {$item} cannot be liked multiple times");
    }
}