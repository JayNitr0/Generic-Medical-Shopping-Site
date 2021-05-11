<?php
function db_connect() {
    $db = new mysqli('localhost','root','','medical_database');
    if (!$db) {
    echo 'Error: Could not connect to database.  Please try again later.';
    exit;
    }else {
        return $db;
    }
}
?>