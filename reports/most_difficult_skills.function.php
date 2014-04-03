<?php
namespace ef\reports;

/**
 * Функция генерирует отчёт "Самые трудные навыки".
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 */

function most_difficult_skills()
{
    require(__DIR__ . '/../mongo/connect.php');

    $html  = '<meta charset="utf-8" />';
    $html .= '<h2>Самые трудные навыки</h2>';

    foreach ($mongo_db->theme->find()->sort(['name' => 1]) as $theme) {
        $skills = $mongo_db->skill->aggregate([
            ['$match'   => ['theme_id' => $theme['_id']]],
            ['$unwind'  => '$experience'],
            ['$project' => ['experience' => 1, 'description' => 1, 'count' => ['$add' => [1]]]],
            ['$match'   => ['experience.estimation' => 'fail']],
            ['$group'   => ['_id' => '$description', 'fails' => ['$sum' => '$count']]],
            ['$sort'    => ['fails' => -1]],
            ['$limit'   => 10]
        ]);
        if (isset($skills['result']) && count($skills['result'])) {
            $html .= '<strong>' . $theme['name'] . '</strong><br />';
            $html .= '<table>';
            foreach ($skills['result'] as $item) {
                $html .= '<tr>';
                $html .= '<td>' . $item['fails'] . '</td><td>' . $item['_id'] . '</td>';
                $html .= '</tr>';
            }
            $html .= '</table>';
        }
    }

    return $html;
}
