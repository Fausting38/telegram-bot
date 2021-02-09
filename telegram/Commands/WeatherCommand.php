<?php

namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\Keyboard;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Exception\TelegramException;

/**
 * Команда просмотра погоды
 *
 * @package Longman\TelegramBot\Commands\UserCommands
 */
class WeatherCommand extends UserCommand
{
    protected $name = 'weather';

    protected $description = 'Show weather by location';

    protected $usage = '/weather';

    protected $version = 0;

    /**
     * Исполняющий метод
     *
     * @return ServerResponse
     * @throws TelegramException
     */
    public function execute(): ServerResponse
    {
        $keyboard = new Keyboard(
            [
                [
                    'text' => 'Отправить вашу локацию',
                    'request_location' => true,
                ],
            ]
        );

        $keyboard->setResizeKeyboard(true);

        return $this->replyToChat(
            "Отправьте мне ваши координаты и я смогу показать погоду.\nВАЖНО! Чтобы телеграм отправил вашу геолокацию, на телефоне должен быть включен GPS.",
            [
                'reply_markup' => $keyboard,
            ]
        );
    }
}
