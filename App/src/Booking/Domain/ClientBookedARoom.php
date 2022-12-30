<?php

namespace App\Booking\Domain;

use App\Common\Domain\Event;
use App\Common\ValueObject\Uuid;

class ClientBookedARoom implements Event
{
    public $roomId;
    public $clientId;

    public function __construct(Uuid $roomId, Uuid $clientId)
    {
        $this->roomId = $roomId;
        $this->clientId = $clientId;
    }
}
