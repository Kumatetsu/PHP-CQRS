<?php

namespace App\CommandBus;

use App\Common\Domain\CommandResponse;

class CommandBusDispatcher implements CommandBusMiddleware
{
    private $commandHandlers;

    public function __construct(iterable $commandHandlers)
    {
        foreach ($commandHandlers as $commandHandler) {
            $this->commandHandlers[$commandHandler->listenTo()] = $commandHandler;
        }
    }

    public function dispatch($command): CommandResponse
    {
        $commandName = get_class($command);
        $commandHandler = $this->commandHandlers[$commandName];

        return $commandHandler->handle($command);
    }
}
