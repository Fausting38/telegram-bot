<?php
/**
 * Зарегистрировать webhook
 */

use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Telegram;

require_once '../standalone.php';

$config = require_once 'config.php';

try {
    $telegram = new Telegram($config['api_key'], $config['bot_username']);

    $result = $telegram->setWebhook($config['hook_url']);

    if ($result->isOk()) {
        echo $result->getDescription();
    }
} catch (TelegramException $exception) {
    echo $exception->getMessage();
}
