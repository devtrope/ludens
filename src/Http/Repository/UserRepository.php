<?php

namespace App\Http\Repository;

use App\Http\Model\User;
use Ludens\Framework\AbstractRepository;

class UserRepository extends AbstractRepository
{
    public function getModel(): string
    {
        return User::class;
    }

    public function getTable(): string
    {
        return 'users';
    }
}
