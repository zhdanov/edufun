<?php
namespace ef\command_line\commands;

require_once(__DIR__ . '/../clean_output.function.php');
require_once(__DIR__ . '/../read_stdin.function.php');
require_once(__DIR__ . '/../../mongo/connect.php');

$question = "Введите блок текста. Для завершения введите '.' на отдельной строке.\n";
echo $question;
$stdin = \ef\command_line\read_stdin('block');
\ef\command_line\clean_output($question . $stdin);

echo $question;
$stdin2 = \ef\command_line\read_stdin('block');
\ef\command_line\clean_output($question . $stdin2);

$mongo_db->test->insert(['text1'=>$stdin, 'text2'=>$stdin2]);
