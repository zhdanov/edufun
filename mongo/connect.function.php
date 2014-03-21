<?php
namespace ef\mongo;

/**
 * Подключение к mongodb.

 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 *
 * @param string $host     Имя хоста
 * @param string $user     Имя пользователя
 * @param string $password Пароль пользователя
 * @param string $db       Название базы данных
 *
 * @return array [0 => Соединение, 1 => База данных]
 */

function connect($host, $user, $password, $db)
{
    try {
        $conn = new \Mongo($host);
        $db = $conn->selectDB($db);
    } catch (MongoConnectionException $e) {
        die('Не удалось подключится к MongoDB');
    } catch (MongoException $e) {
        die('Ошибка: ' . $e->getMessage());
    }

    return [$conn, $db];
}
