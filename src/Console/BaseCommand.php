<?php

namespace TelegramBot\Console;

abstract class BaseCommand implements BaseCommandInterface
{

    public static function getName()
    {
        return (new static())->name;
    }
    public static function getDescription()
    {
        return (new static())->description;
    }


}