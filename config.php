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

    // путь к директории с модульными тестами
    'unit_tests_directory' => __DIR__ . '/tests/unit',

    // путь к директории с функциональными тестами
    'functional_tests_directory' => __DIR__ . '/tests/functional',

    // путь к директории с тестовыми данными
    'fixtures_directory' => __DIR__ . '/tests/fixtures'
];
