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
          sleep($item['wait']);
          fwrite($pipes[0], $item['text']) ;
        }

        stream_get_contents($pipes[1]);
        fclose($pipes[0]) ;
        fclose($pipes[1]) ;
        proc_close($process) ;
    }
}
