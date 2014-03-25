<?php
namespace ef\tests\checks;

require(__DIR__ . '/../../mongo/connect.php');
require_once(__DIR__ . '/../../command_line/write_stdin.function.php');

/**
 * Тесты для управления навыками.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 */

echo 'Проверка: "Управление навыками"';

// ----------------------------------------------
// добавление навыка
// ----------------------------------------------
$theme_name        = 'test_theme1';
$skill_description = 'Тестовое описание навыка';
$skill_solution    = 'Тестовое решение';

$stdin = [
  [
    'text' => $theme_name . "\n.\n",
    'wait' => 1
  ],
  [
    'text' => $skill_description . "\n.\n",
    'wait' => 1
  ],
  [
    'text' => $skill_solution . "\n.\n",
    'wait' => 1
  ]
];

\ef\command_line\write_stdin(__DIR__ . '/../../ef skill add', $stdin);

$theme = $mongo_db->theme->findOne(['name'=>$theme_name]);
$skill = $mongo_db->skill->findOne([
    'theme_id'    => $theme['_id'],
    'theme_name'  => $theme['name'],
    'description' => $skill_description,
    'solution'    => $skill_solution
]);

if (!$skill) {
  throw new \Exception('Не удалось добавить навык');
} else {
  echo '.';
}

// ----------------------------------------------
// удаление навыка
// ----------------------------------------------
// ...

echo "\n";
