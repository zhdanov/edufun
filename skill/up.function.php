<?php
namespace ef\skill;

/**
 * Прокачка навыка.
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
    require(__DIR__ . '/../mongo/connect.php');

    $skill = $mongo_db->skill->findOne(['_id'=>$skill_id]);
    if (!$skill) {
        throw new \Exception('Навык не найден');
    }

    if (! ($estimation == 'success' || $estimation == 'fail')) {
        throw new \Exception('Не верная оценка');
    }

    $mongo_db->skill->update(
        ['_id'=>$skill_id],
        ['$push' => [
            'experience' => [
                'acquired'   => new \MongoDate(),
                'solution'   => $solution,
                'estimation' => $estimation
            ]
        ]]
    );
}
