<?php
namespace ef\tests\functional;

require_once(__DIR__ . '/../../../command_line/write_stdin.function.php');

/**
 * Функциональный тест прокачки навыка.
 *
 * @param string $theme_name Название темы.
 * @param string $solution   Предложенное решение.
 * @param string $estimation Оценка своего решения (y/n).
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 *
 * @return void.
 */

function up($theme_name, $solution, $estimation)
{
    require(__DIR__ . '/../../../mongo/connect.php');

    $theme = $mongo_db->theme->findOne(['name'=>$theme_name]);
    if (!$theme) {
        throw new \Exception('Тема не найдена');
    }

    $stdin = [
        [
            'text' => $solution . "\n.\n",
            'wait' => 1
        ],
        [
            'text' => $estimation . "\n",
            'wait' => 1
        ],
        [
            'command' => 'exit'
        ]
    ];

    // отправка в STDIN команде "./ef skill up"
    \ef\command_line\write_stdin(__DIR__ . '/../../../ef skill up ' . $theme_name, $stdin);

    $skill = $mongo_db->skill->find()->sort(['experience.acquired' => -1])->limit(1);
    $skill = array_shift(iterator_to_array($skill));

    if (!$skill) {
        throw new \Exception('Навык не найден');
    }

    if (!isset($skill['experience'])) {
        throw new \Exception('У навыка нет прокачек');
    }

    $experience_index = count($skill['experience'])-1;
 
    // @todo: проверять попадание даты в 10-секундный интервал
    if (!isset($skill['experience'][$experience_index]['acquired'])) {
        throw new \Exception('В опыте не установлена дата');
    }

    if (!isset($skill['experience'][$experience_index]['solution']) || $skill['experience'][$experience_index]['solution'] != $solution) {
        throw new \Exception('В опыте не установлено решение');
    }

    $estimation_db = null;
    if ($estimation == 'y') {
        $estimation_db = 'success';
    }
    if ($estimation == 'n') {
        $estimation_db = 'fail';
    }
    if (!isset($skill['experience'][$experience_index]['estimation']) || $skill['experience'][$experience_index]['estimation'] != $estimation_db) {
        throw new \Exception('В опыте не установлена оценка');
    }

    echo '.';
}
