<?php
namespace ef\tests\unit\skill;

require_once(__DIR__ .'/../../../skill/add.function.php');

/**
 * Модульный тест добавления навыка.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 *
 * @param string $theme_name  Название темы.
 * @param string $description Описание навыка.
 * @param string $solution    Описание решения.
 *
 * @return void.
 */

function add($theme_name, $description, $solution)
{
    require(__DIR__ . '/../../../mongo/connect.php');

    \ef\skill\add($theme_name, $description, $solution);

    $theme = $mongo_db->theme->findOne(['name'=>$theme_name]);

    if (!$theme) {
        throw new \Exception('Тема не найдена');
    }

    $skill = $mongo_db->skill->findOne([
        'theme_id'    => $theme['_id'],
        'theme_name'  => $theme['name'],
        'description' => $description,
        'solution'    => $solution
    ]);

    if (!$skill) {
        throw new \Exception('Навык не найден');
    }

    echo '.';
}
