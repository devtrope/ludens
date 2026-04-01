<?php

namespace App\Model;

class User
{
    private int $id;

    public function id()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }
}
