<?php
namespace ef\command_line;

/**
 * Функция возвращает справку к программе.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 */

function get_help()
{
    $out  = "Использование:\n";
    $out .= "  theme list                Список тем\n";
    $out .= "  skill add                 Добавление навыков\n";
    $out .= "  skill up <название темы>  Прокачка навыков\n";

    return $out;
}
