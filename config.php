<?php
namespace ef;

/**
 * Конфигурационный файл.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 */

$config = [
    // настройки подключения к mongodb
    'mongo' => [
        'host'     => '',
        'user'     => '',
        'password' => '',
        'db'       => 'ef'
    ],

    // путь к директории с тестами
    'tests_directory' => __DIR__ . '/tests/checks',

    // путь к директории с тестовыми данными
    'fixtures_directory' => __DIR__ . '/tests/fixtures'
];
