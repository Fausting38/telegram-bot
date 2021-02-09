<?php

namespace Longman\TelegramBot\Commands\UserCommand;

use Exception;
use Fenris\Bot\Docs;
use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Request;
use selectorException;

/**
 * Обработка команд содержащих коллбэк
 *
 * @package Longman\TelegramBot\Commands\UserCommand
 */
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
    protected $version = '0';

    /**
     * Исполняющий метод
     *
     * @return ServerResponse
     * @throws Exception
     */
    public function execute(): ServerResponse
    {
        $callback_query = $this->getCallbackQuery();
        $callback_data = $callback_query->getData();

        $dataArr = explode(' ', $callback_data);

        switch ($dataArr[0]) {
            case '/docs':
                return $this->generalDocs($callback_query, $dataArr);

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
     * @param object $callback_query
     * @param array  $dataArr
     * @return ServerResponse
     * @throws selectorException
     */
    private function generalDocs(object $callback_query, array $dataArr = []): ServerResponse
    {
        $id = !isset($dataArr[1]) ? 0 : (int)$dataArr[1];

        $docs = Docs::getDocs($id);

        return Request::editMessageText(
            [
                'chat_id' => $callback_query->getFrom()->getId(),
                'message_id' => $callback_query->getMessage()->getMessageId(),
                'text' => $docs['text'],
                'reply_markup' => $docs['reply_markup'],
                'parse_mode' => 'Markdown'
            ]
        );
    }
}
