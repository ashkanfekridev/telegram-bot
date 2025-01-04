<?php


use TelegramBot\Foundation\Application;

define('BOT_START', microtime(true));

require __DIR__ . '/vendor/autoload.php';

/**
 * @var $app Application
 */
$app = (require __DIR__ . '/bootstrap/app.php');



$app->botCommands = [
    '/start'=> 'App\\Bot\\Commands\\StartCommand',
    '/me'=>'App\\Bot\\Commands\\GetMyLinkCommand'
];









$app->handleRequest();