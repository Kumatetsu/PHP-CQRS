<?php

namespace App\Rooms;

class Room
{
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
}
