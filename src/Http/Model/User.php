<?php

namespace App\Http\Model;

class User
{
    private int $id;

    public function id()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}
