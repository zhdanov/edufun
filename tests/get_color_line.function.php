<?php
namespace ef\tests;

/**
 * Функция возвращает строку с зелёным или красным фоном.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 *
 * @param boolean $status TRUE зелёная строка, FALSE красная строка.
 *
 * @return string Строка с зелёным или красным фоном.
 *
 */
function get_color_line($status)
{
    $color = null;

    // зелёный цвет
    if ($status) {
      $color = "\033[42m        \33[0m\n";
    // красный цвет
    } else {
      $color = "\033[41m        \33[0m\n";
    }

    return $color;
}
