<?php
/**
 * Конфигурации бота
 */

// https://api.telegram.org/bot~token~/setWebhook?url=https:%20//example.ru/path

return [
    'api_key' => 'key',
    'bot_username' => 'super_bot',
    'hook_url' => 'https://site.ru/telegram/hook.php',
    'commands' => [
        'paths' => [
            __DIR__ . '/Commands/',
        ]
    ]
];
