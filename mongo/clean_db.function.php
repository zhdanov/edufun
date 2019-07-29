<?php
namespace ef\mongo;

/**
 * Функция очищает базу данных.
 *
 * @author Yuriy Zhdanov <yuriy.zhdanov@gmail.com>
 *
 * @param object $db Экземпляр класса \MongoDB.
 *
 * @return void.
 */
function clean_db($db)
{
    foreach ($db->listCollections() as $collection) {
        $db->dropCollection($collection->getName());
    }
}
