<?php
namespace ef\mongo;

/**
 * Подключение к mongodb.
 *
 * $mongo_conn Соединение
 * $mongo_db   База данных
 *
 * @example
 * require_once(__DIR__ . '/mongo/connect.php');
 * $mongo_db->people->insert(['a' => 1, 'b' => 2]);
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 */

require_once(__DIR__ . '/../config.php');
require_once(__DIR__ . '/connect.function.php');

list($mongo_conn, $mongo_db) = connect(
                                   $config['mongo']['host'],
                                   $config['mongo']['user'],
                                   $config['mongo']['password'],
                                   $config['mongo']['db']
                               );
