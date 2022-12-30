<?php

namespace App\Tests;

use App\Booking\Command\BookARoomCommand;
use App\Booking\Command\BookARoomCommandHandler;
use App\Booking\Infrastructure\InMemoryBookingRepository;
use App\Common\ValueObject\Uuid;
use PHPUnit\Framework\TestCase;

class BookARoomTest extends TestCase
{
    /**
     * @test
     * @covers
     */
    public function shouldReturnBookinIdOnBookingSuccess()
    {
        $command = new BookARoomCommand(1, "01-01-2022", "01-12-2022");
        $BookingRepository = new InMemoryBookingRepository();
        $commandHandler = new BookARoomCommandHandler($BookingRepository);
        $response = $commandHandler->handle($command);
        $this->assertInstanceOf(Uuid::class, $response->value);
    }
}
