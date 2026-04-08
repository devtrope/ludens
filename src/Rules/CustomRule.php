<?php

namespace App\Rules;

use Ludens\Validation\AbstractRule;
use Ludens\Validation\Contracts\RuleInterface;

class CustomRule extends AbstractRule implements RuleInterface
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
