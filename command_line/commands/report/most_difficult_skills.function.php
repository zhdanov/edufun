<?php
namespace ef\command_line\commands\report;

require_once(__DIR__ . '/../../../reports/most_difficult_skills.function.php');

/**
 * Функция записывает сгенерированный отчёт "Самые трудные навыки"
 * в указанную директорию.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 *
 * @param string $path Путь к директории с отчётами.
 */
function most_difficult_skills($path)
{
    $html = \ef\reports\most_difficult_skills();

    if ($html) {
        file_put_contents($path . '/most_difficult_skills.html', $html);
    }
}
