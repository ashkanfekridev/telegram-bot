<?php

namespace App\Console\Commands;

use TelegramBot\Console\BaseCommand;
use TelegramBot\Request\Request;

class SetWebHookCommand extends BaseCommand
{
    public $name = 'set:webhook';
    protected $description = 'setting telegram webhook';

    public function execute()
    {
        echo "\033[37m"."start setting\n";
        $request = new Request();
       $response = $request->make('setWebhook', [
            'url' => env('APP_URL')
        ]);

        echo "\033[92m".json_decode($response)?->description;
    }
}