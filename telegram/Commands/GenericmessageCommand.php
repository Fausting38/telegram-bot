<?php

namespace Longman\TelegramBot\Commands\SystemCommand;

use Fenris\Bot\Help;
use Fenris\Bot\Weather;
use GuzzleHttp\Exception\GuzzleException;
use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Telegram;

class GenericmessageCommand extends SystemCommand
{
    protected $name = Telegram::GENERIC_MESSAGE_COMMAND;

    protected $description = 'Handle generic message';

    protected $version = '0';

    /**
     * Исполняющий метод
     *
     * @return ServerResponse
     * @throws TelegramException|GuzzleException
     */
    public function executeNoDb(): ServerResponse
    {
        return $this->generalAnswer();
    }

    /**
     * Исполняющий метод
     *
     * @return ServerResponse
     * @throws TelegramException|GuzzleException
     */
    public function execute(): ServerResponse
    {
        return $this->generalAnswer();
    }

    /**
     * Общий метод ответа
     *
     * @return ServerResponse
     * @throws TelegramException|GuzzleException
     */
    private function generalAnswer(): ServerResponse
    {
        file_put_contents(
            $_SERVER['DOCUMENT_ROOT'] . '/conf.txt',
            json_encode($this->getConfig(), JSON_PRETTY_PRINT),
            FILE_APPEND
        );

        $location = $this->getMessage()->getLocation() ?? null;
        if ($location) {
            return $this->replyToChat((new Weather)->getWeather($location));
        }

        return $this->replyToChat(
            "Команды начинаются с символа слэш - / \nЧтобы увидеть списко доступных команды перейдите в раздел помощи",
            ['reply_markup' => Help::getHelpBtn()]
        );
    }
}
