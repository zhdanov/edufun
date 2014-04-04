<?php
namespace ef\command_line;

/**
 * Функция последовательно отправляет текст в STDIN указанной программы.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 *
 * @param string $command Команда или путь к программе.
 * @param array  $stdin   Список подоваемого текста на вход программе.
 *                       [['text'=>'abcd', 'usleep'=>500000], ...]
 *
 * @return void.
 */

function write_stdin($command, $stdin)
{
    $process = proc_open(
                   $command,
                   [
                       0 => array("pipe","r"),
                       1 => array("pipe","w")
                   ],
                   $pipes
               );

    if (is_resource($process)) {
        foreach ($stdin as $item) {
            // пауза в секундах
            if (isset($item['sleep'])) {
                sleep($item['sleep']);
            }

            // паузка в микросекундах
            if (isset($item['usleep'])) {
                usleep($item['usleep']);
            }

            // текст, который необходимо передать в STDIN
            if (isset($item['text'])) {
                fwrite($pipes[0], $item['text']) ;
            }

            // команда
            if (isset($item['command'])) {
                // завершить работу с программой
                if ($item['command'] == 'exit') {
                    usleep(500000);
                    $s = proc_get_status($process);
                    posix_kill($s['pid'], 3);
                    break;
                }
            }
        }

        stream_get_contents($pipes[1]);
        fclose($pipes[0]) ;
        fclose($pipes[1]) ;
        proc_close($process) ;
    }
}
