<?php

namespace TelegramBot\Methods;

use TelegramBot\Methods\BaseMethod;

/**
 * @method static Message chatId($chatId)
 * @method  Message chatId($chatId)
 * @method static Message text($text)
 * @method  Message text($text)
 */
class Message extends BaseMethod
{
    protected string $method = 'sendMessage';

    function replyMarkup($keyboard)
    {
        //TODO:fix call this method
        $this->attributes['reply_markup'] = json_encode($keyboard);
        return $this;
    }

}