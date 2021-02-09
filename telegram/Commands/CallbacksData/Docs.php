<?php

namespace Fenris\Bot;

use Longman\TelegramBot\Entities\InlineKeyboard;
use selector;
use selectorException;
use umiHierarchy;

/**
 * Класс возвращающий необходимые данные по документации
 *
 * @package Fenris\Bot
 */
class Docs
{
    /**
     * Метод для получения и вывода документации
     *
     * @param int $id
     * @return array
     * @throws selectorException
     */
    public static function getDocs(int $id): array
    {
        $sel = new selector('pages');
        $sel->types('hierarchy-type')->name('content', 'page');
        $sel->where('domain')->equals(2);
        $sel->where('hierarchy')->page($id)->level(1);
        $sel->order('ord')->asc();
        $result = $sel->result();

        $keyboard = Docs::getKeyboard($result);

        if ($id !== 0) {
            $keyboard->addRow(
                [
                    'text' => 'В корневой раздел',
                    'callback_data' => '/docs 0',
                ]
            );
        }

        $answer = $id === 0
            ? $answer = "В главном разделе доступны следующие статьи:\n\n"
            : Docs::getPageContent($id);

        return [
            'text' => $answer,
            'reply_markup' => $keyboard,
        ];
    }

    /**
     * Клавиатура
     *
     * @return InlineKeyboard
     */
    public static function getInlineKeyboard(): InlineKeyboard
    {
        return new InlineKeyboard(
            [
                [
                    'text' => 'Могу показать документацию',
                    'callback_data' => '/docs 0',
                ],
            ], [
                [
                    'text' => 'Мой автор',
                    'url' => 'https://github.com/Fenris-v/',
                ],
            ]
        );
    }

    /**
     * Создает клавиатуру с колбэками для вызова дочерних страниц
     *
     * @param $data
     * @return InlineKeyboard
     */
    private static function getKeyboard($data): InlineKeyboard
    {
        $keyboard = new InlineKeyboard([]);
        $row = [];
        foreach ($data as $key => $item) {
            $row[] = [
                'text' => $item->getName(),
                'callback_data' => '/docs ' . $item->getId(),
            ];

            if ($key % 2 === 0 && $key !== array_key_last($data)) {
                continue;
            }

            if (isset($row[1])) {
                $keyboard->addRow($row[0], $row[1]);
            } else {
                $keyboard->addRow($row[0]);
            }

            $row = [];
        }

        return $keyboard;
    }

    /**
     * Получает контент со страницы
     *
     * @param int $id
     * @return string
     */
    private static function getPageContent(int $id): string
    {
        $page = umiHierarchy::getInstance()->getElement($id);
        $content = $page->getValue('content');

        $path = umiHierarchy::getInstance()->getPathById($id);

        return $content
            ? strip_tags($content) . "\nПолная версия доступна по ссылке:\n$path"
            : "Контент не найден 😦 \nОбратитесь к данной документации по ссылке: \n$path";
    }
}
