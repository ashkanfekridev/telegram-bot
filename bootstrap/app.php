<?php

use TelegramBot\Foundation\Application;





$consoleCommands = [
    'App\\Console\\Commands\\SetWebHookCommand'
];



return (new Application(__DIR__.'/../'))
    ->registerConsoleCommands($consoleCommands);

