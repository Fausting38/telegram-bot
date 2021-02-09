<?php

use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Telegram;

require_once '../standalone.php';
require_once 'helpers.php';
require_once 'customAutoload.php';

$config = require_once 'config.php';

$sel = new selector('pages');
$sel->types('hierarchy-type')->name('content', 'page');
$sel->where('domain')->equals(2);
$sel->where('hierarchy')->page(0)->level(1);
$sel->order('ord')->asc();

//$keyboard = [];
//foreach ($sel->result() as $key => $item) {
//    if ($key % 2 === 1) {
//        $keyboard[array_key_last($keyboard)][] = [
//            'text' => $item->getName(),
//            'callback_data' => '/docs ' . $item->getId(),
//        ];
//
//        continue;
//    }
//
//    $keyboard[] = [
//        [
//            'text' => $item->getName(),
//            'callback_data' => '/docs ' . $item->getId(),
//        ],
//    ];
//}
//
//function testTest(...func_get_args())
//{
//    echo '<pre>';
//    var_dump($keyboard);
//    echo '</pre>';
//}
//
//testTest($keyboard);

//echo '<pre>';
//var_dump($keyboard);
//echo '</pre>';

try {
    $telegram = new Telegram($config['api_key'], $config['bot_username']);

    $telegram->addCommandsPaths($config['commands']['paths']);

    $telegram->handle();
} catch (TelegramException $exception) {
    writeTelegramLog($exception->getMessage());

    echo $exception->getMessage();
}
