<?php
namespace ef\command_line;

/**
 * Функция считывает введённый текст из STDIN.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 *
 * @param string $type Тип считывания:
 *                       line:  Одна строка
 *                       block: Блок текста до '.' на отдельной строке
 *
 * @return string Введённый текст.
 */ 

function read_stdin($type = 'line')
{
    $result = null;

    switch ($type) {
        // одна строка
        case 'line':
        break;

        // блок текста до '.' на отдельной строке
        case 'block':
            $fp = fopen('php://stdin', 'r');
            $last_line = false;
            $stdin = '';
            while (!$last_line) {
                $next_line = fgets($fp, 1024);
                if (".\n" == $next_line) {
                    $last_line = true;
                } else {
                    $stdin .= $next_line;
                }
            }
            fclose($fp);
            $result =  $stdin;
        break;
    }

    return $result;
}
