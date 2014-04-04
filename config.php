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

    // алиасы
    'command_aliases' => [
        'up'  => 'skill',
        'add' => 'skill'
    ],

    // настройка уровней навыка
    'skill_levels' => [
        1 => ['repeat' => 0],
        2 => ['repeat' => 5],
        3 => ['repeat' => 60],
        4 => ['repeat' => 432000],
        5 => ['repeat' => 0],
    ],

    // путь к директории с модульными тестами
    'unit_tests_path' => __DIR__ . '/tests/unit',

    // путь к директории с функциональными тестами
    'functional_tests_path' => __DIR__ . '/tests/functional',

    // путь к директории с тестовыми данными
    'fixtures_path' => __DIR__ . '/tests/fixtures',

    // путь к директории с отчётами
    'reports_path' => __DIR__ . '/wiki/reports'
];
