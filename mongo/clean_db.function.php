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
    foreach ($db->getCollectionNames() as $collection_name) {
        $db->dropCollection($collection_name);
    }
}
