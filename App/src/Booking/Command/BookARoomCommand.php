<?php

namespace App\Booking\Command;

use App\Common\Domain\Command;

class BookARoomCommand implements Command
{
    public $roomId;
    public $startDate;
    public $endDate;

    public function __construct(int $roomId, string $startDate, string $endDate)
    {
        $this->roomId = $roomId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
}
