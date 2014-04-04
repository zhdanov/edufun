<?php
namespace ef\tests\functional;

require_once(__DIR__ . '/skill/add.function.php');
require_once(__DIR__ . '/skill/up.function.php');

/**
 * Функциональные тесты для управления навыками.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 */

// добавление навыка
\ef\tests\functional\add('test_theme1', 'Тестовое описание навыка', 'Тестовое решение');

// прокачка навыка
\ef\tests\functional\up('test_theme1', 'Правильное решение', 'y');
\ef\tests\functional\up('test_theme1', 'Неправильное решение', 'n');

echo "\n";
