<?php
require dirname(__DIR__).'/vendor/autoload.php';

function add_account(string $username, string $password_hash): void
{
    $dbh = get_database();
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


function get_password_hash(string $username): string
{
    $dbh = get_database();
    $sth = $dbh->prepare(
        'SELECT (password_hash)
        FROM account
        WHERE username=:username'
    );
    $sth->bindParam(':username', $username, PDO::PARAM_STR);
    $sth->execute();
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    $dbh = null;
    return $row['password_hash'];
}
