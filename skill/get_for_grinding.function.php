<?php
namespace ef\skill;

/**
 * Функция возвращает описание навыка для прокачки.
 *
 * @param string $theme_name Название темы.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 */

function get_for_grinding($theme_name)
{
    require(__DIR__ . '/../mongo/connect.php');

    $theme = $mongo_db->theme->findOne(['name'=>$theme_name]);
    if (!$theme) {
        throw new \Exception('Тема не найдена');
    }

    $skill = $mongo_db->skill->findOne(['theme_id' => $theme['_id']]);

    return $skill;
}
