<?php

namespace App\CommandBus;

class CommandBusFactory
{
    static function build(iterable $handlers): CommandBusMiddleware
    {
        return new LoggerMiddleware(
            new CommandBusDispatcher($handlers)
        );
    }
}
