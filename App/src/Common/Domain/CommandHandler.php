<?php

namespace App\Common\Domain;

interface CommandHandler {
    public function handle(Command $command);
    public function listenTo(): string;
}
