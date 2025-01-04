<?php

namespace App\Bot\Commands;

use TelegramBot\Foundation\Application;
use TelegramBot\Methods\Message;

class StartCommand
{
    public function execute(Application $application)
    {
        if (isset($application->arguments[1]))
            return Message::chatId($application->chatID)
                ->text("شما در حال ارسال پیام به کاربر با ایدی: " . $application->arguments[1] . "هستید.");

        return Message::chatId($application->chatID)
            ->text('سلام خوش اومدید');
    }
}