<?php
namespace ef\command_line\commands;

require(__DIR__ . '/../../config.php');
require_once(__DIR__ . '/report/most_difficult_skills.function.php');

/**
 * Генерация отчётов.
 *
 * #./ef report all                   - Генерация всех отчётов.
 * #./ef report most_difficult_skills - Генерация отчёта "Самые трудные навыки".
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 */

// обработка команд
switch ($argv[2]) {
    // генерация всех отчётов
    case 'all':
        \ef\command_line\commands\report\most_difficult_skills($config['reports_path']);
    break;

    // генерация отчёта "Самые трудные навыки"
    case 'most_difficult_skills':
        \ef\command_line\commands\report\most_difficult_skills($config['reports_path']);
    break;

    // справка
    case 'help':
    default:

    break;
}
