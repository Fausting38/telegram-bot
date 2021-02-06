<?php
//
//namespace Longman\TelegramBot\Commands\UserCommands;
//
//use Longman\TelegramBot\Commands\UserCommand;
//use Longman\TelegramBot\Entities\InlineKeyboard;
//use Longman\TelegramBot\Entities\Keyboard;
//use Longman\TelegramBot\Entities\ServerResponse;
//use selector;
//
///**
// * Команда получения документации
// *
// * @package Longman\TelegramBot\Commands\SystemCommands
// */
//class DocsCommand extends UserCommand
//{
//    protected $name = 'docs';
//
//    protected $description = 'Help command';
//
//    protected $usage = '/docs';
//
//    protected $version = '0';
//
//    protected $private_only = false;
//
//    public function execute(): ServerResponse
//    {
//        $sel = new selector('pages');
//        $sel->types('hierarchy-type')->name('content', 'page');
//        $sel->where('domain')->equals(2);
//        $sel->where('hierarchy')->page(0)->level(1);
//        $sel->order('ord')->asc();
//
////        $keyboard = [];
////        foreach ($sel->result() as $item) {
////
////        }
//
//        $keyboards = [];
//
//        // Simple digits
//        $keyboards[] = new Keyboard(
//            ['7', '8', '9'],
//            ['4', '5', '6'],
//            ['1', '2', '3'],
//            [' ', '0', ' ']
//        );
//
//        $inline_keyboard = new InlineKeyboard(
//            [
//                ['text' => 'Inline Query (current chat)', 'switch_inline_query_current_chat' => 'inline query...'],
//                ['text' => 'Inline Query (other chat)', 'switch_inline_query' => 'inline query...'],
//            ], [
//                ['text' => 'Callback', 'callback_data' => 'identifier'],
//                ['text' => 'Open URL', 'url' => 'https://github.com/php-telegram-bot/example-bot'],
//            ]
//        );
//
////
////        // Digits with operations
////        $keyboards[] = new Keyboard(
////            ['7', '8', '9', '+'],
////            ['4', '5', '6', '-'],
////            ['1', '2', '3', '*'],
////            [' ', '0', ' ', '/']
////        );
////
////        // Short version with 1 button per row
////        $keyboards[] = new Keyboard('A', 'B', 'C');
////
////        // Some different ways of creating rows and buttons
////        $keyboards[] = new Keyboard(
////            ['text' => 'A'],
////            'B',
////            ['C', 'D']
////        );
////
////        // Buttons to perform Contact or Location sharing
////        $keyboards[] = new Keyboard(
////            [
////                ['text' => 'Send my contact', 'request_contact' => true],
////                ['text' => 'Send my location', 'request_location' => true],
////            ]
////        );
////
////        // Shuffle our example keyboards and return a random one
////        shuffle($keyboards);
//        $keyboard = end($keyboards)
//            ->setResizeKeyboard(true)
//            ->setOneTimeKeyboard(true)
//            ->setSelective(false);
//
////        $callback_query = $this->getCallbackQuery();
////        $callback_data  = $callback_query->getData();
//
////        file_put_contents(
////            $_SERVER['DOCUMENT_ROOT'] . '/test2.txt',
////            json_encode((array)$callback_query, JSON_PRETTY_PRINT),
////            FILE_APPEND
////        );
////
////        return $this->replyToChat(
////            "К сожалению меня пока ничему не научили 🤐",
////            ['reply_markup' => Keyboard::remove(),]
////        );
//
//        return $this->replyToChat(
//            "К сожалению меня пока ничему не научили 🤐",
//            ['reply_markup' => $inline_keyboard]
//        );
//
//        return $this->replyToChat(
//            "К сожалению меня пока ничему не научили 🤐",
//            ['reply_markup' => $keyboard]
//        );
//    }
//}
