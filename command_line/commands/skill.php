<?php
namespace ef\command_line\commands;

require_once(__DIR__ . '/skill/add.function.php');
require_once(__DIR__ . '/skill/up.function.php');

/**
 * Управление навыками.
 *
 * #./ef skill add             - Добавление навыка.
 * #./ef skill up [theme name] - Прокачка навыка
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 */

switch ($argv[2]) {
    // добавление навыка
    case 'add':
        \ef\command_line\commands\skill\add();
    break;

    // прокачка навыка
    case 'up':
        if (!isset($argv[3]) || !$argv[3]) {
            echo "Не указана тема. Пример:\n";
            echo "./ef skill up english\n";
        }  else {
            while (true) {
                \ef\command_line\commands\skill\up($argv[3]);
            }
        }
    break;
}
