<?php
namespace ef\tests\functional;

require_once(__DIR__ . '/../../../command_line/write_stdin.function.php');

/**
 * Функциональный тест добавления навыка.
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

    $stdin = [
        [
            'text' => $theme_name . "\n",
            'usleep' => 500000
        ],
        [
            'text' => $description . "\n.\n",
            'usleep' => 500000
        ],
        [
            'text' => $solution . "\n.\n",
            'usleep' => 500000
        ]
    ];

    // отправка в STDIN команде "./ef skill add"
    \ef\command_line\write_stdin(__DIR__ . '/../../../ef skill add', $stdin);

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
