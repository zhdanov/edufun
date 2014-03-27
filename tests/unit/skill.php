<?php
namespace ef\tests\unit;

require_once(__DIR__ . '/skill/add_skill.function.php');

/**
 * Запуск модульных тестов управления навыками.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 */

echo 'Модульные тесты управления навыками';

// добавление навыка
\ef\tests\unit\skill\add_skill('test_theme1', 'Тестовое описание навыка', 'Тестовое решение');

// удаление навыка
// ...

echo "\n";
