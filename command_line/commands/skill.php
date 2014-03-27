<?php
namespace ef\command_line\commands;

require_once(__DIR__ . '/skill/add_skill.function.php');

/**
 * Управление навыками.
 *
 * #./ef skill add - Добавление навыка.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 */

switch ($argv[2]) {
    case 'add':
        \ef\command_line\commands\skill\add_skill();
    break;
}
