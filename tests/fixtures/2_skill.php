<?php
namespace ef\tests\fixtures;

require_once(__DIR__ . '/../../skill/add.function.php');

/**
 * Скрипт загружает в БД тестовые данные для сущности "Навык".
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 */

\ef\skill\add('test_theme1', 'Тестовое описание1', 'Тестовое решение1');
\ef\skill\add('test_theme2', 'Тестовое описание2', 'Тестовое решение2');
\ef\skill\add('test_theme3', 'Тестовое описание3', 'Тестовое решение3');
