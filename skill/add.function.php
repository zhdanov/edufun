<?php
namespace ef\skill;

/**
 * Функция добавляет навык.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 *
 * @param string $theme_name  Название темы.
 * @param string $description Описание навыка.
 * @param string $solution    Описание решения.
 */

function add($theme_name, $description, $solution)
{
    require(__DIR__ . '/../mongo/connect.php');

    $theme = $mongo_db->theme->findOne(['name'=>$theme_name]);
    if (!$theme) {
        throw new \Exception('Тема не найдена');
    }

    $mongo_db->skill->insert([
        'theme_id'      => $theme['_id'],
        'theme_name'    => $theme['name'],
        'description'   => $description,
        'solution'      => $solution,
        'level'         => 1,
        'next_grinding' => new \MongoDate()
    ]);
}
