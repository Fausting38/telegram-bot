<?php

namespace Longman\TelegramBot\Commands\UserCommands;

use Fenris\Bot\Docs;
use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\InlineKeyboard;
use Longman\TelegramBot\Entities\Keyboard;
use Longman\TelegramBot\Entities\ServerResponse;

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

    public function execute(): ServerResponse
    {
        return $this->replyToChat(
            "Пока я умею не очень много 🤐",
            ['reply_markup' => Docs::getInlineKeyboard()]
        );
    }
}
