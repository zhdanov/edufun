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
    require(__DIR__ . '/../config.php');
    require(__DIR__ . '/../mongo/connect.php');

    $theme = $mongo_db->theme->findOne(['name'=>$theme_name]);
    if (!$theme) {
        throw new \Exception('Тема не найдена');
    }

    // вычисление максимального уровеня
    $max_level = array_keys($config['skill_levels'])[count($config['skill_levels'])-1];

    // поиск ближайшего навыка для прокачки
    $skill = $mongo_db->skill->findOne([
        'theme_id'      => $theme['_id'],
        'level'         => ['$ne' => $max_level],
        'next_grinding' => ['$lte' => new \MongoDate()]
    ]);

    return $skill;
}
