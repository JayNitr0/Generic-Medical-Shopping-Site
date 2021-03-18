<?php
function db_connect() {
    $db = new mysqli('localhost','AlecD','<>$pk6>:L%"ks3?7','medical_database');
    if (!$db) {
    echo 'Error: Could not connect to database.  Please try again later.';
    exit;
    }else {
        return $db;
    }
}
?>