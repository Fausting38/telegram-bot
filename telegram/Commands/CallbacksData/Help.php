<?php

namespace Fenris\Bot;

use Longman\TelegramBot\Entities\Keyboard;

/**
 * Класс возвращающий необходимые данные по документации
 *
 * @package Fenris\Bot
 */
class Help
{
    /**
     * Возвращает кнопку с командой /help
     *
     * @return Keyboard
     */
    public static function getHelpBtn(): Keyboard
    {
        $keyboard = new Keyboard([['text' => '/help']]);

        $keyboard->setOneTimeKeyboard(true)
            ->setResizeKeyboard(true);

        return $keyboard;
    }
}
