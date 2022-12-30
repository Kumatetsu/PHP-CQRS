<?php

namespace App\Booking\Domain;

use App\Common\Domain\Entity;
use App\Common\ValueObject\Uuid;
use DateTimeImmutable;

class Booking implements Entity
{
    public function __construct(int $roomId, DateTimeImmutable $startDate, DateTimeImmutable $endDate)
    {
        $this->id = Uuid::generate();
        $this->roomId = $roomId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
}
