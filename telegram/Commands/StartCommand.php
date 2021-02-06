<?php

namespace Longman\TelegramBot\Commands\SystemCommand;

use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\Keyboard;
use Longman\TelegramBot\Entities\ServerResponse;

/**
 * Стартовая команда
 *
 * @package Longman\TelegramBot\Commands\SystemCommands
 */
class StartCommand extends SystemCommand
{
    protected $name = 'start';

    protected $description = 'Start command';

    protected $usage = '/start';

    protected $version = '0';

    protected $private_only = false;

    public function execute(): ServerResponse
    {
        $message = $this->getMessage();

        $keyboard = new Keyboard([['text' => '/help']]);

        $keyboard->setOneTimeKeyboard(true)
            ->setResizeKeyboard(true);

        return $this->replyToChat(
            "Привет, {$message->getFrom()->getFirstName()}! \nЯ - бот помощник. Напиши мне /help, чтобы узнать, что я умею.",
            ['reply_markup' => $keyboard]
        );
    }
}
