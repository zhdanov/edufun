<?php
namespace ef\commands;

require_once(__DIR__ . '/../config.php');
require_once(__DIR__ . '/../tests/run_all_checks.function.php');

/**
 * Управление тестами.
 *
 * #ef test all  - Запуск всех тестов.
 * #ef test help - Вывод справки.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 */

switch ($argv[2]) {
    // запуск всех тестов
    case 'all':
        \ef\tests\run_all_checks($config['tests_directory']);
    break;

    // справка
    case 'help':
    default:

    break;
}
