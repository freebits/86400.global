<?php
require_once __DIR__.'/../../vendor/autoload.php';

function add_account(string $username, string $password_hash, string $stripe_customer_id): void
{
    $dbh = get_database();
    $sth = $dbh->prepare(
        'INSERT INTO account(username, password_hash, stripe_customer_id)
        VALUES (:username, :password_hash, :stripe_customer_id)'
    );
    $sth->bindParam(':username', $username, PDO::PARAM_STR);
    $sth->bindParam(':password_hash', $password_hash, PDO::PARAM_STR);
    $sth->bindParam(':stripe_customer_id', $stripe_customer_id, PDO::PARAM_STR);
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
