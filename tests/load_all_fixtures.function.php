<?php
namespace ef\tests;

/**
 * Функция загружает в БД все тестовые данные из указанной директории.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 *
 * @param string $fixtures_path Путь к директории с тестовыми данными.
 *
 * @return void.
 */

function load_all_fixtures($fixtures_path)
{
    foreach (new \DirectoryIterator($fixtures_path) as $item) {
        if (!$item->isDir() && !$item->isDot()) {
            require($fixtures_path . '/' . $item->getFileName());
        }
    }
}
