<?php
require dirname(__DIR__).'/vendor/autoload.php';

function add_account(string $username, string $password_hash): void
{
    $cfg = get_config();
    try {
        $dbh = new PDO("pgsql:dbname=".$cfg['DB_NAME'], $cfg['DB_USER']);
    } catch (Exception $e) {
        error_log('Database Connection Failed: '.$e->getMessage());
        exit;
    }
    $sth = $dbh->prepare(
        'INSERT INTO account(username, password_hash)
        VALUES (:username, :password_hash)'
    );
    $sth->bindParam(':username', $name, PDO::PARAM_STR);
    $sth->bindParam(':password_hash', $phone, PDO::PARAM_STR);
    $sth->execute();
    $dbh = null;
    return;
}
