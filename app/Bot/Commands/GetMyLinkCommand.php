<?php

namespace App\Bot\Commands;

use TelegramBot\Foundation\Application;
use TelegramBot\Methods\Message;

class GetMyLinkCommand
{
    public function execute(Application $application)
    {
        Message::chatId($application->chatID)->text("https://t.me/GapToMeBot?start=".$application->chatID);
    }
}