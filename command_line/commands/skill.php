<?php
namespace ef\command_line\commands;

require_once(__DIR__ . '/skill/add.function.php');
require_once(__DIR__ . '/skill/up.function.php');
require_once(__DIR__ . '/../get_help.function.php');

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
        $theme_name = null;
        if (isset($argv[3]) && $argv[3]) {
            $theme_name = $argv[3];
        }
        \ef\command_line\commands\skill\add($theme_name);
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

    // вывод справки
    default:
        echo \ef\command_line\get_help();
    break;
}
