<?php
namespace ef\tests\fixtures;

require(__DIR__ . '/../../mongo/connect.php');

/**
 * Скрипт загружает в БД тестовые данные для сущности "Тема".
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 */

// test_theme1
$mongo_db->theme->insert([
    'name' => 'test_theme1'
]);

// test_theme2
$mongo_db->theme->insert([
    'name' => 'test_theme3'
]);

// test_theme3
$mongo_db->theme->insert([
    'name' => 'test_theme4'
]);
