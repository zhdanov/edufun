<?php
namespace ef\command_line\commands\skill;

require_once(__DIR__ . '/../../read_stdin.function.php');
require_once(__DIR__ . '/../../../skill/add.function.php');

/**
 * Функция добавляет навык из командой строки с помощью
 * диалога с пользователем.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 */

function add()
{
    // подключение к mongo
    require(__DIR__ . '/../../../mongo/connect.php');

    // получение названия темы из STDIN
    $theme_name = \ef\command_line\read_stdin('line', 'Название темы:');

    // получать название темы из STDIN, пока тема не будет найдена
    $theme = $mongo_db->theme->findOne(['name'=>$theme_name]);
    while (!$theme) {
        $theme_name = \ef\command_line\read_stdin('line', 'Тема не найдена. Повторите:');
        $theme = $mongo_db->theme->findOne(['name'=>$theme_name]);
    }

    // получение описания навыка из STDIN
    $description = \ef\command_line\read_stdin('block', 'Описание навыка:');

    // получение описания решения из STDIN
    $solution = \ef\command_line\read_stdin('block', 'Описание решения:');

    // добавление навыка
    \ef\skill\add($theme_name, $description, $solution);
}
