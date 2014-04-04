<?php
namespace ef\command_line\commands;

require_once(__DIR__ . '/theme/_list.function.php');
require_once(__DIR__ . '/../get_help.function.php');

/**
 * Управление темами.
 *
 * #./ef theme list Список тем.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 */

switch ($argv[2]) {
    // список тем
    case 'list':
        echo \ef\command_line\commands\theme\_list();
    break;

    // вывод справки
    help:
    default:
        echo \ef\command_line\get_help();
    break;
}
