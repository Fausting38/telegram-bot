<?php

namespace Fenris\Bot;

use Longman\TelegramBot\Entities\InlineKeyboard;

class Docs
{
    public static function getDocs(): string
    {
        return 'Здесь я смогу показывать документацию... Но не сейчас 🤪';
    }

    public static function getInlineKeyboard(): InlineKeyboard
    {
        return new InlineKeyboard(
            [
                [
                    'text' => 'Могу показать документацию',
                    'callback_data' => '/docs',
                ],
            ], [
                [
                    'text' => 'Мой автор',
                    'url' => 'https://github.com/Fenris-v/',
                ],
            ]
        );
    }
}
