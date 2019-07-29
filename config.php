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
        1 => ['repeat' => 1 * (24*60*60)],
        2 => ['repeat' => 2 * (24*60*60)],
        3 => ['repeat' => 4 * (24*60*60)],
        4 => ['repeat' => 9 * (24*60*60)],
        5 => ['repeat' => 16 * (24*60*60)],
        6 => ['repeat' => 35 * (24*60*60)],
        7 => ['repeat' => 64 * (24*60*60)],
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
