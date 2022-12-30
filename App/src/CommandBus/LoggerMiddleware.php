<?php

namespace App\CommandBus;

use App\Common\Domain\Command;
use App\Common\Domain\CommandResponse;

class LoggerMiddleware implements CommandBusMiddleware
{
    private $next;
    public function __construct(CommandBusMiddleware $next)
    {
        $this->next = $next;
    }

    public function dispatch(Command $command): CommandResponse
    {
        print('log');
        $response = $this->next->dispatch($command);

        return $response;
    }
}
