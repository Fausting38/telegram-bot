<?php
/**
 * Кастомный автозагрузчик классов
 */

spl_autoload_register(
    function ($class)  {
        $namespaceArr = explode('\\', $class);

        $file =__DIR__ . '/Commands/CallbacksData/' . end($namespaceArr) . '.php';

        if (file_exists($file)) {
            /** @noinspection PhpIncludeInspection */
            require_once $file;
        }
    }
);
