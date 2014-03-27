<?php
namespace ef\command_line;

require_once(__DIR__ . '/clean_output.function.php');

/**
 * Функция выводит сообщение, считывает и возвращает введённый текст из STDIN
 * и очищает весь вывод в STDOUT.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 *
 * @param string $type    Тип считывания:
 *                          line:  Одна строка
 *                          block: Блок текста до '.' на отдельной строке
 *
 * @param string $message  Сообщение, которое необходимо вывести.
 *
 * @return string Введённый текст.
 */ 

function read_stdin($type = 'line', $message)
{
    $result = null;

    // вывод сообщения
    echo $message . "\n";

    // приём STDIN
    switch ($type) {
        // одна строка
        case 'line':
            $result = rtrim(fgets(STDIN));
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
            $result =  rtrim($stdin);
        break;
    }

    // очистка STDOUT
    \ef\command_line\clean_output($message . "\n" . ($type == 'line' ? $result : $result . "\n"));

    return rtrim($result);
}
