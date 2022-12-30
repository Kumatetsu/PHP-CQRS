<?php

namespace App\EventBus;

use App\Common\Domain\Event;

class EventBus
{
    private $handlers = [];

    public function __construct(iterable $handlers)
    {
        foreach ($handlers as $handler) {
            $this->handlers[] = $handler;
        }
    }

    public function dispatch(Event $event): void
    {
        $eventName = get_class($event);

        $matchingHandlers = array_filter(
            $this->handlers,
            function ($handler) use ($eventName) {
                return $handler->listenTo() === $eventName;
            }
        );

        foreach ($matchingHandlers as $handler) {
            $handler->handle($event);
        }
    }
}
