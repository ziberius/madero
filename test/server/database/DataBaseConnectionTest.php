<?php

require($_SERVER['DOCUMENT_ROOT'] . '/madero/main/server/database/DataBaseConnection.php');
try {
    $db = DataBaseConnection::getInstance();


} catch (Exception $e) {
    echo($e);
}