<?php

namespace TelegramBot\Console;

/**
 * @property string $name;
 * @property string $description;
 */
interface BaseCommandInterface
{
    public function execute();
}