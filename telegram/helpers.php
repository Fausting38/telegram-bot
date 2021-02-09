<?php
/**
 * Хелперы для бота
 */

if (!function_exists('writeTelegramLog')) {
    function writeTelegramLog($message): void
    {
        if (!file_exists(__DIR__ . '/logs')) {
            mkdir(__DIR__ . '/logs');
        }

        file_put_contents(
            __DIR__ . '/logs/error-log.txt',
            date('d-M-Y H-i-s', time()) . ' ' . $message . PHP_EOL,
            FILE_APPEND | LOCK_EX
        );
    }
}
