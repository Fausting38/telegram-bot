<?php

namespace Longman\TelegramBot\Commands\UserCommands;

use Fenris\Bot\Docs;
use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Exception\TelegramException;

/**
 * Справочная команда
 *
 * @package Longman\TelegramBot\Commands\SystemCommands
 */
class HelpCommand extends UserCommand
{
    protected $name = 'help';

    protected $description = 'Help command';

    protected $usage = '/help';

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
        return $this->replyToChat(
            "Пока я умею не очень много 🤐",
            ['reply_markup' => Docs::getInlineKeyboard()]
        );
    }
}
