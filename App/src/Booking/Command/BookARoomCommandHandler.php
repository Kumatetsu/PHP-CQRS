<?php

namespace App\Booking\Command;

use App\Booking\Domain\Booking;
use App\Booking\Domain\BookingRepository;
use App\Common\Domain\Command;
use App\Common\Domain\CommandHandler;
use App\Common\Domain\CommandResponse;

class BookARoomCommandHandler implements CommandHandler
{
    private $bookingRepository;

    public function __construct(BookingRepository $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function handle(Command $command)
    {
        $booking = new Booking(
            $command->roomId,
            new \DateTimeImmutable($command->startDate),
            new \DateTimeImmutable($command->endDate)
        );
        $this->bookingRepository->create($booking);

        return CommandResponse::withValue($booking->id);
    }

    public function listenTo(): string
    {
        return BookARoomCommand::class;
    }
}
