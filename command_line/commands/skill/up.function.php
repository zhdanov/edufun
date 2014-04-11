<?php
namespace ef\command_line\commands\skill;

require_once(__DIR__ . '/../../read_stdin.function.php');
require_once(__DIR__ . '/../../../skill/up.function.php');
require_once(__DIR__ . '/../../../skill/get_for_grinding.function.php');
require_once(__DIR__ . '/../../clean_output.function.php');
require_once(__DIR__ . '/../../../template_engine/fetch.function.php');

/**
 * Функция прокачивает навык из командой строки с помощью
 * диалога с пользователем.
 *
 * @param string $theme_name Название темы.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 */

function up($theme_name)
{
    // подключение к mongo
    require(__DIR__ . '/../../../mongo/connect.php');

    $theme = $mongo_db->theme->findOne(['name'=>$theme_name]);
    if (!$theme) {
        die("Тема не найдена\n");
    }

    $skill = \ef\skill\get_for_grinding($theme_name);
    if (!$skill) {
        die("Все навыки прокачены\n");
    }

    // получение решения из STDIN
    $solution = \ef\command_line\read_stdin('block', $skill['description']);

    // если предложенное решение полностью совпадает с решением тренажёра
    if ($solution == $skill['solution']) {
        // отметить как успешное
        $estimation = 'success';
    } else {
        // @todo: перенести этот блок в \ef\command_line\read_stdin()
        // иначе вывести два варианта решения
        $tmp_file = '/tmp/ef-' . uniqid() . '.html';
        $template_data = [
            'description' => $skill['description'],
            'my_solution' => $solution ? $solution : '        ',
            'ef_solution' => $skill['solution']
        ];
        $template_fetch = \ef\template_engine\fetch(__DIR__ . '/../../../skill/templates/estimation.php', $template_data);
        file_put_contents($tmp_file, $template_fetch);
        $estimation_diff = shell_exec('w3m -dump ' . $tmp_file);
        unlink($tmp_file);
        echo $estimation_diff;

        // получать оценку из STDIN пока оценка не будет "y" или "n"
        $estimation_question = 'Ваше решение верное? (y/n)';
        $estimation = \ef\command_line\read_stdin('line', $estimation_question);
        while (! ($estimation == 'y' || $estimation == 'n')) {
            $estimation = \ef\command_line\read_stdin('line', $estimation_question);
        }
        if ($estimation == 'y') {
          $estimation = 'success';
        }
        if ($estimation == 'n') {
          $estimation = 'fail';
        }

        // очистка STDOUT
        \ef\command_line\clean_output($estimation_diff);
    }

    // прокачка навыка
    \ef\skill\up($skill['_id'], $solution, $estimation);
}
