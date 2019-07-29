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

    $result = null;

    $theme = $mongo_db->theme->findOne(['name'=>$theme_name]);
    if (!$theme) {
        throw new \Exception('Тема не найдена');
    }

    // вычисление максимального уровеня
    $max_level = array_keys($config['skill_levels'])[count($config['skill_levels'])-1];

    // поиск ближайшего навыка для прокачки
    $skill = $mongo_db->skill->find([
        'theme_id'      => $theme['_id'],
        'level'         => ['$nin' => [$max_level, '99']],
        'next_grinding' => ['$lte' => new \MongoDB\BSON\UTCDateTime()]
    ], ['sort'=>['next_grinding'=>-1], 'limit'=>1]);

    $skill = iterator_to_array($skill);

    if ($skill) {
        $result = array_shift($skill);
    }

    return $result;
}
