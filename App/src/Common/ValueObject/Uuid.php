<?php

namespace App\Common\ValueObject;

class Uuid
{
    public $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public static function generate() : Uuid
    {
        return new self(uniqid());
    }
}
