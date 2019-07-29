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
    foreach (scandir($fixtures_path) as $file) {
        if (is_file($fixtures_path . '/' . $file) && $file[0] != '.') {
            require($fixtures_path . '/' . $file);
        }
    }
}
