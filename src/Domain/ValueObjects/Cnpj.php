<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use Respect\Validation\Validator as v;

// PHP 8.2
readonly class Cnpj implements \Stringable
{
    public function __construct(
        protected string $value
    ) {
        $isValid = v::cnpj()->validate($value);

        if (!$isValid) {
            throw new \InvalidArgumentException('Cnpj invalido');
        }
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
