<?php

require dirname(__FILE__) . '/../../../main/server/database/DataBaseConnection.php';

try {
    $db = DataBaseConnection::getInstance();


} catch (Exception $e) {
    echo($e);
}