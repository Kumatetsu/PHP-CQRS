<?php

namespace App\Booking\Domain;

interface BookingRepository
{
    public function create(Booking $booking): void;
}
