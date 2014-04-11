<?php
namespace ef\template_engine;

/**
 * Функция возвращает отрендеренный шаблон.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 *
 * @param string $template_path Путь к файлу шаблона.
 * @param array  $data          Данные для рендеринга.
 */

function fetch($template_path, $data)
{
    ob_start();

    include $template_path;

    return ob_get_clean();
}
