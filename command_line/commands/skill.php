<?php
namespace ef\command_line\commands;

require_once(__DIR__ . '/skill/add.function.php');

/**
 * Управление навыками.
 *
 * #./ef skill add - Добавление навыка.
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
        $theme_name = null;
        if (isset($argv[3])) {
            $theme_name = $argv[3];
        }
        echo 'grinding! ' . $theme_name ."\n";
    break;
}
