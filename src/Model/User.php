<?php

namespace App\Model;

use Ludens\Framework\ModelInterface;

class User implements ModelInterface
{
    private int $id;

    public function id(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function hasOne(): array
    {
        return [];
    }

    public function rules(): array
    {
        return [];
    }

    public function fillable(): array
    {
        return [];
    }
}
