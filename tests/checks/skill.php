<?php
namespace ef\tests\checks;

require_once(__DIR__ . '/../../command_line/write_stdin.function.php');

/**
 * Тесты для управления навыками.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 */

echo 'Проверка: "Управление навыками"';

// добавление навыка
$stdin = [
  [
    'text' => "text1\n.\n",
    'wait' => 1
  ],
  [
    'text' => "text2\n.\n",
    'wait' => 1
  ]
];
\ef\command_line\write_stdin(__DIR__ . '/../../ef skill add', $stdin);
echo '.';
// проверка в бд
// пример вызова исключения
//throw new \Exception('yep!');


echo "\n";
