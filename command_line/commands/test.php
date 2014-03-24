<?php
namespace ef\commands;

require(__DIR__ . '/../../config.php');
require(__DIR__ . '/../../mongo/connect.php');
require_once(__DIR__ . '/../../mongo/clean_db.function.php');
require_once(__DIR__ . '/../../tests/load_all_fixtures.function.php');
require_once(__DIR__ . '/../../tests/run_all_checks.function.php');

/**
 * Управление тестами.
 *
 * #ef test all  - Запуск всех тестов.
 * #ef test help - Вывод справки.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 */

// очистка бд
\ef\mongo\clean_db($mongo_db);

// загрузка тестовых данных
\ef\tests\load_all_fixtures($config['fixtures_directory']);

// обработка команд
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
