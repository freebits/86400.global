<?php
require_once __DIR__.'/../../vendor/autoload.php';

function get_database()
{
    $cfg = get_config();
    try {
        $dbh = new PDO("pgsql:dbname=".$cfg['DB_NAME'], $cfg['DB_USER']);
    } catch (Exception $e) {
        error_log('Database Connection Failed: '.$e->getMessage());
        exit;
    }
    return $dbh;
}
