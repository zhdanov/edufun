<?php
namespace ef\commands;

require(__DIR__ . '/../../config.php');
require_once(__DIR__ . '/../../tests/run_all_tests.function.php');

/**
 * Управление тестами.
 *
 * #./ef test all        - Запуск всех тестов.
 * #./ef test unit       - Запуск модульных тестов.
 * #./ef test functional - Запуск функциональных тестов.
 * #./ef test help       - Вывод справки.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 */

// обработка команд
switch ($argv[2]) {
    // запуск всех тестов
    case 'all':
        \ef\tests\run_all_tests($config['unit_tests_path']);
        \ef\tests\run_all_tests($config['functional_tests_path']);
    break;

    // запуск модульных тестов
    case 'unit':
        \ef\tests\run_all_tests($config['unit_tests_path']);
    break;

    // запуск функциональных тестов
    case 'functional':
        \ef\tests\run_all_tests($config['functional_tests_path']);
    break;

    // справка
    case 'help':
    default:

    break;
}
