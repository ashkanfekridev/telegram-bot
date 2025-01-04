<?php

namespace TelegramBot\Foundation;

use Dotenv\Dotenv;
use TelegramBot\Methods\Message;
use TelegramBot\Response\Attributes;

class Application
{

    use Attributes;

    const  VERSION = '1.0.0';
    private array $consoleCommands = [];
    public array $botCommands = [];
    public array $arguments = [];


    public function __construct(private $basePath)
    {
        $this->loadEnvFile();
    }


    private function loadEnvFile(): void
    {
        $dotenv = Dotenv::createImmutable($this->basePath);
        $dotenv->load();

    }


    public function handleRequest()
    {

        return match ($_SERVER['REQUEST_URI']) {
            "/up" => $this->up(),
            "/bot" => $this->bot(),
            default => $this->home()
        };


    }


    private function up()
    {
        return require __DIR__ . '/../up/index.php';

    }

    private function bot()
    {
        $this->initAttribute();
        if ($this->hasBotCommand())
            return $this->handleBotCommand();
    }


    protected function hasBotCommand()
    {
        $message = $this->update['message']['entities'][0]['type'] ?? null;
        return $message == "bot_command";
    }

    private function handleBotCommand()
    {

        $command = $this->update['message']['text'];

        $command = explode(" ", $command);


        if (isset($command[1]))
            $this->arguments = $command;

        foreach ($this->botCommands as $key => $action) {
            dd([$key, $command[0]]);
            if ($key == $command[0]) {
                return (new $action)->execute($this);
            }
        }

        Message::chatId($this->chatID)->text('دستور مورد نظر شما وجود ندارد!');
        exit();
    }


    public function handleCommand()
    {
        global $argv;
        $input = $argv[1] ?? null;

        if ($input) {
            foreach ($this->consoleCommands as $command) {
                if ($command::getName() === $input) {
                    (new $command)->execute();
                    exit;
                }
            }
            echo "Command not found.\n";
        } else {
            echo "Please provide a command.\n";
            echo "Available commands:\n";
            foreach ($this->consoleCommands as $command) {
                echo $command::getName() . " - " . $command::getDescription() . "\n";
            }
        }


    }

    public function registerConsoleCommands(array $commands): static
    {
        $this->consoleCommands = $commands;
        return $this;
    }

    private function home()
    {
        echo "<h1 style='margin: 20% 10%; text-align: center'>";
        echo "Hello 🤖👋";
        echo "</h1>";
    }

}