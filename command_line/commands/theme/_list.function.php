<?php
namespace ef\command_line\commands\theme;

/**
 * Функция возвращает список тем.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 */

function _list()
{
    require(__DIR__ . '/../../../mongo/connect.php');

    $out = '';

    $i = 1;
    foreach ($mongo_db->theme->find([], ['sort'=>['name'=>1]]) as $theme) {
        $out .= $i . '. ' . $theme['name'] . "\n";
        $i++;
    }

    return $out;
}
