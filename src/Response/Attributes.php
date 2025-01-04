<?php

namespace TelegramBot\Response;

trait Attributes
{



    public $update;
    public $chatID;
    public $text;
    public $messageID;




    private function initAttribute()
    {
        $content = file_get_contents("php://input");

        // Decode the incoming JSON content.
        $this->update = json_decode($content, true); // Decodes the JSON content and stores it in $this->update.
        // logger()->info(json_encode($this->update));
        // Extract relevant information from the update.
        $this->chatID = $this->update['message']['chat']['id']; // Retrieves the chat ID from the update.
        $this->text = persianNumbersToEnglish($this->update['message']['text'])??null; // Converts Persian numbers to English and stores the text content.
        $this->messageID = $this->update['message']['message_id']; // Retrieves the message ID from the update.

    }
}