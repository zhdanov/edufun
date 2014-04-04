<?php
namespace ef\tests\unit\skill;

require_once(__DIR__ . '/../../../skill/up.function.php');

/**
 * Модульный тест прокачки навыка.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 *
 * @param object $skill_id   Идентификатор навыка (\MongoId()).
 * @param string $solution   Предложенное решение.
 * @param string $estimation Оценка (success|fail).
 *
 * @return void.
 */ 

function up($skill_id, $solution, $estimation)
{
    require(__DIR__ . '/../../../mongo/connect.php');

    $skill = $mongo_db->skill->findOne(['_id'=>$skill_id]);

    if (!$skill) {
        throw new \Exception('Навык не найден');
    }

    \ef\skill\up($skill_id, $solution, $estimation);

    $skill_up = $mongo_db->skill->findOne(['_id'=>$skill_id]);
    if (!$skill_up) {
        throw new \Exception('Навык не найден');
    }

    $experience_index = count($skill_up['experience'])-1;
 
    // @todo: проверять попадание даты в 10-секундный интервал
    if (!isset($skill_up['experience'][$experience_index]['acquired'])) {
        throw new \Exception('В опыте не установлена дата');
    }

    if (!isset($skill_up['experience'][$experience_index]['solution']) || $skill_up['experience'][$experience_index]['solution'] != $solution) {
        throw new \Exception('В опыте не установлено решение');
    }

    if (!isset($skill_up['experience'][$experience_index]['estimation']) || $skill_up['experience'][$experience_index]['estimation'] != $estimation) {
        throw new \Exception('В опыте не установлена оценка');
    }

    if ($estimation == 'success' && (integer) $skill['level'] + 1 != (integer) $skill_up['level']) {
        throw new \Exception('Не увеличился уровень при верном решении');
    }

    echo '.';
}
