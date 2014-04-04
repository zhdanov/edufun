<?php
namespace ef\tests\unit;

require_once(__DIR__ . '/skill/add.function.php');
require_once(__DIR__ . '/skill/up.function.php');
require(__DIR__ . '/../../mongo/connect.php');

/**
 * Запуск модульных тестов управления навыками.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 */

$theme_name        = 'test_theme1';
$skill_description = 'Тестовое описание навыка';
$skill_solution    = 'Тестовое решение';

// добавление навыка
\ef\tests\unit\skill\add($theme_name, $skill_description, $skill_solution);

// прокачка навыка
$skill = $mongo_db->skill->findOne([
    'theme_name'  => $theme_name,
    'description' => $skill_description,
    'solution'    => $skill_solution
]);
\ef\tests\unit\skill\up($skill['_id'], $skill_solution, 'success');
\ef\tests\unit\skill\up($skill['_id'], 'fail solution', 'fail');

echo "\n";
