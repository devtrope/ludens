<?php

namespace App\Rules;

use Ludens\Validation\Contracts\RuleInterface;

class CustomRule implements RuleInterface
{
    public function validate(mixed $value): bool
    {
        return true;
    }

    public function message(string $field): string
    {
        return "";
    }
}
