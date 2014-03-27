<?php
namespace ef\tests\functional;

require_once(__DIR__ . '/skill/add.function.php');

/**
 * Функциональные тесты для управления навыками.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 */

// добавление навыка
\ef\tests\functional\add('test_theme1', 'Тестовое описание навыка', 'Тестовое решение');

// удаление навыка
// ...

echo "\n";
