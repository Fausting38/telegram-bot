<?php

use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Telegram;

require_once '../standalone.php';
require_once 'helpers.php';
require_once 'customAutoload.php';

$config = require_once 'config.php';

try {
    $telegram = new Telegram($config['api_key'], $config['bot_username']);

    $telegram->addCommandsPaths($config['commands']['paths']);

    $telegram->handle();
} catch (TelegramException $exception) {
    writeTelegramLog($exception->getMessage());

    echo $exception->getMessage();
}
