<?php

namespace App\CommandBus;

use App\Common\Domain\Command;
use App\Common\Domain\CommandResponse;

interface CommandBusMiddleware
{
    public function dispatch(Command $command): CommandResponse;
}
