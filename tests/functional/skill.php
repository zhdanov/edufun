<?php
namespace ef\tests\functional;

require_once(__DIR__ . '/skill/add_skill.function.php');

/**
 * Функциональные тесты для управления навыками.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 */

echo 'Функциональные тесты управления навыками';

// добавление навыка
\ef\tests\functional\add_skill('test_theme1', 'Тестовое описание навыка', 'Тестовое решение');

// удаление навыка
// ...

echo "\n";
