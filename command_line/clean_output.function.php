<?php
namespace ef\command_line;

/**
 * Очищает STDOUT от предыдущего вывода.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 *
 * @param stirng $output Содержимое предыдущего STDOUT.
 *
 * @return void
 */

function clean_output($output)
{
    $lines = preg_split('/\n|\r/', $output);
    $count_lines = count($lines)-1;

    echo "\033[".$count_lines."A";
    array_pop($lines);
    foreach ($lines as $line) {
        for ($i = 0; $i <= mb_strlen($line, 'UTF-8'); $i++) {
            echo ' ';
        }
        echo "\n";
    }

    echo "\033[".$count_lines."A";
}
