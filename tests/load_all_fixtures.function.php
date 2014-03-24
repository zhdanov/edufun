<?php
namespace ef\tests;

/**
 * Функция загружает в БД все тестовые данные из указанной директории.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 *
 * @param string $fixtures_directory Путь к директории с тестовыми данными.
 *
 * @return void.
 */

function load_all_fixtures($fixtures_directory)
{
    foreach (new \DirectoryIterator($fixtures_directory) as $item) {
        if (!$item->isDir() && !$item->isDot()) {
            require($fixtures_directory . '/' . $item->getFileName());
        }
    }
}
