<?php

namespace Longman\TelegramBot\Commands\UserCommand;

use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Exception\TelegramException;

class GenericCommand extends UserCommand
{
    /**
     * @var string
     */
    protected $name = 'generic';

    /**
     * @var string
     */
    protected $description = 'Handles generic commands or is executed by default when a command is not found';

    /**
     * @var string
     */
    protected $version = '0';

    public function execute(): ServerResponse
    {
        return $this->replyToChat(
            "Команда не найдена 😢 \nОбратитесь к справке /help"
        );
    }
}
