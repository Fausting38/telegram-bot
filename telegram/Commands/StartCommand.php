<?php

namespace Longman\TelegramBot\Commands\SystemCommand;

use Fenris\Bot\Help;
use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Exception\TelegramException;

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

    /**
     * Исполняющий метод
     *
     * @return ServerResponse
     * @throws TelegramException
     */
    public function execute(): ServerResponse
    {
        $message = $this->getMessage();

        return $this->replyToChat(
            "Привет, {$message->getFrom()->getFirstName()}! \nЯ - бот помощник. Напиши мне /help, чтобы узнать, что я умею.",
            ['reply_markup' => Help::getHelpBtn()]
        );
    }
}
