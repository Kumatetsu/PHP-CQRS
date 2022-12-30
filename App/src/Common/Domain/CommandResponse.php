<?php

namespace App\Common\Domain;

class CommandResponse
{
    public $value;

    private function __construct($value, array $events)
    {
        $this->value = $value;
        $this->events = $events;
    }

    public static function withValue($value, Event... $events) : CommandResponse
    {
        return new self($value, $events);
    }
}
