<?php

namespace App\Booking\Infrastructure;

use App\Booking\Domain\Booking;
use App\Booking\Domain\BookingRepository;

class InMemoryBookingRepository implements BookingRepository
{
    private $bookings = [];

    public function create(Booking $booking): void
    {
        $this->bookings[] = $booking;
    }
}
