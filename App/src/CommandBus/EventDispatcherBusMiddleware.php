<?php

namespace App\CommandBus;

use App\Common\Domain\Command;
use App\Common\Domain\CommandResponse;
use App\EventBus\EventBus;

class EventDispatcherBusMiddleware implements CommandBusMiddleware
{
    private $eventBus;

    public function __construct(CommandBusMiddleware $next, EventBus $eventBus)
    {
        $this->bus = $next;
        $this->eventBus = $eventBus;
    }

    public function dispatch(Command $command): CommandResponse
    {
        $commandResponse = $this->next->dispatch($command);

        foreach($commandResponse->events as $event) {
            $this->eventBus->dispatch($event);
        }

        return $commandResponse;
    }
}
