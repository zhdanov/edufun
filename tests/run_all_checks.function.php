<?php
namespace ef\tests;

require_once(__DIR__ . '/get_color_line.function.php');

/**
 * Функция запускает все тесты из указанной директории.
 * Выводит на экран зелёную строку в случае успешного прохождения тестов
 * или красную вместе с сообщением в случае провала теста.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 *
 * @param string $tests_directory Путь к директории с тестами.
 *
 * @return void
 */
function run_all_checks($tests_directory)
{
    $check_result = true;

    try {
        foreach (new \DirectoryIterator($tests_directory) as $item) {
            if (!$item->isDir() && !$item->isDot()) {
                require($tests_directory . '/' . $item->getFileName());
            }
        }
    } catch (\Exception $e) {
      echo "\n\n" . $e->getMessage() . "\n\n";
      $check_result = false;
    }

    echo get_color_line($check_result);
}
