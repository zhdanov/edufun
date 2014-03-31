<?php
namespace ef\command_line;

/**
 * Функция последовательно отправляет текст в STDIN указанной программы.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 *
 * @param string $command Команда или путь к программе.
 * @param array  $stdin   Список подоваемого текста на вход программе.
 *                       [['text'=>'abcd', 'wait'=>1], ...]
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
            if (isset($item['wait'])) {
                sleep($item['wait']);
            }
            if (isset($item['text'])) {
                fwrite($pipes[0], $item['text']) ;
            }
            if (isset($item['command'])) {
                if ($item['command'] == 'exit') {
                    sleep(1);
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
