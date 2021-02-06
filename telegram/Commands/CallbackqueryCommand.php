<?php

namespace Longman\TelegramBot\Commands\UserCommand;

use Fenris\Bot\Docs;
use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Request;

class CallbackqueryCommand extends UserCommand
{
    /**
     * @var string
     */
    protected $name = 'callbackquery';

    /**
     * @var string
     */
    protected $description = 'Handle the callback query';

    /**
     * @var string
     */
    protected $version = '1.2.0';

    /**
     * Main command execution
     *
     * @return ServerResponse
     * @throws \Exception
     */
    public function execute(): ServerResponse
    {
        $callback_query = $this->getCallbackQuery();
        $callback_data = $callback_query->getData();

        switch ($callback_data) {
            case '/docs':
                return $this->docs($callback_query);
            default:
                return $callback_query->answer(
                    [
                        'text' => 'Такого я не ожидал 🤔',
                        'show_alert' => true,
                    ]
                );
        }
    }

    /**
     * Коллбэк на возвращение доков
     *
     * @param $callback_query
     * @return ServerResponse
     */
    private function docs($callback_query)
    {
        return Request::editMessageText(
            [
                'chat_id' => $callback_query->getFrom()->getId(),
                'message_id' => $callback_query->getMessage()->getMessageId(),
                'text' => Docs::getDocs() . "\n\nВаше обращение зарегистрировано под номером \n№{$callback_query->getId()}",
                'reply_markup' => Docs::getInlineKeyboard()
            ]
        );
    }
}
